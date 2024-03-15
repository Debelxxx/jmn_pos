<?php
session_start();
include('../connect.php');
$a = $_POST['code'];
$b = $_POST['desc'];
$c = $_POST['price'];
$d = $_POST['supplier'];
$e = $_POST['qty'];
$f = $_POST['o_price'];
$g = $_POST['profit'];
$h = $_POST['name'];
$i = $_POST['date_arrival'];
$j = $_POST['qty_sold'];

// query with backticks around reserved keyword 'desc'
$sql = "INSERT INTO products (product_code, `desc`, price, supplier, qty, o_price, profit, name, date_arrival, qty_sold) 
        VALUES (:a, :b, :c, :d, :e, :f, :g, :h, :i, :j)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j));
header("location: products.php");
?>
