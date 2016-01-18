<?php
/**
 * @author sas <stefan.andre.schulze@gmail.com>
 * @copyright (C) 2016 sas <stefan.andre.schulze@gmail.com>
 * @license MIT
 */
/*TODO: there should be escaping of quotes */
$printed_headline=false;
foreach($customers as $customer) {
	$customer_array = $customer->as_array();
	if (!$printed_headline) {
		$printed_headline=true;
		echo '"'.implode('","', array_keys($customer_array)). "\"\r\n";
	}
	echo '"'.implode('","', array_values($customer_array)). "\"\r\n";
}
?>
