<?php 
	include 'action.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Laresh">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Data Entry</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php if(isset($_SESSION['response'])){ ?>
				<div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					<?= $_SESSION['response']; ?>
				</div>
					<b><?php } unset($_SESSION['response']); ?></b>
		<div class="container-fluid">	
				<div class="row justify-content-center">
					<div class="md-col-10">
						<h3 class="text-center text-dark mt-2">Benazir Bhutto Shaheed University Lyari</h3>
						<hr>
						<?php if(isset($_SESSION['response'])){ ?>
						<div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center">
  							<button type="button" class="close" data-dismiss="alert">&times;</button>
  							<?= $_SESSION['response']; ?>
						</div>
						<b><?php } unset($_SESSION['response']); ?></b>
					</div>
				</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h3 class="text-center text-info">Add Record</h3>
				<form action="action.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="f_name" class="form-control" placeholder="Enter Your First Name" required="" value="">
					</div>
					<div class="form-group">
						<input type="text" name="l_name" class="form-control" placeholder="Enter Your Last Name" required="" value="">
					</div>
					<div class="form-group">
						<input type="text" name="reg_no" class="form-control" placeholder="Enter Your Registration No" required="" value="">
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Enter Your Email" required="" value="">
					</div>	
					<div class="form-group">
						<input type="number" name="phone" class="form-control" placeholder="Enter Your Phone" required="" value="">
					</div>
					<div class="form-group">
						<input type="file" name="image" class="custom-file">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="add" value="Add Record" >
					</div>
				</form>
			</div>
			<div class="col-md-8">
				<?php $query = "SELECT * FROM bbsul";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();
				?>
				<h3 class="text-center text-info">Records Present In The Database</h3>
				<table class="table table-hover">
    				<thead>
				      <tr>
				        <th>#</th>
				        <th>Image</th>
				        <th>First name</th>
						<th>Last name</th>
						<th>Reg No</th>
				        <th>Email</th>
				        <th>Phone</th>
				        <th>Action</th>
				      </tr>
    				</thead>
    				<tbody>
    					<?php while($row = $result->fetch_assoc()) { ?>
				      <tr>
				        <td><?= $row['Id'];?></td>
				        <td><img src="<?php echo 'uploads/'.$row['photo'] ?>" width="25"></td>
				        <td><?=	 $row['f_name']; ?></td>
						<td><?=	 $row['l_name']; ?></td>
						<td><?=	 $row['reg_no']; ?></td>
				        <td><?= $row['email']; ?></td>
				        <td><?= $row['phone']; ?></td>
				        <td>
				        	<a href="action.php?delete=<?php echo $row['Id']; ?>" onclick="return confirm('Do you really want to delete this record?')" class="badge badge-danger p-2">Delete</a>
				        </td>
				      </tr>
				  	<?php } ?>
    				</tbody>
  				</table>
			</div>
		</div>	
</body>
</html>