<html>
<head>
<title>Add teacher</title>
</head>
<body>


<?php


$teacherid = $_POST['teacherid'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$hiredate= $_POST['hiredate'];
$sex = $_POST['sex'];
$salary = $_POST['salary'];

$dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
or die('Error connecting to MySQL server.');

$query = "INSERT INTO teachers (teacherid, name, phone, email, " .
 "address, sex, dob, hiredate, salary) " .
 "VALUES ('$teacherid', '$name', '$phone', '$email', '$address', '$sex', '$dob', " .
 "'$hiredate', 0)" ;

 $result = mysqli_query($dbc, $query)
 or die('Error querying database.');
 mysqli_close($dbc);

?>
<h2> Teacher added</h2>
</body>
</html>