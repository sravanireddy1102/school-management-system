<html>
<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">   
        <link rel="stylesheet" href="styles.css">
</head>
<body>

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
  
  <div class = "wraper">
            <div class = "sidebar">
                <img src = "/img1.jpg"/>
                <h4><?php echo $user_name ?></h4>
                <p><?php echo $usertype ?></p>
                <div class = "nav-body">  
                    <h2>Dashboard</h2>
                    <ul>
                        <li class="nav-item">
                        <a href="<?php echo "/home.php?userid=$userid" ?>">
                                    <i class="fa fa-home mr-3 text-primary fa-fw"></i>
                                    Home
                                </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?php echo "/student.php?userid=$userid" ?>">
                        <i class="fa fa-graduation-cap mr-3 text-primary fa-fw"></i>
                                    Student
                                </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?php echo "/teachers.php?userid=$userid" ?>">
                                    <i class="fa fa-users mr-3 text-primary fa-fw"></i>
                                    Teachers
                                </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?php echo "/subjects.php?userid=$userid" ?>">
                                    <i class="fa fa-book mr-3 text-primary fa-fw"></i>
                                    Subjects
                                </a>
                        </li>
                        <li class="nav-item">
                        <a href="/attendance.php" >
                                    <i class="fa fa-calendar-o mr-3 text-primary fa-fw"></i>
                                    Attendance
                                </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
            
            <form method="post" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="search">
              <h2>Attendance Report</h2>
              <label for="studentid">Student Id:</label>
              <input class="enter" type="text" id="studentid" name="studentid" value = "<?php echo $studentid ?>" /><br />
              <label for="subjectid">Subject Id:</label>
              <input  class="enter" type="text" id="subjectid" name="subjectid" value = "<?php echo $subjectid ?>" /><br />
              <label for="percentage">Attendance Percentage:</label>
              <input  class="enter" type="number" id="percentage" name="percentage" value = "<?php echo $percentage ?>" /><br />
              <input type="submit" value="Submit" name="submit" />
</div>
            </form>
          </div>
  <?php
}
?>
</body>
</html>