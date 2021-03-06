<?

require_once 'configure.php';
$thisPage = $_SERVER["REQUEST_URI"];
require_once 'getContent.php';
require("$DOCUMENT_ROOT/getNavArray.php");


//TIME
function niceDate($d) {
	$dArr = explode("-",$d);
	$dYear =  $dArr[0];
	$dMonth =  $dArr[1];
	$dDay =  $dArr[2];
	
	$timestamp = mktime(0,0,0,$dMonth,$dDay,$dYear);
	
	return date("M j, Y",$timestamp);
}

//END TIME
?>
 <body> 
 
    	<div id='wrapper'>
    	<header><?=$siteTitle?></header>
    	<hr>
    	<nav>
        <?php 
							foreach($navigationArray as $n) {
							$title = $n['contentTitle'];
							$page = $n['contentPage'];
							$id = $n['contentID'];
							$link = $n['contentLink'];
							
							if($page==$thisPage)
								$activeClass="active";
							else
								$activeClass="";

							echo "<li><a class='$activeClass' href='$page' title='$title'>$title</a></li>";
						}
        ?>
        </nav>
<?php
     //DISPLAY THE CONTENT OF A CERTAIN PAGE THAT WILL BE PULLING FROM THE DB   
	   if ($thisPage == "/$subDirectory$page" || $thisPage =="$page"){
	   
	   
	   } else {
	   print <<<EOF
	   
	   <div class="page-title">Page Not Found</div>
	   
	   <div class="main">
	   	<div class="content-body">
			This Page could not be found! Please check the url and try again.
		</div>
	   
	   </div>
	   
	   EOF;
	   }
