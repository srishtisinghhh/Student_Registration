<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$studentId = $_POST['studentId'];
	$course = $_POST['course'];
	$dept = $_POST['dept'];
	$number = $_POST['number'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$parentName = $_POST['parentName'];
    $semester = $_POST['semester'];
	$gpa = $_POST['gpa'];


	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, studentId, course, dept, number, email, dob, gender, parentName, semester, gpa) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param( "sssssissssii",$firstName, $lastName, $studentId, $course, $dept, $number, $email, $dob, $gender, $parentName, $semester, $gpa);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registered successfully...";
		$stmt->close();
		$conn->close();
	}
?>