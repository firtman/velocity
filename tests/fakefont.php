<?php

if (isset($_GET['delay'])) {
	$delay = intval($_GET['delay']);
	if ($delay > 10) {
		$delay = 4;
	}	
} else {
	$delay = 0;	
}
if (isset($_GET['size'])) {
	$size = intval($_GET['size']);
	if ($size > 1000) {
		$size = 1000;	
	}
} else {
	$size = 100;	
}
$js = "";
for ($i=0; $i<$size; $i++) {
	for ($j=0; $j<1000; $j++) {
		$js .= $j;
	}
}
sleep($delay);
header('Content-type: font/truetype');
echo $js;
?>