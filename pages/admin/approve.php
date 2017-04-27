<?php 
date_default_timezone_set('Asia/Manila');
include '../../functions/functions.php';
if(!isset($_SESSION['admin'])){
header("Location: ../index.php");
}

$sql = "SELECT * FROM pl_books_tbl WHERE title = '".$_GET['title']."'";
$query = $db->query($sql);
$row = $query->fetch_object();
$title = $row->title;
$status = 'Approved';
$copies = $row->copies;
$approved_date = date('F j, \ Y');

$ssql = "UPDATE pl_request_tbl SET status = '$status', approved_date = '$approved_date', book_return = 'No' WHERE id = ".$_GET['id'];
$query = $db->query($ssql);

if($query) {
	$_SESSION['approved'] = 'Approved';
	if($copies >= 2) {
		$query = $db->query("UPDATE pl_books_tbl SET copies = $copies - 1 WHERE title = '".$_GET['title']."'");
	} elseif($copies == 1) {
		$query = $db->query("UPDATE pl_books_tbl SET copies = $copies - 1 , status = 'Unavailable' WHERE title = '".$_GET['title']."'");
	}
	header('location:book-requests.php');
}


// date('F j, \ Y h:i A');


?>