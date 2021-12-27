<?php
include "config.php";
if($_GET['credit']=='cash')
{
	$query="INSERT INTO order_master (user_id,date,pay_method,shipping_nm,shipping_ad,billing_nm,billing_ad) VALUES ('".$_SESSION['uname']."', '".$_GET['hiddendate']."', 'cash', '".$_GET['sname']."', '".$_GET['saddress']."', '".$_GET['bname']."', '".$_GET['baddress']."')";
	mysql_query($query) or die("W Q 1");
}
else
{
	$query="INSERT INTO order_master (user_id,date,pay_method,shipping_nm,shipping_ad,billing_nm,billing_ad,credit_name,credit_no,credit_date) VALUES ('".$_SESSION['uname']."', '".$_GET['hiddendate']."', 'credit', '".$_GET['sname']."', '".$_GET['saddress']."', '".$_GET['bname']."', '".$_GET['baddress']."', '".$_GET['cardowner']."', '".$_GET['cardnumber']."', '".$_GET['carddate']."')";
	mysql_query($query) or die("W Q 2");
}
$query="select max(orderid) as max1 from order_master";
$res=mysql_query($query);
$fres=mysql_fetch_array($res);

$query="select * from viewcart where user_id='".$_SESSION['uname']."' and session_id='".session_id()."'";
$res1=mysql_query($query);
while($fres1=mysql_fetch_array($res1))
{
	$query="INSERT INTO order_detail (order_id,book_id,qty,rate,total) VALUES ('".$fres['max1']."', '".$fres1['book_id']."', '".$fres1['qty']."', '".$fres1['rate']."', '".$fres1['qty'] * $fres1['rate']."')";
	mysql_query($query) or die("W Q 3");
	header("location:billshow.php?orderid=".$fres['max1']);
}
?>