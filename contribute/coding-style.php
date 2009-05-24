<?php

$title = "Coding Style Guidelines"; 
include('../includes/header.php');

?> 

    <div id="topContentWrapper"></div>
    
    <div id="mainContentWrapper">
        <div id="mainContent">

            <div id="subNavigation">
            <?php 
                include('contribute_links.php');
            ?>
            </div>
            
            <div id="mainContentDetail">

<link rel = "stylesheet" type = "text/css" media = "screen" href = "../includes/textmate-code.css" />

<style type="text/css">
pre .code
{
    background-color: #F2F2F2;
}

code
{
    display: inline;

    font-family: monaco, monospaced;
    font-size:1em;
    
    border:initial;
    padding:initial;
}

.right
{
  color: #080 !important;
}

.wrong
{
  color: #f00 !important;
}
</style>


<h2>Cappuccino Coding Style Guidelines</h2>
<h3>Indentation</h3>

<ol>
<li> Use spaces, not tabs. Tabs should only appear in files that require them for semantic meaning, like Makefiles (which there are currently none of).
</li>
<li> The indent size is 4 spaces.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_function meta_function_js meta_function_js_objj"><span class="storage storage_type storage_type_function storage_type_function_js storage_type_function_js_objj">function</span> <span class="entity entity_name entity_name_function entity_name_function_js entity_name_function_js_objj">main</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_begin punctuation_definition_parameters_begin_js punctuation_definition_parameters_begin_js_objj">(</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_end punctuation_definition_parameters_end_js punctuation_definition_parameters_end_js_objj">)</span></span> 
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">return</span> <span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">0</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_function meta_function_js meta_function_js_objj"><span class="storage storage_type storage_type_function storage_type_function_js storage_type_function_js_objj">function</span> <span class="entity entity_name entity_name_function entity_name_function_js entity_name_function_js_objj">main</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_begin punctuation_definition_parameters_begin_js punctuation_definition_parameters_begin_js_objj">(</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_end punctuation_definition_parameters_end_js punctuation_definition_parameters_end_js_objj">)</span></span> 
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
        <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">return</span> <span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">0</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span></span></pre>
</li>
<li>A case label should be indented once from its switch statement.   The case statement is indented out from the longest label.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_control keyword_control_js keyword_control_js_objj">switch</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>condition<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">case</span> fooCondition:
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">case</span> barCondition:  i<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">++</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
                        <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">break</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>

    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">default</span>:            i<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">--</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_control keyword_control_js keyword_control_js_objj">switch</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>condition<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span> <span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">case</span> fooCondition:
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">case</span> barCondition:
        i<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">++</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
        <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">break</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">default</span>:
        i<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">--</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span></span></pre>
</li>
</ol>

<h3>Spacing</h3>
<ol>
<li>Do not place spaces around unary operators.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj">i<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">++</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj">i <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">++</span></span></pre>
</li>

<li><em>Do</em> place spaces around binary and ternary operators.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj">y <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">=</span> m <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">*</span> x <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">+</span> b<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
f<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span>a<span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">, </span>b<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
c <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">=</span> a | b<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">return</span> condition ? <span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">1</span> : <span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">0</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
</span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj">y<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">=</span>m<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">*</span>x<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">+</span>b<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
f<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span>a<span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">,</span>b<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
c <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">=</span> a|b<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">return</span> condition ? <span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">1</span>:<span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">0</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>
</li>

<li>Place spaces between control statements and their parentheses.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>condition<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    doIt<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">()</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span>condition<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>
    doIt<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">()</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>
</li>

<li>Do not place spaces between a function and its parentheses, or between a parenthesis and its content.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj">f<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span>a<span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">, </span>b<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj">f<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj"> (</span>a<span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">, </span>b<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
f<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span> a<span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">, </span>b <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>
</li>

<li>Do not place spaces between the return type of an Objective-J method and the selector name.  <i>DO</i> place spaces between the method type and the method return type.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj"><span class="meta meta_function meta_function_js meta_function_js_objj">- <span class="meta meta_return-type meta_return-type_js meta_return-type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_type punctuation_definition_type_js punctuation_definition_type_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">void</span><span class="punctuation punctuation_definition punctuation_definition_type punctuation_definition_type_js punctuation_definition_type_js_objj">)</span><span class="entity entity_name entity_name_function entity_name_function_js entity_name_function_js_objj">method</span></span>;</span></span></span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj"><span class="meta meta_function meta_function_js meta_function_js_objj">- <span class="meta meta_return-type meta_return-type_js meta_return-type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_type punctuation_definition_type_js punctuation_definition_type_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">void</span><span class="punctuation punctuation_definition punctuation_definition_type punctuation_definition_type_js punctuation_definition_type_js_objj">)</span> <span class="entity entity_name entity_name_function entity_name_function_js entity_name_function_js_objj">method</span></span>;</span>
<span class="meta meta_function meta_function_js meta_function_js_objj">-<span class="meta meta_return-type meta_return-type_js meta_return-type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_type punctuation_definition_type_js punctuation_definition_type_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">void</span><span class="punctuation punctuation_definition punctuation_definition_type punctuation_definition_type_js punctuation_definition_type_js_objj">)</span><span class="entity entity_name entity_name_function entity_name_function_js entity_name_function_js_objj">method</span></span>;</span></span></span></span></pre>
</li>

<li>Do not place spaces between Objective-J selectors and arguments.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj"><span class="meta meta_brace meta_brace_square meta_brace_square_js meta_brace_square_js_objj">[</span>myNumber addNumber:<span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">5</span><span class="meta meta_brace meta_brace_square meta_brace_square_js meta_brace_square_js_objj">]</span>
</span></span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj"><span class="meta meta_brace meta_brace_square meta_brace_square_js meta_brace_square_js_objj">[</span>myNumber addNumber: <span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">5</span><span class="meta meta_brace meta_brace_square meta_brace_square_js meta_brace_square_js_objj">]</span></span></span></span></pre>
</li>


</ol>

<h3>Line breaking</h3>
<ol>
<li>Each statement should get its own line.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj">var</span> x<span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">,</span>
    y<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
x<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">++</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
y<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">++</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>condition<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    doIt<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">()</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj">var</span> x<span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">, </span>y<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
x<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">++</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span> y<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">++</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span>condition<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span> doIt<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">()</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></span></span></pre>
</li>

</ol>

<h3>Braces</h3>
<ol>
<li>Every brace gets its own line, no exceptions, very simple to remember:

<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj">int</span><span class="meta meta_function meta_function_c"> <span class="entity entity_name entity_name_function entity_name_function_c">main</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">()</span></span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
    <span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span>...
</span><span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span>

<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>condition<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
    <span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span>...
</span><span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span>
<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">else</span> <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>condition<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
    <span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span>...
</span><span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span>

<span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>implementation</span> <span class="entity entity_name entity_name_type entity_name_type_js entity_name_type_js_objj">MyObject</span> : <span class="entity entity_other entity_other_inherited-class entity_other_inherited-class_js entity_other_inherited-class_js_objj">CPObject</span><span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj">
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span>

</span><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>end</span></span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj">int</span><span class="meta meta_function meta_function_c"> <span class="entity entity_name entity_name_function entity_name_function_c">main</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">()</span></span> <span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
    <span class="meta meta_delimiter meta_delimiter_method meta_delimiter_method_period meta_delimiter_method_period_js meta_delimiter_method_period_js_objj">...</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span>

<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>condition<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span> <span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
    <span class="meta meta_delimiter meta_delimiter_method meta_delimiter_method_period meta_delimiter_method_period_js meta_delimiter_method_period_js_objj">...</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span> <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">else</span> <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>condition<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span> <span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
    <span class="meta meta_delimiter meta_delimiter_method meta_delimiter_method_period meta_delimiter_method_period_js meta_delimiter_method_period_js_objj">...</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span>

<span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>implementation</span> <span class="entity entity_name entity_name_type entity_name_type_js entity_name_type_js_objj">MyObject</span> : <span class="entity entity_other entity_other_inherited-class entity_other_inherited-class_js entity_other_inherited-class_js_objj">CPObject</span><span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj"> <span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{}</span>
</span><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>end</span></span></span></pre>
</li>
</ol>

<h3>Null, false and 0</h3>
<ol>
<li>In JavaScript, the null object value should be written as <code>null</code>. In Objective-J, it should be written as <code>nil</code> when the variable refers to an object, and <code>Nil</code> when it refers to a Class. Objective-J <code>BOOL</code> values should be written as <code>YES</code> and <code>NO</code>.</li>
<li>Tests for true/false, null/non-null, and zero/non-zero should all be done without equality comparisons, except for cases when a value could be both <code>0</code> or <code>null</code> (or another "falsey" value).  In this case, the comparison should be preceded by a comment explaining the distinction.<br>

<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>condition<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    doIt<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">()</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
    
<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span><span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">!</span>ptr<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">return</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>

<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span><span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">!</span>count<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">return</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
    
<span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span> object is an ID number, so 0 is OK, but null is not.
</span><span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>object <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">===</span> <span class="constant constant_language constant_language_null constant_language_null_js constant_language_null_js_objj">null</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">return</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>condition <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">==</span> <span class="constant constant_language constant_language_boolean constant_language_boolean_true constant_language_boolean_true_js constant_language_boolean_true_js_objj">true</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    doIt<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">()</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
    
<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>ptr <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">==</span> <span class="constant constant_language constant_language_c">NULL</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">return</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
    
<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>count <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">==</span> <span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">0</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">return</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
    
<span class="keyword keyword_control keyword_control_js keyword_control_js_objj">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>object <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">==</span> <span class="constant constant_language constant_language_null constant_language_null_js constant_language_null_js_objj">null</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    <span class="keyword keyword_control keyword_control_js keyword_control_js_objj">return</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>
</li>
<li>In Objective-J, instance variables are initialized to <code>nil</code> automatically. Don't add explicit initializations to <code>nil</code> or <code>NO</code> in an init method.</li>
</ol>

<h3>Names</h3>
<ol>
<li>Use CamelCase. Capitalize the first letter of a class. Lower-case the first letter of a variable or function name. Fully capitalize acronyms.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>implementation</span> <span class="entity entity_name entity_name_type entity_name_type_js entity_name_type_js_objj">Data</span> <span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj">: <span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span>...
</span><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>implementation</span> <span class="entity entity_name entity_name_type entity_name_type_js entity_name_type_js_objj">HTMLDocument</span> <span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj">: <span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span>...</span></span></span></span></span></span></pre>
<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>implementation</span> <span class="entity entity_name entity_name_type entity_name_type_js entity_name_type_js_objj">data</span> <span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj">: <span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span>...
</span><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>implementation</span> <span class="entity entity_name entity_name_type entity_name_type_js entity_name_type_js_objj">HtmlDocument</span> <span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj">: <span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span>...</span></span></span></span></span></span></pre>
</li>

<li>Multiple var declarations should be collapsed with commas.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj">var</span> index <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">=</span> <span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">0</span><span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">,</span>
    count <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">=</span> <span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">5</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj">var</span> index <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">=</span> <span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">0</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="storage storage_type storage_type_js storage_type_js_objj">var</span> count <span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">=</span> <span class="constant constant_numeric constant_numeric_js constant_numeric_js_objj">5</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>
</li>

<li>Variable declarations should be created as needed, rather than up front.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_objj"><span class="keyword keyword_operator keyword_operator_j">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_j">(</span><span class="storage storage_type storage_type_objj">BOOL</span><span class="meta meta_brace meta_brace_round meta_brace_round_j">)</span>doSomething:<span class="meta meta_brace meta_brace_round meta_brace_round_j">(</span><span class="storage storage_type storage_type_objj">id</span><span class="meta meta_brace meta_brace_round meta_brace_round_j">)</span>aFoo
<span class="meta meta_brace meta_brace_curly meta_brace_curly_j">{</span>
    <span class="storage storage_type storage_type_j">var</span> importantVariable <span class="keyword keyword_operator keyword_operator_j">=</span> <span class="meta meta_brace meta_brace_square meta_brace_square_j">[</span>aFoo message<span class="meta meta_brace meta_brace_square meta_brace_square_j">]</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_j">;</span>
    <span class="keyword keyword_control keyword_control_j">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span><span class="keyword keyword_operator keyword_operator_j">!</span>importantVariable<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
        <span class="keyword keyword_control keyword_control_j">return</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_j">;</span>
    
    <span class="storage storage_type storage_type_j">var</span> index <span class="keyword keyword_operator keyword_operator_j">=</span> <span class="meta meta_brace meta_brace_square meta_brace_square_j">[</span>aFoo count<span class="meta meta_brace meta_brace_square meta_brace_square_j">]</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_j">;</span>
    <span class="keyword keyword_control keyword_control_j">while</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>index<span class="keyword keyword_operator keyword_operator_j">--</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    <span class="meta meta_brace meta_brace_curly meta_brace_curly_j">{</span>
        <span class="storage storage_type storage_type_j">var</span> innerVariable <span class="keyword keyword_operator keyword_operator_j">=</span> <span class="meta meta_brace meta_brace_square meta_brace_square_j">[</span>aFoo objectAtIndex:index<span class="meta meta_brace meta_brace_square meta_brace_square_j">]</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_j">;</span>
        <span class="comment comment_line comment_line_double-slash comment_line_double-slash_j"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_j">//</span>do something;
</span>    <span class="meta meta_brace meta_brace_curly meta_brace_curly_j">}</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_j">}</span></span></pre>
<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_objj"><span class="keyword keyword_operator keyword_operator_j">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_j">(</span><span class="storage storage_type storage_type_objj">BOOL</span><span class="meta meta_brace meta_brace_round meta_brace_round_j">)</span>doSomething:<span class="meta meta_brace meta_brace_round meta_brace_round_j">(</span><span class="storage storage_type storage_type_objj">id</span><span class="meta meta_brace meta_brace_round meta_brace_round_j">)</span>aFoo
<span class="meta meta_brace meta_brace_curly meta_brace_curly_j">{</span>
    <span class="storage storage_type storage_type_j">var</span> importantVariable <span class="keyword keyword_operator keyword_operator_j">=</span> <span class="meta meta_brace meta_brace_square meta_brace_square_j">[</span>aFoo message<span class="meta meta_brace meta_brace_square meta_brace_square_j">]</span><span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_j">,</span>
        index <span class="keyword keyword_operator keyword_operator_j">=</span> <span class="meta meta_brace meta_brace_square meta_brace_square_j">[</span>aFoo count<span class="meta meta_brace meta_brace_square meta_brace_square_j">]</span><span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_j">,</span>
        innerVariable<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_j">;</span>
    
    <span class="keyword keyword_control keyword_control_j">if</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span><span class="keyword keyword_operator keyword_operator_j">!</span>importantVariable<span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
        <span class="keyword keyword_control keyword_control_j">return</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_j">;</span>

    <span class="keyword keyword_control keyword_control_j">while</span><span class="meta meta_function meta_function_c"> <span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">(</span>index<span class="keyword keyword_operator keyword_operator_j">--</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_c">)</span></span>
    <span class="meta meta_brace meta_brace_curly meta_brace_curly_j">{</span>
        innerVariable <span class="keyword keyword_operator keyword_operator_j">=</span> <span class="meta meta_brace meta_brace_square meta_brace_square_j">[</span>aFoo objectAtIndex:index<span class="meta meta_brace meta_brace_square meta_brace_square_j">]</span><span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_j">;</span>
        <span class="comment comment_line comment_line_double-slash comment_line_double-slash_j"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_j">//</span>do something;
</span>    <span class="meta meta_brace meta_brace_curly meta_brace_curly_j">}</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_j">}</span>
</span></pre></li>

<li>Use full words, except in the rare case where an abbreviation would be more canonical and easier to understand.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj">var</span> characterSize<span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">,</span>
    length<span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">,</span>
    tabIndex<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span> <span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span> more canonical</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj">var</span> charSize<span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">,</span>
    len<span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">,</span>
    tabulationIndex<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span> <span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span> bizarre</span></span></pre>
</li>

<li>Prefix Objective-J instance variables with "_".
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>implementation</span> <span class="entity entity_name entity_name_type entity_name_type_js entity_name_type_js_objj">String</span>
<span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj"><span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
    <span class="storage storage_type storage_type_c">unsigned</span> _length<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span>
</span><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>end</span></span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_implementation meta_implementation_js meta_implementation_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>implementation</span> <span class="entity entity_name entity_name_type entity_name_type_js entity_name_type_js_objj">String</span>
<span class="meta meta_scope meta_scope_implementation meta_scope_implementation_js meta_scope_implementation_js_objj"><span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">{</span>
    <span class="storage storage_type storage_type_c">unsigned</span> length<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="meta meta_brace meta_brace_curly meta_brace_curly_js meta_brace_curly_js_objj">}</span>
</span><span class="storage storage_type storage_type_js storage_type_js_objj"><span class="punctuation punctuation_definition punctuation_definition_storage punctuation_definition_storage_type punctuation_definition_storage_type_js punctuation_definition_storage_type_js_objj">@</span>end</span></span></span></pre>
</li>

<li>Precede boolean values with words like "is" and "did".
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj">var</span> isValid<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="storage storage_type storage_type_js storage_type_js_objj">var</span> didSendData<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">BOOL</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>isEditable<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">BOOL</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>didReceiveResponse<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="storage storage_type storage_type_js storage_type_js_objj">var</span> valid<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="storage storage_type storage_type_js storage_type_js_objj">var</span> sentData<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">BOOL</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>editable<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">BOOL</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>receivedResponse<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>
</li>

<li>Precede setters with the word "set". Use bare words for getters. Setter and getter names should match the names of the variables being set/gotten.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">void</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>setCount:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_c">unsigned</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>aCount<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span> <span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span> sets _count
</span><span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_c">unsigned</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>count<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span> <span class="comment comment_line comment_line_double-slash comment_line_double-slash_js comment_line_double-slash_js_objj"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_js punctuation_definition_comment_js_objj">//</span> returns _count</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_c">unsigned</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>getCount<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>
</li>

<li>Use descriptive verbs in function names, and place desired types in comments.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_function meta_function_js meta_function_js_objj"><span class="storage storage_type storage_type_function storage_type_function_js storage_type_function_js_objj">function</span> <span class="entity entity_name entity_name_function entity_name_function_js entity_name_function_js_objj">convertToASCII</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_begin punctuation_definition_parameters_begin_js punctuation_definition_parameters_begin_js_objj">(</span><span class="variable variable_parameter variable_parameter_function variable_parameter_function_js variable_parameter_function_js_objj">/*String*/ aString</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_end punctuation_definition_parameters_end_js punctuation_definition_parameters_end_js_objj">)</span></span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_function meta_function_js meta_function_js_objj"><span class="storage storage_type storage_type_function storage_type_function_js storage_type_function_js_objj">function</span> <span class="entity entity_name entity_name_function entity_name_function_js entity_name_function_js_objj">toASCII</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_begin punctuation_definition_parameters_begin_js punctuation_definition_parameters_begin_js_objj">(</span><span class="variable variable_parameter variable_parameter_function variable_parameter_function_js variable_parameter_function_js_objj">str</span><span class="punctuation punctuation_definition punctuation_definition_parameters punctuation_definition_parameters_end punctuation_definition_parameters_end_js punctuation_definition_parameters_end_js_objj">)</span></span></span></pre>
</li>

<li>Use descriptive parameter names that are not abbreviated.
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">void</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>convertString:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="support support_class support_class_cocoa support_class_cocoa_js support_class_cocoa_js_objj">CPString</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>aString toFormat:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span>Format<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>aFormat<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">void</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>appendSubviews:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="support support_class support_class_cocoa support_class_cocoa_js support_class_cocoa_js_objj">CPArray</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>subviews inOrder:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">BOOL</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>shouldBeInOrder<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">void</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>convertString:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="support support_class support_class_cocoa support_class_cocoa_js support_class_cocoa_js_objj">CPString</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>str toFormat:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span>Format<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>f<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">void</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>appendSubviews:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="support support_class support_class_cocoa support_class_cocoa_js support_class_cocoa_js_objj">CPArray</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>s inOrder:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">BOOL</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>flag<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>
</li>

<li>Use descriptive parameter types, despite not being fully supported in JavaScript.  At some point we will be adding optional static typing, and even until then this serves as a much better indicator of what the method expects.  Of course, if the method can truly take any input or return any output, it is perfectly acceptable to use "id", "CPObject", or "var".
<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">char</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>characterAtIndex:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_c">unsigned</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>anIndex<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span>
<span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">void</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>insertObject:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">id</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>anObject<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="keyword keyword_operator keyword_operator_js keyword_operator_js_objj">-</span> <span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="support support_class support_class_js support_class_js_objj">String</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>characterAtIndex:<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="storage storage_type storage_type_js storage_type_js_objj">var</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span>index<span class="punctuation punctuation_terminator punctuation_terminator_statement punctuation_terminator_statement_js punctuation_terminator_statement_js_objj">;</span></span></pre>
</li>

<li>Objective-J method names should follow the Cocoa naming guidelines &mdash;
they should read like a phrase and each piece of the selector should 
start with a lowercase letter and use intercaps.</li>
<li>Enum members should user InterCaps with an initial capital letter.</li>
<li>#defined constants should use all uppercase names with words separated by underscores.</li>
<li> Macros that expand to function calls or other non-constant computation: these 
should be named like functions, and should have parentheses at the end, even if 
they take no arguments (with the exception of some special macros like ASSERT).<br>

<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_preprocessor meta_preprocessor_macro meta_preprocessor_macro_c">#<span class="keyword keyword_control keyword_control_import keyword_control_import_define keyword_control_import_define_c">define</span> <span class="entity entity_name entity_name_function entity_name_function_preprocessor entity_name_function_preprocessor_c">StopButtonTitle</span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">()</span> <span class="punctuation punctuation_separator punctuation_separator_continuation punctuation_separator_continuation_c">\
</span>        CPLocalizedString<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="string string_quoted string_quoted_double string_quoted_double_js string_quoted_double_js_objj"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_js punctuation_definition_string_begin_js_objj">@"</span>Stop<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_js punctuation_definition_string_end_js_objj">"</span></span><span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">, </span><span class="string string_quoted string_quoted_double string_quoted_double_js string_quoted_double_js_objj"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_js punctuation_definition_string_begin_js_objj">@"</span>Stop button title<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_js punctuation_definition_string_end_js_objj">"</span></span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span></span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_js source_js_objj"><span class="meta meta_preprocessor meta_preprocessor_macro meta_preprocessor_macro_c">#<span class="keyword keyword_control keyword_control_import keyword_control_import_define keyword_control_import_define_c">define</span> <span class="entity entity_name entity_name_function entity_name_function_preprocessor entity_name_function_preprocessor_c">STOP_BUTTON_TITLE</span> <span class="punctuation punctuation_separator punctuation_separator_continuation punctuation_separator_continuation_c">\
</span>        CPLocalizedString<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="string string_quoted string_quoted_double string_quoted_double_js string_quoted_double_js_objj"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_js punctuation_definition_string_begin_js_objj">@"</span>Stop<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_js punctuation_definition_string_end_js_objj">"</span></span><span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">, </span><span class="string string_quoted string_quoted_double string_quoted_double_js string_quoted_double_js_objj"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_js punctuation_definition_string_begin_js_objj">@"</span>Stop button title<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_js punctuation_definition_string_end_js_objj">"</span></span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span></span>

<span class="meta meta_preprocessor meta_preprocessor_macro meta_preprocessor_macro_c">#<span class="keyword keyword_control keyword_control_import keyword_control_import_define keyword_control_import_define_c">define</span> <span class="entity entity_name entity_name_function entity_name_function_preprocessor entity_name_function_preprocessor_c">StopButtontitle</span> <span class="punctuation punctuation_separator punctuation_separator_continuation punctuation_separator_continuation_c">\
</span>        CPLocalizedString<span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">(</span><span class="string string_quoted string_quoted_double string_quoted_double_js string_quoted_double_js_objj"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_js punctuation_definition_string_begin_js_objj">@"</span>Stop<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_js punctuation_definition_string_end_js_objj">"</span></span><span class="meta meta_delimiter meta_delimiter_object meta_delimiter_object_comma meta_delimiter_object_comma_js meta_delimiter_object_comma_js_objj">, </span><span class="string string_quoted string_quoted_double string_quoted_double_js string_quoted_double_js_objj"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_js punctuation_definition_string_begin_js_objj">@"</span>Stop button title<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_js punctuation_definition_string_end_js_objj">"</span></span><span class="meta meta_brace meta_brace_round meta_brace_round_js meta_brace_round_js_objj">)</span></span></span></pre>
</li>
</ol>

<h3>import Statements</h3>

<ol>

<li>Include external frameworks first.

<li>Include Foundation classes before AppKit classes.

<li>Include files in alphabetical order.

<li>Use local imports whenever possible.

<h4 class="right">Right:</h4>
<pre class="textmate-source dawn"><span class="source source_objc"><span class="comment comment_line comment_line_double-slash comment_line_double-slash_c++"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_c">//</span> (Within AppKit)
</span><span class="meta meta_preprocessor meta_preprocessor_c meta_preprocessor_c_include"><span class="keyword keyword_control keyword_control_import keyword_control_import_include keyword_control_import_include_c">import</span> <span class="string string_quoted string_quoted_other string_quoted_other_lt-gt string_quoted_other_lt-gt_include string_quoted_other_lt-gt_include_c"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_c">&lt;</span>Foundation/CPObject.j<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_c">&gt;</span></span></span>
<span class="meta meta_preprocessor meta_preprocessor_c meta_preprocessor_c_include"><span class="keyword keyword_control keyword_control_import keyword_control_import_include keyword_control_import_include_c">import</span> <span class="string string_quoted string_quoted_other string_quoted_other_lt-gt string_quoted_other_lt-gt_include string_quoted_other_lt-gt_include_c"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_c">&lt;</span>Foundation/CPArray.j<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_c">&gt;</span></span></span>

<span class="meta meta_preprocessor meta_preprocessor_c meta_preprocessor_c_include"><span class="keyword keyword_control keyword_control_import keyword_control_import_include keyword_control_import_include_c">import</span> <span class="string string_quoted string_quoted_double string_quoted_double_include string_quoted_double_include_c"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_c">"</span>CPTabViewItem.j<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_c">"</span></span></span>
<span class="meta meta_preprocessor meta_preprocessor_c meta_preprocessor_c_include"><span class="keyword keyword_control keyword_control_import keyword_control_import_include keyword_control_import_include_c">import</span> <span class="string string_quoted string_quoted_double string_quoted_double_include string_quoted_double_include_c"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_c">"</span>CPTabView.j<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_c">"</span></span></span></span></pre>

<h4 class="wrong">Wrong:</h4>
<pre class="textmate-source dawn"><span class="source source_objc"><span class="comment comment_line comment_line_double-slash comment_line_double-slash_c++"><span class="punctuation punctuation_definition punctuation_definition_comment punctuation_definition_comment_c">//</span> (Within AppKit)
</span><span class="meta meta_preprocessor meta_preprocessor_c meta_preprocessor_c_include"><span class="keyword keyword_control keyword_control_import keyword_control_import_include keyword_control_import_include_c">import</span> <span class="string string_quoted string_quoted_double string_quoted_double_include string_quoted_double_include_c"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_c">"</span>CPTabView.j<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_c">"</span></span></span>
<span class="meta meta_preprocessor meta_preprocessor_c meta_preprocessor_c_include"><span class="keyword keyword_control keyword_control_import keyword_control_import_include keyword_control_import_include_c">import</span> <span class="string string_quoted string_quoted_other string_quoted_other_lt-gt string_quoted_other_lt-gt_include string_quoted_other_lt-gt_include_c"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_c">&lt;</span>AppKit/CPTabViewItem.j<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_c">&gt;</span></span></span>

<span class="meta meta_preprocessor meta_preprocessor_c meta_preprocessor_c_include"><span class="keyword keyword_control keyword_control_import keyword_control_import_include keyword_control_import_include_c">import</span> <span class="string string_quoted string_quoted_other string_quoted_other_lt-gt string_quoted_other_lt-gt_include string_quoted_other_lt-gt_include_c"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_c">&lt;</span>Foundation/CPArray.j<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_c">&gt;</span></span></span>
<span class="meta meta_preprocessor meta_preprocessor_c meta_preprocessor_c_include"><span class="keyword keyword_control keyword_control_import keyword_control_import_include keyword_control_import_include_c">import</span> <span class="string string_quoted string_quoted_other string_quoted_other_lt-gt string_quoted_other_lt-gt_include string_quoted_other_lt-gt_include_c"><span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_begin punctuation_definition_string_begin_c">&lt;</span>Foundation/CPObject.j<span class="punctuation punctuation_definition punctuation_definition_string punctuation_definition_string_end punctuation_definition_string_end_c">&gt;</span></span></span></span></pre>

</ol>
</div>
            <div style="clear: both;"></div>
        </div>
    </div>

<?php 

include('../includes/footer.php');

?>
