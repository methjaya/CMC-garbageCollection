<?php
include_once('../connection2.php');
session_start();

$id = $_GET['i'];
$s = $_GET['s'];

if (isset($_POST['update'])) {
	$Id = $_POST['id'];
	$status = $_POST['status'];
	$priority = $_POST['priority'];
	$query = "UPDATE waste_detection SET status= '$status',priority='$priority' WHERE id= '$Id' ";

	$data = mysqli_query($con, $query);


	if ($data) {

		header("Location: ./index.php");
		exit();
	} else {
		echo  "<div class = 'alert alert-danger'><span class='fa fa-check'> Status Updation Faild !</span></div>";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Update status</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styleupdate.css">
</head>

<body style="background-color: #1D8348;">

	<form method="post" action="status.php" enctype="multipart/form-data">
		<div class="container contact">
			<div class="row">
				<div class="col-md-3" style="background-color: #ABEBC6;">
					<div class="contact-info">
						<img src="../images/done.png" alt="image" />
						<h2>Edit Status</h2>
					</div>
				</div>
				<div class="col-md-9">
					<div class="form-group">
						<label class="control-label col-sm-2" for="status">Status:</label>
						<div class="col-sm-10">
							<input type='hidden' value="<?php echo "$id"; ?>" name='id'>
							<select class="form-control" id="status" name="status" value="<?php echo "$s"; ?>" required>
								<option class="form-control">Pending</option>
								<option class="form-control">Approved</option>
								<option class="form-control">Rejected</option>
								<option class="form-control">Completed</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="priority">Priority:</label>
						<div class="col-sm-10">
							<input type='hidden' value="<?php echo "$id"; ?>" name='id'>
							<select class="form-control" id="priority" name="priority" value="<?php echo "$s"; ?>" required>
								<option class="form-control">HIGH</option>
								<option class="form-control">MEDIUM</option>
								<option class="form-control">LOW</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">

							<button type="submit" name="update" id="update" class='btn btn-success' onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false}">Update Status</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>
</body>

</html>