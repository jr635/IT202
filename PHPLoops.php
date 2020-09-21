<?
$array = [1,2,3,4,5,6,7,8,9,10];
$count = count($array);

foreach($array as $count){
	if($array[$count]%2 == 0){
    	echo $array[$count]."<br>\n";
    }
}
?>