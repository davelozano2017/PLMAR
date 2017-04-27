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

$sql = "SELECT * FROM pl_books_tbl WHERE title = '".$_GET['title']."'";
$query = $db->query($sql);
$row = $query->fetch_object();
$copies = $row->copies;

$ssql = "UPDATE pl_request_tbl SET book_return = '$status', returned_date = '$returned_date' 
WHERE book_title = '$book_title'";
$query = $db->query($ssql);

if($query) {
	$_SESSION['returned'] = 'returned';

	if($copies >= 1) {
		$query = $db->query("UPDATE pl_return_books_tbl SET status = 'Returned' WHERE book_title = '$book_title'");
		$query = $db->query("UPDATE pl_books_tbl SET copies = $copies + 1 WHERE title = '$book_title'");
	} elseif($copies == 0) {
		$query = $db->query("UPDATE pl_books_tbl SET copies = $copies + 1 ,status = 'Available', requesting = 0 WHERE title = '$book_title'");
				
	}


	
	header('location:return-request.php');
}

