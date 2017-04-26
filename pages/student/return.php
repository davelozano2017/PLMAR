<?php 
date_default_timezone_set('Asia/Manila');
include '../../functions/functions.php';
if(!isset($_SESSION['user'])){
header("Location: ../index.php");
}

$query = $db->query("SELECT * FROM pl_account_tbl WHERE id = ".$_SESSION['user']);
$row = $query->fetch_object();
$student_id = $row->student_id;
$name = $row->name;

$sql = "SELECT * FROM pl_request_tbl WHERE id = ".$_GET['id'];
$query = $db->query($sql);
$row = $query->fetch_object();

$book_title = $row->book_title;
$returned_date = date('F j, \ Y');
$status = 'Waiting for response';

$ssql = "INSERT INTO pl_return_books_tbl (student_id, book_title, returned_date, status) VALUES 
('$student_id','$book_title', '$returned_date', '$status')";
$query = $db->query($ssql);

if($query) {
	$_SESSION['returning'] = 'returning';
	$query = $db->query("UPDATE pl_request_tbl SET book_return = '$status' WHERE book_title = '$book_title'");
	header('location:view-requests.php');
}


// date('F j, \ Y h:i A');


?>