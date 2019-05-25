<?php 
	$test = "0011000010100000100000000000101011000001010000000010110100010021000110000001011000000000000000000000";
	$test = str_split($test);

	foreach ($test as $k => $v) {
		$k++;
		$this->request->data->$k = $v;
	}

print_r(serialize($this->request->data));
?>
