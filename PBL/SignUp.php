<?php

if(isset($_POST['SignUp']))
{
	$name = $_POST['txtName'];
	$pswd = $_POST['txtPswd'];
	$count = 0;

		$conn = mysqli_connect('localhost','id6904741_root','Abhishek@786','id6904741_pblproj');
		$sql = "SELECT * FROM login WHERE Username='$name'";
		$result2 = mysqli_query($conn, $sql);
	    $count = mysqli_num_rows($result2);
		
	    if($count==0)
	    {
	    	$query = "INSERT INTO login(Username,Password) VALUES('$name','$pswd')";
			$result = mysqli_query($conn, $query);

	    	if($result)
			{
				echo "<script> alert('Registration Successfull'); </script>";
				header('Location:index.php');
			}
			else
			{
				echo "<script> alert(\"Error In Database Entry \"); </script>". mysqli_error($conn);
			}
	    }
	    else
	    {
	    	echo "<script> alert('Username Already Exist. Try Another'); </script>";
	    }
}

?>

<!doctype html>
<html>
<meta charset="utf-8">
<head>
	<title> SignUp </title>
	<style>

	body
	{
		background: url('background.jpg');
		background-size : cover;
	}


	input[type=text], input[type=password], input[type=email]
	{
		border : 0 ;
		border-radius: 25px;
		height: 25px;
		width: 280px;
		padding: 8px;
		font-size: 20px;
		color : DodgerBlue;
	}

	input[type=text]:focus, input[type=password]:focus, input[type=email]:focus
	{
		outline: none;
		border-radius: 25px;
		box-shadow:0 0 20px white;
		border-color: red;
	}

	input[type=submit]
	{
		font-size: 20px ;
		color: white;
		background : 0;
		width: 400px;
		height: 50px;
		border: 1 solid;
 		box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
		outline: 1px solid;
  		outline-color: rgba(255, 255, 255, .5);
		outline-offset: 0px;
 		text-shadow: none;
		transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
	}

	input[type=submit]:hover
	{
		border: 2px solid;
		border-radius: 25px;
  		box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
  		outline-color: rgba(255, 255, 255, 0);
  		outline-offset: 15px;
  		text-shadow: 1px 1px 2px #427388; 
	}


	td
	{
		color : white;
		font-size: 25px;
		padding: 5px;
	}

	h1
	{
		color : white;
		font-family: 'Serif';
		font-style: oblique;
		font-size: 35px;
		text-shadow: 1px 1px 2px #427388;
	}

	.SignUp
	{
		padding-top: 70px;
		right : 200px;
		position: absolute;
	}

	.buttons
	{
		padding : 5px;
	}

	</style>
</head>
<body>
	<form method="POST" action="SignUp.php" name="SignUp" enctype="multipart/form-data">
		<div class="SignUp">
			<h1 align="center"> SIGN UP </h1>
		
			<table>
				<tr>
					<td> User Name </td>
					<td> <input type="text" name="txtName" id="txtName" required /></td>
				</tr>
				<tr>
					<td> Password </td>
					<td> <input type="password" name="txtPswd" id="txtPswd" maxlength="14" required /></td>
				</tr>
			</table>
			<br>
			<div class="buttons" align="center">
				<input type="submit" value="SignUp" name="SignUp">
			</div>

		</div>
	</form>
</body>
</html>