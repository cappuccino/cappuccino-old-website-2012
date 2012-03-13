
            <h3>Contribute</h3>
                <ul>

                <?php

                if(!isset($root))
                    $root = "/";

                $learnLinks = array();
                $learnLinks[] = array("title" => "Source Code", "URL" => "http://github.com/cappuccino/cappuccino");
                $learnLinks[] = array("title" => "Bug Tracking", "URL" => "http://github.com/cappuccino/cappuccino/issues");
                $learnLinks[] = array("title" => "Wiki", "URL" => "http://github.com/cappuccino/cappuccino/wikis");
                $learnLinks[] = array("title" => "Contributors", "URL" => "http://contributors.cappuccino.org");
                $learnLinks[] = array("title" => "Projects to Work On", "URL" => "http://github.com/cappuccino/cappuccino/wikis/projects-to-work-on");

                foreach($learnLinks as $link)
                {
                    if(isset($subActive) && $link["title"] == $subActive)
                    { ?>  <li class="active"> <?php }
                    else
                    { ?> <li>  <?php } ?>

                    <a href="<?php echo $link["URL"]; ?>"><?php echo $link["title"]; ?></a></li>

                <?php
                }
                ?>

                </ul>

