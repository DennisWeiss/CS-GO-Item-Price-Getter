<?php 

	$item = $_POST['item'];
	$a = str_split($item);
	
	if ($a[0] == "&" & $a[1] == "#" & $a[2] == "9") {
		array_splice($a, 0, 8);
		$newitem = implode($a);
		$newitem = rawurlencode($newitem);
		$newitem = "%E2%98%85%20".$newitem;
		$json = json_decode(file_get_contents("http://steamcommunity.com/market/priceoverview/?appid=730&market_hash_name=".$newitem), true);
	}	else {
		$json = json_decode(file_get_contents("http://steamcommunity.com/market/priceoverview/?appid=730&market_hash_name=".rawurlencode($item)), true);
	}
	
	echo "A ".$item." is valued at ".$json["median_price"].".";
	
?>