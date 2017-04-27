<?php 
session_start();
include 'config.php';

function login() {
	if (isset($_SESSION['user'])!=""){
		header('location: student/profile.php');
	} elseif (isset($_SESSION['admin'])!=""){
		header('location: admin/dashboard.php');
	}
	global $db;

	if(isset($_POST['btn-login'])) {
		$username 		= $db->real_escape_string($_POST['username']);
		$password 		= $db->real_escape_string($_POST['password']);
		$sql 			= "SELECT * FROM pl_account_tbl WHERE username = '$username' || student_id = '$username'";
		$query 			= $db->query($sql);
		$check 			= $query->num_rows;
		if($check<1) {
			?>
			<script type="text/javascript">
			swal({   
				title: "",  
				text: "<h4>Invalid username or password.</h4>",
				timer: 2000, 
				html: true,
				type: 'error',  
				showConfirmButton: true 
			});
			</script>
			<?php
		} else {
			$row 			= $query->fetch_object();
			$id 			= $row->id;
			$role 			= $row->role;
			$hash 			= $row->password;

			$password_hash = $hash;
			if (password_verify($password, $password_hash) && $role == 0) {
				$_SESSION['admin'] = $id;
				header("Location: admin/dashboard.php");
			} elseif (password_verify($password, $password_hash) && $role == 1) {
				$_SESSION['user'] = $id;
				header("Location: student/profile.php");
			} else {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>Invalid username or password.</h4>",
					timer: 2000, 
					html: true,
					type: 'error',  
					showConfirmButton: true 
				});
				</script>
				<?php
			}
		} 
	}
}


function add() {
	global $db;
	include 'PHPMailerAutoload.php';
	if(isset($_POST['btn-add'])) {
		$level 			= $db->real_escape_string($_POST['level']);
		if($level == 0) {$role = 0;} elseif($level == 1) {$role = 1;}
		$student_id 	= $db->real_escape_string($_POST['student_id']);
		$name 			= $db->real_escape_string($_POST['name']);
		$email 			= $db->real_escape_string($_POST['email']);
		$gender 		= $db->real_escape_string($_POST['gender']);
		$password 		= password_hash(12345,PASSWORD_DEFAULT);
		switch ($gender) {
			case 'Male':
				$image = 'uploads/male.jpg';
			break;
			
			case 'Female':
				$image = 'uploads/female.jpg';
			break;
		}

		$sql 		 	= "SELECT student_id from pl_account_tbl WHERE student_id = '$student_id'";
		$query 			= $db->query($sql);
		$check 			= $query->num_rows;
		if($check > 0) {
			?>
			<script type="text/javascript">
			swal({   
				title: "",  
				text: "<h4>  (<?php echo $student_id;?>) is already existed.</h4>",
				timer: 5000, 
				html: true,
				type: 'error',  
				showConfirmButton: true 
			});
			</script>
			<?php
		} else {
			$mailer = new PHPMailer();
			$mailer->IsSMTP();
			$mailer->Host = 'smtp.gmail.com:465';
			$mailer->SMTPAuth = TRUE;
			$mailer->Port = 465;
			$mailer->mailer="smtp";
			$mailer->SMTPSecure = 'ssl'; 
			$mailer->IsHTML(true);
			$mailer->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
			$mailer->Username = 'metrocakeshop@gmail.com'; 
			$mailer->Password = 'password!@#$'; 
			$mailer->FromName = 'Pamantasan ng Lungsod ng Marikina - Account Information.';
			$mailer->Body =  
			'
			<div style="max-width:92%;border-left:solid 1px #313d49;border-right:solid 1px #313d49;border-top:solid 1px #313d49;border-bottom:solid 1px #313d49;background-color:#f5f5f5;padding:10px;text-align:center">

	        		<h3 style="color:#000">PAMANTASAN NG LUNGSOD NG MARIKINA</h3>

	        	</div>

	        	<div style="max-width:92%;background-color:#ffffff;border-left:1px solid #313d49;border-right:solid 1px #313d49;padding:10px;">

	        		<h4>Hello '.$name.',</h4>

	        		<h4>You are now registered. Please login with this credentials</h4>
	        		<a href="http://localhost/plmar/pages/index.php" 
	        		style="float:right;background:#313d49;text-decoration:none;padding:10px;color:#fff;
	        		font-weight:bolder">
	        		CLICK ME TO LOGIN</a>
	        		<h4>Username: <i>'.$student_id.'</i></h4>
	        		<h4>Password: <i>12345</i></h4>

	        	</div>

	        	<div style="width:92%;background-color:#313d49;border-left:1px solid #313d49;border-right:solid 1px #313d49;padding:10px;text-align:center">

	        		<h4 style="color:#fff">All Rights Reserved @ '.date('Y').'</h4>

	        	</div>
			';
			$mailer->Subject = 'Pamantasan ng Lungsod ng Marikina - Account Information.';
			$mailer->AddAddress($email);
			if(!$mailer->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mailer->ErrorInfo;
			} else {
			$sql = "INSERT IGNORE INTO pl_account_tbl 
			(image, student_id, name, email, gender, username, password, role) VALUES 
			('$image', '$student_id', '$name', '$email', '$gender', '$student_id', '$password','$role')";
			$query = $db->query($sql);
			if($query) {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>New account has been added.</h4>",
					timer: 3000, 
					html:  true,
					type: 'success',  
					showConfirmButton: true 
				});
				</script>
				<?php
				}
			}
		}
	}
}

function modify_student() {
	global $db;
	if(isset($_POST['btn-edit-students'])) {
		$id 			= $db->real_escape_string($_POST['id']);
		$username 		= $db->real_escape_string($_POST['username']);
		$name 			= $db->real_escape_string($_POST['name']);
		$email 			= $db->real_escape_string($_POST['email']);
		$gender 		= $db->real_escape_string($_POST['gender']);
		$sql = "UPDATE pl_account_tbl SET 
		student_id = '$username', username = '$username', name = '$name', email = '$email', 
		gender = '$gender' WHERE id = $id";
			$query = $db->query($sql);
			if($query) {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>Student Information has been updated.</h4>",
					timer: 500, 
					html:  true,
					type: 'success',  
					showConfirmButton: true 
				},
				function(){
				  setTimeout(function(){
				    location.href="modify-student.php?username=<?php echo$username?>";
				  }, 500);
				});
				</script>
			<?php
		}		
	}

	if(isset($_POST['btn-delete-students'])) {
		$id 	= $db->real_escape_string($_POST['id']);
		$sql 	= "DELETE FROM pl_account_tbl WHERE id = $id";
		$query 	= $db->query($sql);
		if($query) {
		?>	
			<script type="text/javascript">
			swal({   
				title: "",  
				text: "<h4>Student has been removed.</h4>",
				timer: 500, 
				html:  true,
				type: 'success',  
				showConfirmButton: true 
			},
			function(){
			  setTimeout(function(){
			    location.href="view-students-account.php";
			  }, 500);
			});
			</script>
		<?php
		}
	}
}

function modify_librarian() {
	global $db;
	if(isset($_POST['btn-edit-librarian'])) {
		$id 			= $db->real_escape_string($_POST['id']);
		$username 		= $db->real_escape_string($_POST['username']);
		$name 			= $db->real_escape_string($_POST['name']);
		$email 			= $db->real_escape_string($_POST['email']);
		$gender 		= $db->real_escape_string($_POST['gender']);
		$sql = "UPDATE pl_account_tbl SET 
		student_id = '$username', username = '$username', name = '$name', email = '$email', 
		gender = '$gender' WHERE id = $id";
			$query = $db->query($sql);
			if($query) {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>Student Information has been updated.</h4>",
					timer: 500, 
					html:  true,
					type: 'success',  
					showConfirmButton: true 
				},
				function(){
				  setTimeout(function(){
				    location.href="modify-librarian.php?username=<?php echo$username?>";
				  }, 500);
				});
				</script>
			<?php
		}		
	}

	if(isset($_POST['btn-delete-librarian'])) {
		$username 	= $db->real_escape_string($_POST['username']);
		$sql = "DELETE FROM pl_account_tbl WHERE username = '$username'";
		$query = $db->query($sql);
		if($query) {
		?>	
			<script type="text/javascript">
			swal({   
				title: "",  
				text: "<h4>Librarian has been removed.</h4>",
				timer: 500, 
				html:  true,
				type: 'success',  
				showConfirmButton: true 
			},
			function(){
			  setTimeout(function(){
			    location.href="view-librarian-account.php";
			  }, 500);
			});
			</script>
		<?php
		}
	}
}

function modify_category() {
	global $db;
	if(isset($_POST['btn-edit-category'])) {
		$id 		= $db->real_escape_string($_POST['id']);
		$category 	= $db->real_escape_string($_POST['category']);
		$sql = "UPDATE pl_books_category_tbl SET category = '$category' WHERE id = '$id'";
			$query = $db->query($sql);
			if($query) {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>Category has been updated.</h4>",
					timer: 500, 
					html:  true,
					type: 'success',  
					showConfirmButton: true 
				},
				function(){
				  setTimeout(function(){
				    location.href="modify-category.php?id=<?php echo$id?>";
				  }, 500);
				});
				</script>
			<?php
		}		
	}

	if(isset($_POST['btn-delete-category'])) {
		$id 	= $db->real_escape_string($_POST['id']);
		$sql = "DELETE FROM pl_books_category_tbl WHERE id = '$id'";
		$query = $db->query($sql);
		if($query) {
		?>	
			<script type="text/javascript">
			swal({   
				title: "",  
				text: "<h4>Category has been removed.</h4>",
				timer: 500, 
				html:  true,
				type: 'success',  
				showConfirmButton: true 
			},
			function(){
			  setTimeout(function(){
			    location.href="view-category.php";
			  }, 500);
			});
			</script>
		<?php
		}
	}
}

function modify_books() {
	global $db;
	if(isset($_POST['btn-edit-books'])) {
		$id 			= $db->real_escape_string($_POST['id']);
		$isbn 			= $db->real_escape_string($_POST['isbn']);
		$title 			= $db->real_escape_string($_POST['title']);
		$category 		= $db->real_escape_string($_POST['category']);
		$author 		= $db->real_escape_string($_POST['author']);
		$copies 		= $db->real_escape_string($_POST['copies']);
		$publisher 		= $db->real_escape_string($_POST['publisher']);
		$published_date = $db->real_escape_string($_POST['published_date']);
		$description 	= $db->real_escape_string($_POST['description']);
		$sql = "UPDATE pl_books_tbl SET 
		isbn = '$isbn', title = '$title', category = '$category',
		author = '$author', copies = '$copies', publisher = '$publisher', published_date = '$published_date',
		description = '$description' WHERE id = '$id'";
			$query = $db->query($sql);
			if($query) {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>Information has been updated.</h4>",
					timer: 500, 
					html:  true,
					type: 'success',  
					showConfirmButton: true 
				},
				function(){
				  setTimeout(function(){
				    location.href="modify-books.php?id=<?php echo$id?>";
				  }, 500);
				});
				</script>
			<?php
		}		
	}

	if(isset($_POST['btn-delete-books'])) {
		$id 	= $db->real_escape_string($_POST['id']);
		$sql = "DELETE FROM pl_books_tbl WHERE id = '$id'";
		$query = $db->query($sql);
		if($query) {
		?>	
			<script type="text/javascript">
			swal({   
				title: "",  
				text: "<h4>Book has been removed.</h4>",
				timer: 500, 
				html:  true,
				type: 'success',  
				showConfirmButton: true 
			},
			function(){
			  setTimeout(function(){
			    location.href="view-books.php";
			  }, 500);
			});
			</script>
		<?php
		}
	}
}



function add_books() {
	global $db;
	if(isset($_POST['btn-add-books'])) {
		$isbn 				= $db->real_escape_string($_POST['isbn']);
		$title 				= $db->real_escape_string($_POST['title']);
		$category 			= $db->real_escape_string($_POST['category']);
		$author 			= $db->real_escape_string($_POST['author']);
		$publisher 			= $db->real_escape_string($_POST['publisher']);
		$published_date 	= $db->real_escape_string($_POST['published_date']);
		$description 		= $db->real_escape_string($_POST['description']);
		$status 			= 'Available';
		$sql 		 		= "SELECT isbn from pl_books_tbl WHERE isbn = '$isbn'";
		$query 				= $db->query($sql);
		$check 				= $query->num_rows;
		if($check > 0) {
			?>
			<script type="text/javascript">
			swal({   
				title: "",  
				text: "<h4>  This book with isbn # (<?php echo $isbn?>) is already existed.</h4>",
				timer: 5000, 
				html: true,
				type: 'error',  
				showConfirmButton: true 
			});
			</script>
			<?php
		} else {
			$sql = "INSERT IGNORE INTO pl_books_tbl 
			(isbn, title, category, author, publisher,
			 description, status, published_date) 
			 VALUES 
			 ('$isbn', '$title', '$category', '$author',
			  '$publisher', '$description', '$status', 
			  '$published_date')";
			$query = $db->query($sql);
			if($query) {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>New book has been added.</h4>",
					timer: 3000, 
					html:  true,
					type: 'success',  
					showConfirmButton: true 
				});
				</script>
				<?php
			}
		}
	}
}

function add_category() {
	global $db;
	if(isset($_POST['btn-add-category'])) {
		$category 	= $db->real_escape_string($_POST['category']);
		
		$sql 		 	= "SELECT category from pl_books_category_tbl WHERE category = '$category'";
		$query 			= $db->query($sql);
		$check 			= $query->num_rows;
		if($check > 0) {
			?>
			<script type="text/javascript">
			swal({   
				title: "",  
				text: "<h4>  (<?php echo $category;?>) is already existed.</h4>",
				timer: 5000, 
				html: true,
				type: 'error',  
				showConfirmButton: true 
			});
			</script>
			<?php
		} else {
			$sql = "INSERT IGNORE INTO pl_books_category_tbl (category) VALUES ('$category')";
			$query = $db->query($sql);
			if($query) {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>New Category has been added.</h4>",
					timer: 3000, 
					html:  true,
					type: 'success',  
					showConfirmButton: true 
				});
				</script>
				<?php
			}
		}
	}
}

function edit_profile() {
	global $db;
	if (isset($_FILES['image']['tmp_name'])) {
		$file		= $_FILES['image'][	'tmp_name'];
		$image		= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name	= addslashes($_FILES['image']['name']);
		move_uploaded_file($_FILES["image"]["tmp_name"],"../../uploads/" .$_FILES["image"]["name"]);
		$id 		= $db->real_escape_string($_POST['id']);
		$image 		= $db->real_escape_string("uploads/" .$_FILES["image"]["name"]);
		$sql   		= "UPDATE pl_account_tbl SET image = '$image' WHERE id = $id";
		$query = $db->query($sql);
			if($query) {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>Profile picture has been updated.</h4>",
					timer: 500, 
					html:  true,
					type: 'success',  
					showConfirmButton: true 
				},
				function(){
				  setTimeout(function(){
				    location.href="profile.php";
				  }, 500);
				});
				</script>
			<?php
		}
	}
}

function edit_information() {
	global $db;
	if (isset($_POST['btn-edit-information'])) {
		$id 			= $db->real_escape_string($_POST['id']);
		$username 		= $db->real_escape_string($_POST['username']);
		$name 			= $db->real_escape_string($_POST['name']);
		$email 			= $db->real_escape_string($_POST['email']);
		$gender 		= $db->real_escape_string($_POST['gender']);
		$sql = "UPDATE pl_account_tbl SET username = '$username', name = '$name', email = '$email', gender = '$gender' WHERE id = $id";
		$query = $db->query($sql);
			if($query) {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>Information has been updated.</h4>",
					timer: 500, 
					html:  true,
					type: 'success',  
					showConfirmButton: true 
				},
				function(){
				  setTimeout(function(){
				    location.href="profile.php";
				  }, 500);
				});
				</script>
			<?php
		}
	}
}

function password_change() {
	global $db;
	if (isset($_POST['btn-edit-password'])) {
		$id 			= $db->real_escape_string($_POST['id']);
		$hash 		= $db->real_escape_string($_POST['password']);
		$password = password_hash($hash,PASSWORD_DEFAULT);
		$sql = "UPDATE pl_account_tbl SET password = '$password' WHERE id = $id";
		$query = $db->query($sql);
			if($query) {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>Password has been changed.</h4>",
					timer: 500, 
					html:  true,
					type: 'success',  
					showConfirmButton: true 
				},
				function(){
				  setTimeout(function(){
				    location.href="profile.php";
				  }, 500);
				});
				</script>
			<?php
		}
	}
}

function notif() {
	if(isset($_SESSION['borrow'])) {
		?>
		<script type="text/javascript">
		swal({   
			title: "",  
			text: "<h4>Request has been sent!</h4>",
			timer: 3000, 
			html:  true,
			type: 'success',  
			showConfirmButton: true 
		});
		</script>
		<?php
		unset($_SESSION['borrow']);
	}
	if(isset($_SESSION['returning'])) {
		?>
		<script type="text/javascript">
		swal({   
			title: "",  
			text: "<h4>Please wait for the confirmation of the librarian. Thank you!</h4>",
			timer: 3000, 
			html:  true,
			type: 'success',  
			showConfirmButton: true 
		});
		</script>
		<?php
		unset($_SESSION['returning']);
	}

	if(isset($_SESSION['returned'])) {
		?>
		<script type="text/javascript">
		swal({   
			title: "",  
			text: "<h4>Book has been returned!</h4>",
			timer: 3000, 
			html:  true,
			type: 'success',  
			showConfirmButton: true 
		});
		</script>
		<?php
		unset($_SESSION['returned']);
	}


}
function admin_logout() {
	include 'functions/config.php';
	unset($_SESSION['admin']); 
	header('location: ../index.php');
}

function user_logout() {
	include 'functions/config.php';
	unset($_SESSION['user']); 
	header('location: ../index.php');
}

