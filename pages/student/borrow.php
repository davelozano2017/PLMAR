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

$sql = "SELECT * FROM pl_books_tbl WHERE id = ".$_GET['id'];
$query = $db->query($sql);
$row = $query->fetch_object();
$title = $row->title;
$copies = $row->copies;
$status = 'Pending';
$request_date = date('F j, \ Y');

$ssql = "INSERT INTO pl_request_tbl (student_id, name, book_title, request_date, status) VALUES ('$student_id', '$name', '$title', '$request_date', '$status')";
$query = $db->query($ssql);

if($query) {
	$_SESSION['borrow'] = 'Pending';
	header('location:view-books.php');
}


// date('F j, \ Y h:i A');


?>