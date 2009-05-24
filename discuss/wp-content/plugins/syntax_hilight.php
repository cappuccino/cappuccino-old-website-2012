<?php

/*
Plugin Name: Syntax Highlighter Enscript
Plugin URI: http://scott.yang.id.au/category/syntax-hilite/
Description: Adds syntax highlighting to your pre tags with an optional lang attribute to specify which language to base the syntax on. It uses "enscript" and PHP's built-in highlight_string() to perform the syntax highlight.
Version: 1.3
Author: Scott Yang
Author URI: http://scott.yang.id.au/
*/


class SyntaxHilighter {
    function hilight($code, $lang) {
        if ($lang == 'php') {
            $code = SyntaxHilighter::hilight_php($code);
        } else {
            $code = SyntaxHilighter::hilight_enscript($code, $lang);
        }

        // Making it XHTML compatible.
        $code = preg_replace('/<FONT COLOR="/i', '<span style="color:', $code);
        $code = preg_replace('/<\/FONT>/i', '</span>', $code);
 
        return $code;
    }

    function hilight_enscript($code, $lang) {
        $argv = "enscript -q -p - --highlight=$lang --language=html --color";

        // Calling enscript to format it. Note thata proc_open requires PHP
        // 4.3. Otherwise, we will use a temp file and then popen().
        if (function_exists('proc_open')) {
            $desc = array(
                0 => array("pipe", "r"),
                1 => array("pipe", "w"),
                2 => array("pipe", "w"),
            );
            $proc = proc_open($argv, $desc, $pipe);
            if (is_resource($proc)) {
                fwrite($pipe[0], $code);
                fclose($pipe[0]);

                $code = '';
                while (!feof($pipe[1]))
                    $code .= fgets($pipe[1], 4096);
                fclose($pipe[1]);
                fclose($pipe[2]);
                proc_close($proc);
            }
        } else {
            // FIXME: We are hardcoding the path to the temporary file name
            // here. It needs to be changed to be system independent.
            $file = tempnam('/tmp', '_syntax');
            $handle = fopen($file, 'w');
            fwrite($handle, $code);
            fclose($handle);

            $argv .= ' '.escapeshellcmd($file).' 2>&1';
            $proc = popen($argv, 'r');
            $code = '';

            while (!feof($proc))
                $code .= fgets($proc, 4096);

            pclose($proc);
            unlink($file);
        }

        $code = eregi_replace("^.*<PRE>\n",  '', $code);
        $code = eregi_replace("\n?</PRE>.*$", '', $code);

        return '<!--BEGIN enscript-->'.$code.'<!--END enscript-->';
    }

    function hilight_file($filename, $lang) {
        ob_start();
        readfile($filename);
        $code = ob_get_contents();
        ob_end_clean();

        return SyntaxHilight::hilight($code, $lang);
    }

    function hilight_php($code) {
        $append_php = false;
        if (!ereg('^<\\?', $code)) {
            $append_php = true;
            $code = "<?php\n".$code."\n?>";
        }
        
        // Using PHP's highlight_string to do the syntax highlighting.
        // However, we need to tidy up the result for line breaks.
        $code = highlight_string( $code, true ); 
        $code = eregi_replace('^.*<code>',  '', $code);
        $code = eregi_replace('</code>.*$', '', $code);

        // Join multiple lines.
        $code = str_replace("\n", "", $code);
        $code = str_replace("&nbsp;", " ", $code);
        $code = implode("\n", explode("<br />", $code));

        return $code;
    }

    function htmlunspecialchars($code) {
        $func = create_function('$match',
            '$value = intval($match[1]);'.
            'return ($value < 256) ? chr($value) : $match[1];');
        $tran = get_html_translation_table(HTML_ENTITIES);
        $tran = array_flip($tran);
        $code = strtr($code, $tran);
        $code = preg_replace_callback("/&#([0-9]{1,5});/is", $func, $code);
        return $code;
    }
}

if (function_exists('add_filter')) {
    function __syntax_hilight($content) {
        return preg_replace_callback("/<pre([^>]*)>(.*?)<\/pre>/is",
                                     '__syntax_hilight_callback',
                                     $content);
    }

    function __syntax_hilight_callback($match) {
        global $wp_version;

        $attr = $match[1];
        $code = $match[2];
    
        if ($wp_version < '1.5') {
            // Fix up the formatting that WordPress has put into the HTML
            // code. (only 1.2.x is messing with the <pre/> output)
            $code = str_replace("<br />", "", $code);
            $code = preg_replace("/\\s*<p>/s", "\r\n\r\n", $code);
            $code = preg_replace("/<\/p>/s", "", $code);
            $code = str_replace("&#8220;", '"', $code);
            $code = str_replace("&#8221;", '"', $code);
            $code = str_replace("&#8216;", "'", $code);
            $code = str_replace("&#8217;", "'", $code);
            $code = str_replace("&#8211;", "--", $code);
        } else {
            $code = str_replace('\"',  '"', $code);
        }

        // Try to match the <pre lang="..."> tag, to determine what
        // programming language we need to hilight for,
        $re_lang = '/\s+lang\s*=\s*["\']?([^"\']+)["\']?/xi';
        $num = preg_match($re_lang, $attr, $lang);
        if ($num) {
            // If we need to hilight the code, we will reverse the
            // htmlspecialchars, to convert XML entities back to the right
            // character.
            $code = SyntaxHilighter::htmlunspecialchars($code);
            $code = SyntaxHilighter::hilight($code, $lang[1]);
            $attr = ' class="enscript" '.preg_replace($re_lang, '', $attr);
        }
        return "<pre$attr>$code</pre>";
    }

    add_filter('the_content', '__syntax_hilight');
}

?>
