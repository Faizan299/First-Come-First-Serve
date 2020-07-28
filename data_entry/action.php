<?php 
	session_start();
	include 'config.php';

	if(isset($_POST['add'])){
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$reg_no = $_POST['reg_no'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$photo = $_FILES['image']['name'];
		$upload = "uploads/".$photo;
		$random = rand(1,100);
		

		$query = "INSERT INTO bbsul (Id,f_name, l_name, reg_no, email, phone, photo) VALUES ('$random','$f_name', '$l_name', '$reg_no', '$email', '$phone', '$photo')";
		$move_data = mysqli_query($conn, $query);

		move_uploaded_file($_FILES['image']['tmp_name'], $upload);

		header('location: index.php');
		$_SESSION['response']="Successfully Inserted to database";
		$_SESSION['res_type']='alert alert-success';
	}

	if(isset($_GET['delete'])){
		


		$id = $_GET['delete'];
		$del = mysqli_query($conn,"DELETE FROM bbsul WHERE ID = $id");
		
		header('location: index.php');
		$_SESSION['response']="Successfully deleted from database";
		$_SESSION['res_type']='alert alert-danger';
	}

	// if (isset($_GET['detail'])) {
	// 	$id = $_GET['detail'];
	// 	$result = mysqli_query($conn, "SELECT * FROM bbsul WHERE ID = $id");
		
	// 	if($result->num_rows){
	// 		$row = $result->fetch_array();
	// 		$f_name  = $row['f_name'];
	// 		$l_name  = $row['l_name'];
	// 		$reg_no  = $row['reg_no'];
	// 		$email  = $row['email'];
	// 		$photo =$row['photo'];
	// 	} 
	// }
?>