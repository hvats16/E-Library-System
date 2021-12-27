<?php
include "config.php";
if($_POST['txtqty']!="")
{
	if(isset($_SESSION['uname']))
	{
		if($_GET['check']==1)
		{
				$id=$_GET['prod_id'];
		}
		else
		{
	
			$id=$_POST['prod_id'];
		}
		$qty=$_POST['txtqty'];
	
		$query1="select * from viewcart where user_id='".$_SESSION['uname']."' and product_id='".$id."' and session_id='".session_id()."'";
		$res1=mysql_query($query1);
		$fres1=mysql_fetch_array($res1);
		if($fres1)
		{
				
				$qtyold=$fres1['qty'];
				$update="UPDATE `viewcart` SET `qty` = $qty+$qtyold WHERE `product_id` = '".$fres1['product_id']."'";
				$updquery=mysql_query($update);
				if($_GET['id']=='search')
				{
					header("location:advancesearch1.php?pgno=".$_GET['pgno']."&cate_name=".$_GET['cate_name']."&publisher=".$_GET['publisher']."&pfrom=".$_GET['pfrom']."&pto=".$_GET['pto']."&subcat=".$_GET['subcat']);
				}
				elseif($_GET['id']=='view')
				{
					header("location:viewbooks.php?id=".$_POST['prod_id']);
				}
				else
				{
					header("location:books.php?name=".$_GET['name']."&pgno=".$_GET['pgno']);
				}
		}
		else
		{
			
			$query="select * from book where book_id='".$id."'";
			$res=mysql_query($query);
			$fres=mysql_fetch_array($res);
			$addcart="insert into `viewcart`(`user_id`, `book_id`, `qty`, `rate`, `book_discription`, `session_id`, `book_image`, `date`) VALUES ('".$_SESSION['uname']."', '$id', '$qty', '".$fres['book_price']."', '".$fres['short_disc']."','".session_id()."', '".$fres['book_image']."', '".date(dmy)."')";
			mysql_query($addcart) or die("W Q");;
				if($_GET['id']=='search')
				{
					header("location:advancesearch1.php?pgno=".$_GET['pgno']."&cate_name=".$_GET['cate_name']."&publisher=".$_GET['publisher']."&pfrom=".$_GET['pfrom']."&pto=".$_GET['pto']."&subcat=".$_GET['subcat']);
				
				
				}
				
				elseif($_GET['id']=='view')
				{
					header("location:viewbook.php?id=".$_POST['prod_id']);
				}
				else
				{
					header("location:books.php?name=".$_GET['name']."&pgno=".$_GET['pgno']);
				}
		}
	}
	else
	{
		$valid="Please login to purchase any book !";
		header("location:login.php?valid=".$valid);
	}
}
else
{
			if($_GET['id']=='search')
			{
					header("location:advancesearch1.php?pgno=".$_GET['pgno']."&cate_name=".$_GET['cate_name']."&publisher=".$_GET['publisher']."&pfrom=".$_GET['pfrom']."&pto=".$_GET['pto']."&subcat=".$_GET['subcat']);
			}
			elseif($_GET['id']=='view')
			{
				header("location:viewbook.php?id=".$_POST['prod_id']);
			}
			else
			{
				header("location:books.php?pgno=".$_GET['pgno']);
			}
}
?>
