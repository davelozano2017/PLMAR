<?php 
date_default_timezone_set('Asia/Manila');
include '../../functions/functions.php';
if(!isset($_SESSION['admin'])){
header("Location: ../index.php");
}

$sql = "SELECT * FROM pl_return_books_tbl WHERE id = ".$_GET['id'];
$query = $db->query($sql);
$row = $query->fetch_object();
$book_title = $row->book_title;
$status = 'Returned';
$returned_date = date('F j, \ Y');

$ssql = "UPDATE pl_request_tbl SET book_return = '$status', returned_date = '$returned_date' 
WHERE book_title = '$book_title'";
$query = $db->query($ssql);

if($query) {
	$_SESSION['returned'] = 'returned';
	$query = $db->query("UPDATE pl_return_books_tbl SET status = 'Returned' WHERE book_title = '$book_title'");
	$query = $db->query("UPDATE pl_books_tbl SET status = 'Available', requesting = 0 WHERE title = '$book_title'");
	header('location:return-request.php');
}


// date('F j, \ Y h:i A');


?>