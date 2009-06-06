
            <h3>Learn</h3>
                <ul>
                
                <?php
                
                if(!isset($root))
                    $root = "/";
                
                $learnLinks = array();
                $learnLinks[] = array("title" => "About Cappuccino", "URL" => $root."learn/");
                $learnLinks[] = array("title" => "Demos", "URL" => $root."learn/demos/");
                $learnLinks[] = array("title" => "Tutorials", "URL" => $root."learn/tutorials/");
                $learnLinks[] = array("title" => "Documentation", "URL" => $root."learn/documentation/");
                //$learnLinks[] = array("title" => "Design by Sofa", "URL" => $root."learn/sofa.php");
    
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

