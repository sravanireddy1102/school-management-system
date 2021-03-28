<html>
<body>
<h2>Attendance Report</h2>
<?php
if(isset($_POST['submit'])){
    $studentid = $_POST['studentid'];
    $subjectid = $_POST['subjectid'];
    $percentage = $_POST['percentage'];
    $load_form = false;
    echo "submitted";
    $dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
    or die('Error connecting to MySQL server.');

    $query = "select count(*) as count from attendance where id = '$studentid' and subjectid = '$subjectid'";

    $exists = mysqli_query($dbc, $query)
    or die('Error querying database1.');
    $row = mysqli_fetch_array($exists);
    $count = $row['count'];
    if($count==1){
        $query = "update attendance set percentage = $percentage where id = '$studentid' and subjectid = '$subjectid'";
        $result = mysqli_query($dbc, $query)
        or die('Error querying database2.');

    }else{
        $query = "insert into attendance values('$studentid', '$subjectid', $percentage)";
        $result = mysqli_query($dbc, $query)
        or die('Error querying database2.');
    }
    mysqli_close($dbc);
}else{
    $load_form = true;
}
if($load_form){
?>
  <form method="post" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="studentid">Student Id:</label>
    <input type="text" id="studentid" name="studentid" value = "<?php echo $studentid ?>" /><br />
    <label for="subjectid">Subject Id:</label>
    <input type="text" id="subjectid" name="subjectid" value = "<?php echo $subjectid ?>" /><br />
    <label for="percentage">Attendance Percentage:</label>
    <input type="number" id="percentage" name="percentage" value = "<?php echo $percentage ?>" /><br />
    <input type="submit" value="Submit" name="submit" />
  </form>
  <?php
}
?>
</body>
</html>