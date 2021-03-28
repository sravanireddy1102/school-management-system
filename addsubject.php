<html>
<head>
<title>Add subject</title>
</head>
<body>

<?php


$subjectid = $_POST['subjectid'];
$name = $_POST['name'];
$teacherid = $_POST['teacherid'];
$classid = $_POST['classid'];

$dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
or die('Error connecting to MySQL server.');

$query = "INSERT INTO subjects(subjectid, name, teacherid, classid) " .
 "VALUES ('$subjectid', '$name', '$teacherid', '$classid')" ;

 $result = mysqli_query($dbc, $query)
 or die('Error querying database.');
 mysqli_close($dbc);

?>
<h2>Subject added</h2>

</body>
</html>