<!DOCTYPE html>
<html>
<head>
	<title>Online Food Store</title>
</head>
<body>
	<p>Menu:</p>
	<table border="1">
		<tr>
			<th>Item name</th>
			<th>Quantity Available</th>
			<th>Price</th>
<?php
$file = fopen("inventory.txt", "r");
$members = array();

while (!feof($file)) {
   $members[] = fgets($file);
}
foreach($members as $key=>$val){
	$l=count($key);
	for($i=0;$i<$l;$i++){
		$keywords = preg_split("/[\s,]+/", $val);
		echo "<tr><td>".$keywords[0]."</td><td>".$keywords[1]."</td><td>$".$keywords[2]."</td></tr>";
	}
}
echo "<br>";
fclose($file);
?>
</table>
<br/><br/>
<form action="order-submit.php" method="post">
	Food item: 
	<select name="food_name">
	<?php
	$dir_f="../order/";
	$files = preg_grep('~\.(jpg)$~', scandir($dir_f));
	foreach($files as $value) {
		$final_value = preg_replace('/\\.[^.\\s]{3,4}$/', '', $value);
  		echo $final_value;
		echo '<option value="'.$final_value.'">'.$final_value.'</option>';
	}?>
	</select>
	<br/>
	Quantity:
	<input type="text" name="quantity" maxlength="2"/>
	<br/>
	<input type="submit" value="Order">
</form>
</body>
</html>