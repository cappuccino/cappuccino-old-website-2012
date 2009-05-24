<?php

$active = "Learn";
$title = "Design by Sofa"; 
include('../includes/header.php');

?> 

    <div id="topContentWrapper"></div>
    
    <div id="mainContentWrapper">
        <div id="mainContent">

            <div id="subNavigation">
            <?php 
                $subActive = "Design by Sofa";
                include('learn_links.php');
            ?>
            </div>
            
            <div id="mainContentDetail">
            
<h1 style="text-align: center; padding-bottom: 1em;">Design by Sofa</h1>
<img src="../images/crappySofa.png" width="600" alt="Sofa" />

<p>Sofa understands the important of open source, and the power of Cappuccino.  That's why they're going to be designing the look and feel for Cappuccino.  Over the next several months, Sofa and 280 North will work together to design a beautiful standard interface for Cappuccino applications, and will donate that work to the project.  Every developer will benefit from having a team of truly world class designers working on their applications, for free.</p>                         
                                
<p>Sofa also designed the Cappuccino logo.</p>
            </div>
            
            <div style="clear: both;"></div>
        </div>
    </div>

<?php 

include('../includes/footer.php');

?>