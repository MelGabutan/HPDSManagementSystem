<?php
	session_start();

	$mysqli = new mysqli("localhost", "root", "", "hpds") or die(mysqli_error($mysqli));
	if(isset($_POST['save']))	
	{
		$name = $_POST['product-name'];
		$SKU = $_POST['product-SKU'];
		$price = $_POST['product-price'];
		$quantity = $_POST['product-quantity'];
		$description = $_POST['product-description'];

		$_SESSION['message'] = "Record has been saved";
		$_SESSION['msg_type'] = "success";

		header("location: index.php");

		$mysqli->query("INSERT INTO products (name, SKU, price, quantity, description) VALUES('$name', '$SKU', '$price', '$quantity', '$description')") or die($mysqli->error);
	}

	if(isset($_POST['savetry']))	
	{
		$username = $_POST['employee-username'];
		$password = $_POST['employee-password'];
		$email = $_POST['employee-email'];
		$firstName = $_POST['employee-firstname'];
		$lastName = $_POST['employee-lastname'];
		$sex = $_POST['employee-gender'];
		$address = $_POST['employee-address'];
		$number = $_POST['employee-phone-number'];

		header("location: index.php");

		$mysqli->query("INSERT INTO employees (username, password, email, firstname, lastname, sex, address, phonenumber) VALUES('$username', MD5('$password'), '$email', '$firstName', '$lastName', '$sex', '$address', '$number')") or die($mysqli->error);
	}

	if(isset($_GET['remove']))
	{
		$employee_id = $_GET['remove'];
		$mysqli->query("DELETE FROM employees WHERE id=$employee_id");

		header("location: index.php");
	}

	if(isset($_GET['delete']))
	{
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM products WHERE id=$id");

		header("location: index.php");
	}

	if(isset($_POST['addUpdate']))
	{
		$id = $_POST['id-hidden'];
		$result = $mysqli->query("SELECT * FROM products WHERE id=$id");
		$row = $result->fetch_array();
		$numAdd = ((int)$_POST['numberUpdate']) + ((int) $row['quantity']);
		
		
		$mysqli->query("UPDATE products SET quantity = '$numAdd' WHERE id=$id");
		header("location: index.php");
	}

	if(isset($_POST['subtractUpdate']))
	{
		$id = $_POST['id-hidden'];
		$result = $mysqli->query("SELECT * FROM products WHERE id=$id");
		$row = $result->fetch_array();
		$numAdd = ((int) $row['quantity']) - ((int)$_POST['numberUpdate']);
		
		
		$mysqli->query("UPDATE products SET quantity = '$numAdd' WHERE id=$id");
		header("location: index.php");
	}

	if(isset($_POST['log-in']))
	{
	    $username = $_POST['username'];
	    $password = $_POST['password'];
	    $password = md5($password);

	    $user = mysqli_query($mysqli, "SELECT username FROM employees WHERE username='$username' AND password='$password'");
	    if(mysqli_num_rows($user) > 0){
	        $_SESSION['username'] = $username;
	        header("location: index.php");
	        die;
	    }else{
	        $errors['w'] = "Username and password do not match";
	        $_SESSION['errors'] = $errors;
	        header("location: login.php");
	    }
	}

	if(isset($_POST['edit-employee']))
	{

		$id = ((int)$_POST['id-hidden']);
		$firstName = $_POST['employee-firstname'];
		$lastName = $_POST['employee-lastname'];
		$sex = $_POST['employee-gender'];
		$address = $_POST['employee-address'];
		$number = $_POST['employee-phone-number'];
		
		$mysqli->query("UPDATE employees SET firstname = '$firstName' WHERE id=$id");
		$mysqli->query("UPDATE employees SET lastname = '$lastName' WHERE id=$id");
		$mysqli->query("UPDATE employees SET sex = '$sex' WHERE id=$id");
		$mysqli->query("UPDATE employees SET address = '$address' WHERE id=$id");
		$mysqli->query("UPDATE employees SET phonenumber = '$number' WHERE id=$id");
		header("location: index.php");
	}
?>