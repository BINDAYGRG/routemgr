<?php 
function BM_copyright($startyear){
	$currentyear=date('Y');
	$displayyear=date('y');
	
	if($currentyear>$startyear){
		echo "<center>&copy; All copyright reserved to BM COMPANY $startyear&ndash;$displayyear</center>";
	}
	echo "<center>&copy; All copyright reserved to BM COMPANY $startyear</center>";
}
BM_copyright(2016);
?>