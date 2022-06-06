<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<style>
		#filename {
			position: relative;
			top: 20px;
			left: 300px;
			font-weight: bolder;
		}
	</style>
</head>
<body>

	<?php 
		$firstname = "";
		$firstnameErrMsg = "";
		$lastname="";
		$lastnameErrMsg="";
		$gender="";
		$genderErr="";
		$email="";
		$emailErrMsg="";
		$mobilenoErr="";
		$address1Err="";
		$country="";
		$countryErr="";

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test_input($data) {
				$data = htmlspecialchars($data);
				return $data;
			}

			$firstname = test_input($_POST['firstname']);
			$lastname = test_input($_POST['lastname']);
			$gender = isset($_POST['gender']) ? test_input($_POST['gender']) : "";
			$email = test_input($_POST['email']);
			$mobileno = test_input($_POST['mobileno']);
			$address1 = test_input($_POST['address1']);
			$country = isset($_POST['country']) ? test_input($_POST['country']) : "";

		
			if (empty($firstname)) {
				$firstnameErrMsg = "First Name is Empty";
			}
			else {
				if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
				$firstnameErrMsg = "Only letters and spaces allowed.";
				}
			}
			if (empty($lastname)) {
				$lastnameErrMsg = "last Name is Empty";
			}
			else {
				if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
				$lastnameErrMsg = "Only letters and spaces allowed.";
				}
			}
			
			}
			if (empty($gender)) {
				$genderErr= "Gender not Selected";
			}
			if (empty($email)) {
				$emailErrMsg= "Email is Empty";
			}
			else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErrMsg= "Please correct email.";
				}
			}
			if (empty($mobileno)) {
				$mobilenoErr= "Mobileno is Empty";
				
			}
			if (empty($address1)) {
				$address1Err= "Street/House/Road is Empty";
			}
			if (!isset($country) or empty($country)) {
				$country= "Country not Seletect";
				
			}

	?>

	<form autocomplete="off" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
		<fieldset>
			<legend>General</legend>

			<label for="fname">First Name</label>
			<input type="text" name="firstname" id="fname" value="<?php echo $firstname; ?>">

			<span><?php echo $firstnameErrMsg; ?></span>

			<br><br>

			<label for="lname">Last Name</label>
			<input type="text" name="lastname" id="lname" value="<?php echo $lastname; ?>">
			<span><?php echo $lastnameErrMsg; ?></span>

			<br><br>

			<label>Gender</label>
			<input type="radio" name="gender" id="male" value="Male" <?php echo ($gender=='Male')?'checked':''?>>
			<label for="male">Male</label>
			<input type="radio" name="gender" id="female" value="Female" <?php echo ($gender=='Female')? 'checked':''  ?>>
			<label for="female">Female</label>
			<span><?php echo $genderErr; ?></span>
			
			<br><br>

		</fieldset>

		<fieldset>
			<legend>Contact</legend>

			<label for="email">Email</label>
			<input type="email" name="email" id="email" value="<?php echo $email; ?>">
			<span><?php echo $emailErrMsg; ?></span>

			<br><br>

			<label for="mobileno">Mobile No</label>
			<input type="text" name="mobileno" id="mobileno">
			<span><?php echo $mobilenoErr; ?></span>

			<br><br>

		</fieldset>

		<fieldset>
			<legend>Address</legend>

			<label for="address1">Street/House/Road</label>
			<input type="text" name="address1" id="address1">
			<span><?php echo $address1Err; ?></span>

			<br><br>

			<label for="country">Country</label>
			<select name="country" id="country">
				<option value="bd">Bangladesh</option>
				<option value="usa">United States of America</option>
			</select>
			<span><?php echo $countryErr; ?></span>

			<br><br>

		</fieldset>

		<input type="submit" name="submit" value="Register">
	</form>

</body>
</html>