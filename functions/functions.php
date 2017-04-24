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


function add_student() {
	global $db;
	if(isset($_POST['btn-add-students'])) {
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
			$sql = "INSERT IGNORE INTO pl_account_tbl 
			(image, student_id, name, email, gender, username, password, role) VALUES 
			('$image', '$student_id', '$name', '$email', '$gender', '$student_id', '$password',1)";
			$query = $db->query($sql);
			if($query) {
				?>
				<script type="text/javascript">
				swal({   
					title: "",  
					text: "<h4>New student has been added.</h4>",
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

function modify_student() {
	global $db;
	if(isset($_POST['btn-edit-students'])) {
		$student_id 	= $db->real_escape_string($_POST['student_id']);
		$name 			= $db->real_escape_string($_POST['name']);
		$email 			= $db->real_escape_string($_POST['email']);
		$gender 		= $db->real_escape_string($_POST['gender']);
		$sql = "UPDATE pl_account_tbl SET 
		student_id = '$student_id', name = '$name', email = '$email', 
		gender = '$gender' WHERE student_id = '$student_id'";
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
				    location.href="modify-student.php?student_id=<?php echo$student_id?>";
				  }, 500);
				});
				</script>
			<?php
		}		
	}

	if(isset($_POST['btn-delete-students'])) {
		$student_id 	= $db->real_escape_string($_POST['student_id']);
		$sql = "DELETE FROM pl_account_tbl WHERE student_id = '$student_id'";
		$query = $db->query($sql);
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
			    location.href="view-students.php";
			  }, 500);
			});
			</script>
		<?php
		}
	}
}

function admin_logout() {
	include 'functions/config.php';
	unset($_SESSION['admin']); 
	header('location: ../index.php');
}