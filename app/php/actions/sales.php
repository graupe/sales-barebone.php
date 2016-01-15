<?php
/**
 * @package sales
 * @author sas <stefan.andre.schulze@gmail.com>
 * @copyright (C) 2016 sas <stefan.andre.schulze@gmail.com>
 * @license MIT
 */


require_once 'libs/idiorm/idiorm.php';
require_once 'simplate.php';

ORM::configure(DB_URI);
ORM::configure('username', DB_USER);
ORM::configure('password', DB_PASS);

/* TODO:use namespaces/classes to avoid nameclashes when calling more than one 
	action
 */
function _validate($request) {
	$from_time = strtotime($request['route'][0]);
	$till_time = strtotime($request['route'][1]);
	if (!$from_time) {
		$from = '1970.01.01';
	}
	$from = date('Y-m-d', $from_time);

	if (!$till_time) {
		$till_time = time();
	}
	$till = date('Y-m-d', $till_time);
	return array('from' => $from, 'till' => $till);
}

function _query($from, $till) {
	/* TODO: could create an view for the UNION if desired */
	$sql = <<<ESQL
	select c.customer_id, c.firstname, c.lastname, count(1) as sales_count, sum(sale_amount) as sales_sum, max(sale_date) as sales_date
	from customer c,
		(select * from sales1 union select * from sales2) as s
	where sale_date between :from and :till and c.customer_id = s.customer_id
	group by c.customer_id
ESQL;
	$query = ORM::for_table('customer')->raw_query($sql, array('from'=>$from, 'till'=>$till));
	return $query->find_many();
}

function dooshow($request) {
	extract(_validate($request));
	$tpl = new Simplate();
	$tpl->from = $from;
	$tpl->till = $till;
	$tpl->rows = _query($from, $till);
	$tpl->content = $tpl->render('sales');
	$tpl->title = 'List of sales';
	echo $tpl->render('layout');
}
function dooexport($request) {
	extract(_validate($request));
	$tpl = new Simplate();
	$tpl->customers = _query($from, $till);
	$result = $tpl->render('sales.csv');
	$filename = "sales-$from-$till.cvs";

	header('Content-Disposition: attachment; filename="'.$filename.'"');
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Length: ${result}");
	echo $result;
}
/* default action */
function doo($params) {
	dooshow($params);
}
?>
