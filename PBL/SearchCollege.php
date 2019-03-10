<html>
<head>
	<style>
		body
		{
			background-image : url('background2.jpg');
			background-repeat: no-repeat;
			background-size: 100%;
			padding-top : 100px;
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
    text-align: center;
    background-color: #4CAF50;
    color: white;
}

	</style>
</head>
<body>
	<form method="POST" action="Result.php">
	<center>
	<table border=2 id="customers">
	<tr>
		<th colspan="2"> Enter Following Deatils </th>
	</tr>
	<tr>

	<td>	Branch : </td>
	<td>	<select name="branch">
				<option value='Computer Engineering'> Computer Engineering </option>
				<option value='Civil Engineering'> Civil Engineering </option>
				<option value='Electronics and Telecommunication Engg'> Electronics and Telecommunication Engg </option>
				<option value='Aeronautical Engineering'> Aeronautical Engineering</option>
				<option value='Automobile Engineering'>Automobile Engineering </option>
				<option value='Bio Medical Engineering'>Bio Medical Engineering </option>
				<option value='Bio Technology'>Bio Technology </option>
				<option value='Chemical Engineering'>Chemical Engineering</option>
				<option value='Computer Science and Engineering'>Computer Science and Engineering</option>
				<option value='Dyestuff Technology'>Dyestuff Technology</option>
				<option value='Electrical Engg[Electronics and Power]'>Electrical Engg[Electronics and Power] </option>
				<option value='Electrical Engineering'>Electrical Engineering </option>
				<option value='Electronics Engineering'>Electronics Engineering </option>
				<option value='Environmental Engineering'>Environmental Engineering </option>
				<option value='Fibres and Textile Processing Technology'>Fibres and Textile Processing Technology </option>
				<option value='Food Engineering and Technology'>Food Engineering and Technology </option>
				<option value='Food Technology'>Food Technology</option>
				<option value='Information Technology'>Information Technology </option>
				<option value='Instrumentation and Control Engineering'>Instrumentation and Control Engineering</option>
				<option value='Instrumentation Engineering'>Instrumentation Engineering</option>
				<option value='Man Made Textile Technology'>Man Made Textile Technology</option>
				<option value='Mechanical & Automation Engineering'>Mechanical & Automation Engineering</option>
				<option value='Mechanical Engineering'>Mechanical Engineering</option>
				<option value='Mechanical Engineering[Sandwich]'>Mechanical Engineering[Sandwich] </option>
				<option value='Mchatronics Engineering'>Mechatronics Engineering </option>
				<option value='Oil and Paints Technology'>Oil and Paints Technology </option>
				<option value='Oil,Oleochemicals and Surfactants Technology'>Oil,Oleochemicals and Surfactants Technology </option>
				<option value='Paper and Pulp Technology'> Paper and Pulp Technology</option>
				<option value='Petro Chemical Engineering'>Petro Chemical Engineering </option>
				<option value='Petroleum Engineering'>Petroleum Engineering </option>
				<option value='Pharmaceuticals Chemistry and Technology'>Pharmaceuticals Chemistry and Technology </option>
				<option value='Polymer Engineering'>Polymer EngineeringPolymer Engineering and Technology </option>
				<option value='Polymer Engineering and Technology'> Polymer Engineering and Technology</option>
				<option value='Printing and Packing Technology'> Printing and Packing Technology</option>
				<option value='Printing Engineering and Graphics Communication'> Printing Engineering and Graphics Communication</option>
				<option value='Production Engineering'>Production Engineering </option>
				<option value='Production Engineering[Sandwich]'> Production Engineering[Sandwich]</option>
				<option value='Surface Coating Technology'>Surface Coating Technology </option>
				<option value='Textile Chemistry'>Textile Chemistry </option>
				<option value='Textile Engineering (Fashion Technology)'>Textile Engineering (Fashion Technology) </option>
				<option value='Textile Engineering / Technology'>Textile Engineering / Technology </option>
				<option value='Textile Plant Engineering'> Textile Plant Engineering</option>
				<option value='Textile Technology'>Textile Technology </option>
			</select>
		</td>
	</tr>
	<tr>
		<td>	Location : </td>
		<td>	<select name="loc">
					<option value='Pune'>Pune</option>
					<option value='Mumbai'>Mumbai</option>
					<option value='Amravati'>Amravati</option>
				</select>
		</td>
	</tr>
	<tr>
		<td> Autonomous Status : </td>
		<td>	<input type="radio" name="astatus" value="Autonomous" required/> Autonomous &nbsp; &nbsp;
			<input type="radio" name="astatus" value="Non-Autonomous" required/> Non-Autonomous
		</td>
	</tr>

	<tr>
		<td> Aided / Un-Aided : </td>
		<td>	<input type="radio" name="aided" value="Government" required/> Government &nbsp; &nbsp;
			<input type="radio" name="aided" value="Un-aided" required/> Un-aided
		</td>
	</tr>
	<tr>
		<td> Hostel : </td>
		<td>	<input type="radio" name="hostel" value="Boys" required/> Boys &nbsp; &nbsp;
			<input type="radio" name="hostel" value="Girls" required/> Girls &nbsp; &nbsp;
			<input type="radio" name="hostel" value="None" required/> None
		</td>
	</tr>
	<tr>
	<td>	RegionType : </td>
	<td>	<select name="region">
			<option value="Rural">Rural</option>
			<option value="Urban">Urban</option>
		</select>	
	</td>
	</tr>
	<tr>
		<td colspan="2"><center> <input type="submit" name="submit" value="Search" /> &nbsp; &nbsp; <input type="reset" name="reset" value="Reset" /> </center></td>
	</tr>
	</table>
	</center>
	</form>
</body>
</html>
