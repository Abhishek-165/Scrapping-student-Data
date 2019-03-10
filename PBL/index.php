<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
  <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
input[type=submit], button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.Sign {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}



.container {
    padding: 16px;
}

/* span.Sign {
    float: right;  <span class="Sign">
    
} */


/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

  <form class="modal-content animate" action="Login.php" method="post">
    <div class="imgcontainer">
     
      <p><center>University Login</center></p>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" id="uname" name="uname" required />

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" id="psw" name="psw" required />
        
      <input type="submit" name="submit" value="Login"/>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <!-- <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> -->
      <button type="button" class="Sign" onclick="location.href='SignUp.php'">SignUp</button> 
      <!-- <span class="psw">Forgot <a href="#">password?</a></span> --> 
    </div>
  </form>
<!-- </div>  -->


</body>
</html>


<?php

  if(isset($_POST['submit']))
  {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    $conn = mysqli_connect('localhost','id6904741_root','Abhishek@786','id6904741_pblproj');

    if(!$conn)
      echo "Connection Failed";

    $sql = "SELECT * FROM login WHERE Username='$username' AND Password='$password'";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1)
    {
      echo "<script> window.alert('Login Successfull'); </script>";
       header('Location: SearchCollege.php'); 
    }
    else
    {
     echo "<script> window.alert('Invalid Username and Password'); </script>"; 
    }
  }
?>