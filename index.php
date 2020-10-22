<!DOCTYPE html>
<html>
<head>
	<title>HPDS Management System</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="index.css?<?php echo time(); ?>" />
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">	
</head>
<body onload="hideEmployee()">
	<?php require_once 'process.php'; ?>

	<?php 
		$mysqli = new mysqli("localhost", "root", "", "hpds") or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT * FROM products") or die($mysqli->error());
		$employee_result = $mysqli->query("SELECT * FROM employees") or die($mysqli->error());
	?>

	<div class="row justify-content-center">
		<input type="checkbox" id='check'>
	<!-- Header -->
	<header>
		<label for="check">
			<i class="fa fa-bars" id='sidebar_btn'>
				
			</i>
		</label>
		<span class="left_area">
			<a href="https://www.facebook.com/HPDS-260376414621856">
				<img src="HPDS-logo.png"> 
			</a>
		</span>
		<span class="right_area">
			<a href="login.php" class="logout_btn">
				<i class="fa fa-user">
					
				</i>
				LOGOUT
			</a>
		</span>
	</header>
	<!-- Side Bar -->
	<div class="sidebar">
		<center>
			<img src="Leonard.jpg" class="profile_image" alt="" id='profile-picture'>
			<h4>
				Leonard Taganas
			</h4>
		</center>
		<a href="#" onclick="manageProducts()">
			<i class="fa fa-desktop">
				
			</i>
			<span>
				Products
			</span>
		</a>
		<a href="#" onclick="manageEmployees()">
			<i class="fa fa-briefcase"></i>
				
			<span>
				Employees
			</span>
		</a>
		<a href="#">
			<i class="fa fa-users"></i>
			<span>
				Customers
			</span>
		</a>
		<a href="#">
			<i class="fa fa-database"></i>
				
			</i>
			<span>
				Report
			</span>
		</a>
		<a href="#">
			<i class="fa fa-info-circle ">
				
			</i>
			<span>
				About
			</span>
		</a>
		<a href="#">
			<i class="fa fa-cogs">
				
			</i>
			<span>
				Settings
			</span>
		</a>
	</div>
	<!-- Content -->

	<div class="product-content">
		<h1 class="table-header">
			Dashboard
		</h1>
		<div class="table-header">
			<span class="dashboard-title">
			Dashboard 
			</span>
			<span class="home-title">
				Home / Products
			</span>
		</div>
		
		<table class="content-table">
			<tr>
				<th class="col-headings">Product Name</th>
				<th class="col-headings">SKU</th>
				<th class="col-headings">Price</th>
				<th class="col-headings">Quantity</th>
				<th class="col-headings">Description</th>
				<th class="col-headings" colspan="2">Actions</th>
			</tr>
			<?php
				while($row = $result->fetch_assoc())
				{

					echo '<tr><td>'. $row["name"] .'</td><td>'. $row["SKU"] .'</td><td>₱ '. $row["price"]. '</td><td>'. $row["quantity"]. '</td><td>'. $row["description"]. '</td><td>
						<div class="product-user">
							<form action="process.php" method="POST"> 
								<input type="hidden" name="id-hidden" value="' .$row['id']. '">
								<input type="submit" class="increment-decrement" style="" name="addUpdate" value="+">
								
								<input type="number" class="number" required="required" name="numberUpdate">
							
								<input type="submit" class="increment-decrement" name="subtractUpdate" value="-">
							</form>

						</div>
					
							<a href="process.php?delete='. $row['id'] .'"><button class="delete-item">
								<i class="fa fa-trash"></i>
							</button></a>
						</td>
					';
				} 
			?>
		</table>	

	</div>
	<div class="employees-content">
		<h1 class="table-header">
			Dashboard
		</h1>
		<div class="table-header">
			<span class="dashboard-title">
			Dashboard 
			</span>
			<span class="home-title">
				Home / Employees
			</span>
		</div>
		
		<table class="content-table">
			<tr>
				<th class="col-headings">Last Name</th>
				<th class="col-headings">First Name</th>
				<th class="col-headings">Sex</th>
				<th class="col-headings">Address</th>
				<th class="col-headings">Phone Number</th>
				<th class="col-headings">Actions</th>
			</tr>
			<tbody>
			<?php
				while($row = $employee_result->fetch_assoc())
				{

					echo '<tr><td>'. $row["lastname"] .'</td><td>'. $row["firstname"] .'</td><td>';
					
					if($row["sex"] == 1)
					{
						echo 'M';
					}
					else if($row["sex"] == 0)
					{
							echo 'F';
					}
					echo '</td><td>'. $row["address"]. '</td><td>'. $row["phonenumber"]. '</td>
					<td>
						<div class="product-user">	
							
							<button name="btn-edit" class="edit-information-button" onclick="editEmployee(this.id)"';
					echo "id='";
					echo $row["id"];
					echo "'>";
					echo '
								<i class="fa fa-edit"></i>
							</button>
							</form>
						</div>
							<a href="process.php?remove='. $row['id'] .'"><button class="delete-item">
								<i class="fa fa-trash"></i>
							</button></a>
						</td>
					';
				} 
			?>	
			</tbody>
		</table>	
	</div>
	<!-- Floating Button -->
	<button class="material-icons floating-btn" onclick="addProduct()">
		add
	</button>
	<!-- Inventory Form -->
	<div class="inventory-form">
		<div class="inventory-form-content">
			<div class="product-user">
				<input class="radio-input" type="radio" value="option1" name="myRadio" id="myRadio1">
				<label class="radio-label" for="myRadio1" id='product-label'>
					Product
				</label>
				<input class="radio-input" type="radio" value="option2" name="myRadio" id="myRadio2" onclick="addEmployee()">
				<label class="radio-label" for="myRadio2" id='employee-label'>
					Employee
				</label>
			</div>
			

			<div class="close" onclick="hideAddProduct()">
				+
			</div>
			<form action="process.php" method="POST">
				<div>
					<input type="text" name="product-name" required="required" onfocus="moveUsername()">
					<label for="product-name" class="product-labels">
						Product Name
					</label>

					
					<input type="text" name="product-SKU" required="required" onfocus="movePassword()">
					<label for="product-SKU" class="product-labels">
						SKU
					</label>

					<input type="text" name="product-price" required="required" onfocus="movePassword()">
					<label for="product-price" class="product-labels">
						Price
					</label>

					
					<input type="number" name="product-quantity" required="required" onfocus="movePassword()">

					<label for="product-quantity" class="product-labels">
						Quantity
					</label>

					<input type="textarea" name="product-description" required="required" onfocus="movePassword()">
					<label for="product-description" class="product-labels">
						Description
					</label>
				</div>
				<input type="submit" name="save" value="ADD">
			</form>
		</div>
	</div>
	<!-- Employee Form -->
	<div class="employee-form">
		<div class="employee-form-content">
			<div class="product-user">
				<input class="radio-input" type="radio" value="option1" name="myRadio" id="myRadio1" >
				<label class="radio-label" for="myRadio1" onclick="addProductAgain()">
					Product
				</label>
				<input class="radio-input" type="radio" value="option2" name="myRadio" id="myRadio2">
				<label class="radio-label" for="myRadio2" id='employee-label-2'>
					Employee
				</label>
			</div>
		

		<div class="close" onclick="hideEmployeeAgain()">
			+
		</div>
		<form action="process.php" method="POST">
				<div>
					<input type="text" name="employee-username" required="required" onfocus="moveUsername()">
					<label for="employee-username" class="product-labels">
						Username
					</label>

					<input type="password" name="employee-password" required="required" onfocus="moveUsername()">
					<label for="employee-password" class="product-labels">
						Password
					</label>

					<input type="email" name="employee-email" required="required" onfocus="moveUsername()">
					<label for="employee-email" class="product-labels">
						Email
					</label>
			
					<input type="text" name="employee-firstname" required="required" onfocus="movePassword()">
					<label for="employee-firstname" class="product-labels">
						First Name
					</label>
		
					<input type="text" name="employee-lastname" required="required" onfocus="movePassword()">
					<label for="employee-lastname" class="product-labels">
						Last Name
					</label>

					<div class="radio-buttons">
						<input  type="radio" name="employee-gender" required="required" value="1">
						<label for="employee-gender" class="product-labels">
							Male
						</label>
						<input type="radio" name="employee-gender" required="required" value="0">
						<label for="employee-gender" class="product-labels">
							Female
						</label>	
					</div>
					
					
					<input type="text" name="employee-address" required="required" onfocus="movePassword()">
					<label for="employee-address" class="product-labels">
						Address
					</label>

					<input type="text" name="employee-phone-number" required="required" onfocus="movePassword()">
					<label for="employee-phone-number" class="product-labels">
						Phone Number
					</label>

				</div>
				<input type="submit" name="savetry" value="ADD">
			</form>
		</div>	
	</div>

	<!-- Edit Employee Record -->
	<div class="edit-employee-record">
		<div class="edit-employee-content">
			<h1>Edit Employee</h1>
			<div class="close" onclick="hideEmployeeAgain()">
				+
			</div>
			<form action="process.php" method="POST" id='edit-form'>
				 <div>
					<input type="text" name="employee-firstname" required="required" onfocus="movePassword()">
					<label for="employee-firstname" class="product-labels">
						First Name
					</label>
		
					<input type="text" name="employee-lastname" required="required" onfocus="movePassword()">
					<label for="employee-lastname" class="product-labels">
						Last Name
					</label>

					<div class="radio-buttons">
						<input  type="radio" name="employee-gender" required="required" value="1">
						<label for="employee-gender" class="product-labels">
							Male
						</label>
						<input type="radio" name="employee-gender" required="required" value="0">
						<label for="employee-gender" class="product-labels">
							Female
						</label>	
					</div>
					
					
					<input type="text" name="employee-address" required="required" onfocus="movePassword()">
					<label for="employee-address" class="product-labels">
						Address
					</label>

					<input type="text" name="employee-phone-number" required="required" onfocus="movePassword()">
					<label for="employee-phone-number" class="product-labels">
						Phone Number
					</label>

				</div>
				<input type="submit" name="edit-employee" value="UPDATE">
			</form>
		</div>	
	</div>';
	?>
	<div class="footer">
		<p>
				&copy; HPDS. All rights reserved
			</p>
	</div>
</body>

<script type="text/javascript" src="index.js?v=<?php echo time(); ?>"></script>

</html>
