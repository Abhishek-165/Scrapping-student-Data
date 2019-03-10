<html>
<head>
	<style>
			body
		{
			background-color: #1B80D8;
			background-repeat: no-repeat;
			background-size: 100%;
		}

		table
		{
			border-color: white;
			border-radius: 3px;
			border-collapse: collapse;
			border-width: 3px;
			border-style: solid;
		}

		input[type="submit"], input[type="reset"]
		{
			font-size: 20px ;
			border-radius : 10px;
		color: white;
		background :  #4CAF50;
		width: 100px;
		height: 30px;
		border: 1 solid;
 		box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
		outline: 1px solid;
  		outline-color: rgba(255, 255, 255, .5);
		outline-offset: 0px;
 		text-shadow: none;
		transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
	}

	input[type=submit]:hover, input[type=reset]:hover
	{
		border: 2px solid;
		border-radius: 25px;
  		box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
  		outline-color: rgba(255, 255, 255, 0);
  		outline-offset: 15px;
  		text-shadow: 1px 1px 2px #427388; 
	}

	#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;

}
	h1
	{
		color : white;
	}

	</style>
</head>
<body>
<center><h1><b><u> College Details </u></b></h1></center>
<?php

	if(isset($_POST['submit']))
	{
		$branch = $_POST['branch'];
		$location = $_POST['loc'];
		$auto_stat = $_POST['astatus'];
		$aided = $_POST['aided'];
		$hostel = $_POST['hostel'];
		$region = $_POST['region'];


//		echo "<script> window.alert(' " . $branch  . $location .  $auto_stat  . $aided . $hostel . $region . "  ' ); </script>";

		$conn = mysqli_connect('localhost','id6904741_root','Abhishek@786','id6904741_pblproj');

	    if(!$conn)
	    {
	      echo "<script> window.alert('Connection Failed'); </script>";
	      header('Location:SearchCollege.php');
	    }

	  	if($hostel=="Boys")
	  	{
	  		$sql = "SELECT * From College_Details WHERE Branch='".$branch."' AND Region='".$location."' AND Autonomy='".$auto_stat."' AND RegionType='".$region."'  AND `Aided/Unaided`='".$aided."' AND BoysHostel>0" ;
	  	}
	  	else if($hostel=="Girls")
	  	{
	  		$sql = "SELECT * From College_Details WHERE Branch='".$branch."' AND Region='".$location."' AND Autonomy='".$auto_stat."' AND RegionType='".$region."'  AND `Aided/Unaided`='".$aided."' AND GirlsHostel>0" ;
	  	}
	  	else
	  	{
	  		$sql = "SELECT * From College_Details WHERE Branch='".$branch."' AND Region='".$location."' AND Autonomy='".$auto_stat."' AND RegionType='".$region."'  AND `Aided/Unaided`='".$aided."'" ;
	  	}

//	  			echo "Select * from college_details where Branch='".$branch."'

	    $result = mysqli_query($conn, $sql);

	    if($result)
	    {
	    	echo "<table border=3 id='customers'>
	    	<th> Institute Name </th>
	    	<th> Location </th>
	    	<th> Region Type </th>
	    	<th> Address </th>
	    	<th> Website</th>
	    	<th> Autonomy </th>
	    	<th> Contact</th>
	    	<th>Aided/Unaided</th>
	    	<th> Minority </th>
	    	<th> Branch </th>
	    	<th> Intake</th>
	    	<th> Hostel </th>
	    	";
	    	while($row = $result->fetch_assoc())
	    	{
	    		echo "<tr> 
	    				<td>" . $row['InstitueName'] . "</td>
	    				<td>" . $row['Region'] . "</td>
	    				<td>" . $row['RegionType'] . "</td>
	    				<td>" . $row['Address'] . "</td>
	    				<td>" . $row['Website'] . "</td>
	    				<td>" . $row['Autonomy'] . "</td>
	    				<td>" . $row['Contact'] . "</td>
	    				<td>" . $row['Aided/Unaided'] . "</td>
	    				<td>" . $row['Minority'] . "</td>
	    				<td>" . $row['Branch'] . "</td>
	    				<td>" . $row['Intake'] . "</td>
	    				";


	    		if($hostel=="Boys")
	    		{	
	    			echo "<td>" . $row['BoysHostel'] . "</td>"; 
	    		}
	    		else if($hostel=="Girls")
	    		{	  
	    			echo "<td>" . $row['GirlsHostel'] . "</td>"; 
	    		}
	    		else
	    		{
	    			echo "<td> ---- </td>";
	    		}

	    		echo "</tr>";
	    	}
	    }
	    else
		{
			echo "<script> window.alert('No College is Available'); </script>";
			header('Location:SearchCollege.php');
		}
	}
?>

</body>
</html>
