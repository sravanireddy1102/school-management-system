<html>
<head>
<title>Added Subject</title>
</head>
<body>
<?php
$studentid = $_POST['studentid'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$addmissiondate= $_POST['addmissiondate'];
$parentid = $_POST['parentid'];
$classid = $_POST['classid'];
$sex = $_POST['sex'];

$dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
or die('Error connecting to MySQL server.');

$query = "INSERT INTO students (id, name, phone, email, " .
 "sex, dob, addmissiondate, address, parentid, classid) " .
 "VALUES ('$studentid', '$name', '$phone', '$email', '$sex', '$dob', " .
 "'$addmissiondate', '$address', '$parentid', " .
 "'$classid')";

 $result = mysqli_query($dbc, $query)
 or die('Error querying database.');
 mysqli_close($dbc);

?>
<h2>Student added</h2>
</body>
</html>