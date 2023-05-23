<?php
	if(!isset($_GET['page'])){
		$_GET['page']=1;
	}
	$lastpicindex = $_GET['page']*2;
	for($x = $lastpicindex-1; $x<=$lastpicindex; $x++){
		echo "<img src='img".$x.".jpg'width='200'height='200'> &nbsp;";
	}
	for($x=1; $x<=3; $x++){
		echo "<a href='pagination.php?page=".$x ."'>".$x."</a>";
	}
?>