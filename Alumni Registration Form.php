<!DOCTYPE html>
<html>
<head>
	<title>Career Consultancy</title>
	<link rel="stylesheet" href="arf style.css">
</head>
<body>
	<?php 
	$servername = "localhost";
	$username = "root";
	$password = null;
	$dbName = "careerdb";

	$conn = mysqli_connect($servername,$username,$password,$dbName);
	if(!$conn){
		die("Connection failed: " .mysqli_connect_error());
	}
	echo "Connected successfully";

	$sql = "CREATE DATABASE IF NOT EXISTS " . $dbName;
	if($conn->query($sql) === TRUE){
		echo "Database created successfully";
	}else{
		echo "Error creating database: " . $conn->error;
	}

	$sql = "CREATE TABLE IF NOT EXISTS alumni_registration (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstName VARCHAR(30) NOT NULL,
	lastName VARCHAR(30) NULL,
	gender TINYINT NULL,
	university VARCHAR(30) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
	)";

	if ($conn->query($sql) === TRUE){
		echo "Table alumni_registration created successfully";
	} else {
		echo "Error creating table: " . $conn->error;
	}






	$firstMsg = $lastMsg = $contactMsg = $batchMsg = $emailMsg = "";
	$firstname = $lastname = $contact = $batch = $email = $address = $university = $gender = "";

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		if(empty($_POST['firstname'])){
			$firstMsg = "Please insert your First Name";
		}else{
			$firstname = $_POST['firstname'];
			$firstname = sanitize($firstname);
		}
		if(empty($_POST['lastname'])){
			$lastMsg = "Please insert your Last Name";
		}else{
			$lastname = $_POST['lastname'];
			$lastname = sanitize($lastname);
		}
		if(empty($_POST['contact'])){
			$contactMsg = "Please insert your Contact Number";
		}else{
			$contactMsg = "Value Ok";

			$contact = $_POST['contact'];
			
			if(!filter_var($contact, FILTER_VALIDATE_INT)){
				$contactMsg = "Contact Must be a number";
			}

		}

		if(empty($_POST['email'])){
			$emailMsg = "Please insert your email";
		}else{
			$emailMsg = "Value Ok";

			$email = $_POST['email'];
			 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailMsg = "Invalid email format";
    }
			
			 
		}

		print_r($_POST);
		
		$university = $_POST['university'];

		print_r($_POST);
		$gender = $_POST['gender'];

	}

	function sanitize($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data); //$nbsp;

		return $data;
	}


	 ?>
   	<fieldset><legend><h1>Alumni Registration</h1></legend>
	<br><br>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<label>First Name<span style="color: red;">*</span>:</label>
		<input type="text" name="firstname" placeholder="Enter your firstname" value="<?php echo $firstname; ?>">
		<p><?php echo $firstMsg; ?></p>
		<br><br>
		<label>Last Name<span style="color:red">*</span>:</label>
		<input type="text" name="lastname" placeholder="Enter your lastname" value="<?php echo $lastname; ?> ">
		<p><?php echo $lastMsg; ?></p>
		<br><br>
		<label>Gender:</label>
		<input type="radio" name="gender" value="Male" <?php if($gender == "Male") echo "checked"; ?>>Male
		<input type="radio" name="gender" value="Female"<?php if($gender == "Female") echo "checked"; ?>>Female
		<br><br>
		<label>Birthdate:</label>
		<input type="date" name="birthdate">
		<br><br>
		<label>Email:</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
		<p><?php echo $emailMsg; ?></p>
		<br><br>
		<label>Contact No.<span style="color: red">*</span>:</label>
		<input type="text" name="contact">
		<p><?php echo $contactMsg; ?></p>
		<br><br>
		<label>University:</label>
		<select name="university">
         <option value="buet" <?php if($university == "buet") echo "selected"; ?> >BUET</option>
         <option value="kuet" <?php if($university == "kuet") echo "selected"; ?>>KUET</option>
         <option value="ruet" <?php if($university == "ruet") echo "selected"; ?>>RUET</option>
         <option value="cuet" <?php if($university == "cuet") echo "selected"; ?>>CUET</option>
         <option value="sust" <?php if($university == "sust") echo "selected"; ?>>SUST</option>
         <option value="iut" <?php if($university == "iut") echo "selected"; ?>>IUT</option>
         <option value="du" <?php if($university == "du") echo "selected"; ?>>DU</option>
         <option value="ku" <?php if($university == "ku") echo "selected"; ?>>KU</option>
         <option value="ru" <?php if($university == "ru") echo "selected"; ?>>RU</option>
         <option value="cu" <?php if($university == "cu") echo "selected"; ?>>CU</option>
        </select> 
        <br><br>
<label>Depratment:</label>
<br><br>
<select name="department" multiple>
	<option value="math">MATHEMATICS</option>
	<option value="stat">STATISTICS</option>
	<option value="chem">CHEMISTRY</option>
	<option value="phy">PHYSICS</option>
	<option value="cse" selected>CSE</option>
	<option value="eee">EEE</option>
	<option value="me">ME</option>
	<option value="ce">CE</option>
	<option value="ipe">IPE</option>
	<option value="mme">MME</option>	
</select>
<br><br>
	<label>Batch(HSC)<span style="color: red">*</span>:</label>
	<input type="number" name="hscbatch">
	<br><br>
	<label>Address:</label><br><br>
	<textarea placeholder="Enter your address"></textarea>
	<br><br>
	<input type="submit" value="Submit">
	<input type="reset">






		</fieldset>
	</form>

</body>
</html>