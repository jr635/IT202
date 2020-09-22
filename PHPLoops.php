<?
$array = [2,4,5,6,10,13,25,26,31,44];
$count = count($array);

foreach($array as $value){
	if($value %2 == 0){
    	echo $value."<br>\n";
    }
}
?>