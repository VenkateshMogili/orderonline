<?php
$food_name = $_POST['food_name'];
$quantity = $_POST['quantity'];
$price =array('apple'=>1,'chicken'=>3.25,'cookie'=>0.25,'milk'=>4.50,'tomato'=>0.50);

$file = fopen("inventory.txt", "r");
$members = array();

while (!feof($file)) {
   $members[] = fgets($file);
}
foreach($members as $key=>$val){
	$l=count($key);
	for($i=0;$i<$l;$i++){
		$keywords = preg_split("/[\s,]+/", $val);
		if($food_name==$keywords[0]){
			if($quantity>$keywords[1]){
				echo "Sorry, we don't have ".$quantity." of '".$food_name."' in stock";
			} else{
			$cost=$quantity*$price[$food_name];
			echo "Order successful! $".$cost." is your total price. Here is what you ordered:";
			for($i=0;$i<$quantity;$i++){
				echo "<img src='".$food_name.".jpg' width='30' height='30' style='margin:5px;'>";
			}
		}
		} 
	}
}
echo "<br>";
fclose($file);
?>