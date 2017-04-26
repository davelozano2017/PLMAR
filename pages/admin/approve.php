<?php 
date_default_timezone_set('Asia/Manila');
include '../../functions/functions.php';
if(!isset($_SESSION['admin'])){
header("Location: ../index.php");
}

$sql = "SELECT * FROM pl_books_tbl WHERE id = ".$_GET['id'];
$query = $db->query($sql);
$row = $query->fetch_object();
$title = $row->title;
$status = 'Approved';
$approved_date = date('F j, \ Y');

$ssql = "UPDATE pl_request_tbl SET status = '$status', approved_date = '$approved_date', book_return = 'No' WHERE id = ".$_GET['id'];
$query = $db->query($ssql);

if($query) {
	$_SESSION['approved'] = 'Approved';
	header('location:book-requests.php');
}


// date('F j, \ Y h:i A');


?>