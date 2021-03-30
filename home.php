<!DOCTYPE html>
<html>
<head>
    <title>School Database Project</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <?php
  $userid=$_GET['userid'];
    $dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
    or die('Error connecting to MySQL server.');

    $query = "select * from users where userid='$userid'";

    $result = mysqli_query($dbc, $query)
    or die('Error querying database1.');
    $row = mysqli_fetch_array($result);
    $usertype = $row['usertype'];

    $query = "select * from students where id='$userid'" ;

    $result = mysqli_query($dbc, $query)
    or die('Error querying database2.');
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    mysqli_close($dbc);
    ?>
<div class = "wraper">
  <div class = "sidebar">
    <img src = "/img1.jpg"/>
    <h4><?php echo $name ?></h4>
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
  <div class = "header">
    <img src = "/scl.jpg" alt = "logo"/>
    <div class="header-body">
      <h1 style = "color:rgb(59, 45, 139)">Vidya Vikas Vidya Samsthe</h1>
      <p style = "color:rgb(59, 45, 139)">Basaveshwara Talkies rd, Gayatri circle, Chitradurga, Karnataka 577501</p>
    </div>
    <div class="content">
      <h4 >About</h4>
      <p class="p1">In Vidya Vikasa Vidya Samasthe a constant attempt is made to sensitize the students towards the practical aspects of education through different activities. The students at Vidya Vikasa Vidya Samasthe® are well exposed and well trained with skills and techniques to face the challenges with full confidence and determination. Our slogan “Enlightening the minds” also states the mission of our institute.

      The Institute was found in the year 1988 by Mr.Vijaya Kumar, The secretary – Vidya Vikasa Vidya Samasthe to empower the students in the field of education, sports, cultural activities, scholastic and co scholastic areas. The parents appreciate for the best service rendered by our institute.</p>
      <h4 >Vision</h4>
      <p class="p2">To offer high quality, academically sound education to a student in a supportive and understanding environment. By developing and adopting an English language curriculum from preschool to grade 12 By nurturing an atmosphere of trust between students, staff, administrators and parents.

      To promote a positive attitude towards creativity, allowing students to actively engage in the learning process . By providing a wide variety of stimulating learning experiences, allowing students to acquire the concepts, skills and attitudes necessary to develop their full individual potential . By helping students to assess their own abilities and become independent learners, able to solve problems, work in groups and set priorities.</p>
  </div>
</div>
