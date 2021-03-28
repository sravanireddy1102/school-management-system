<!DOCTYPE html>
<html>
<head>
    <title>School Database Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="all.css">
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
 
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <img loading="lazy" src="images/p-1.png" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0"><?php echo $name ?></h4>
        <p class="font-weight-normal text-muted mb-0"><?php echo $usertype ?></p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="<?php echo "/home.php?userid=$userid" ?>" class="nav-link text-dark bg-light">
                <i class="fa fa-home mr-3 text-primary fa-fw"></i>
                home
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo "/student.php?userid=$userid" ?>" class="nav-link text-dark">
      <i class="fa fa-graduation-cap mr-3 text-primary fa-fw"></i>
                student
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo "/teachers.php?userid=$userid" ?>" class="nav-link text-dark">
                <i class="fa fa-users mr-3 text-primary fa-fw"></i>
                teachers
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo "/subjects.php?userid=$userid" ?>" class="nav-link text-dark">
                <i class="fa fa-book mr-3 text-primary fa-fw"></i>
                subjects
            </a>
    </li>
    <li class="nav-item">
      <a href="/attendance.php" class="nav-link text-dark">
                <i class="fa fa-calendar-o mr-3 text-primary fa-fw"></i>
                attendance
            </a>
    </li>
  </ul>
</div>
<!-- End vertical navbar -->


<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Menu</small></button><br />

  <!-- Demo content -->
  <div class="header">
    <img loading="lazy" src="/scl.jpg" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
    <h2 class="display-4 text-white">Vidya Vikas Vidya Samsthe</h2>
    <p class="text-white mb-0"> Basaveshwara Talkies rd, Gayatri circle, Chitradurga, Karnataka 577501</p> 
  </div>
  
  <div class="separator"></div>
  <div class="row text-white">
    <div>
      <h4 class="display-4 text-white">About</h4>
      <p class="lead">In Vidya Vikasa Vidya Samasthe® a constant attempt is made to sensitize the students towards the practical aspects of education through different activities. The students at Vidya Vikasa Vidya Samasthe® are well exposed and well trained with skills and techniques to face the challenges with full confidence and determination. Our slogan “Enlightening the minds” also states the mission of our institute.

      The Institute was found in the year 1988 by Mr.Vijaya Kumar, The secretary – Vidya Vikasa Vidya Samasthe ® to empower the students in the field of education, sports, cultural activities, scholastic and co scholastic areas. The parents appreciate for the best service rendered by our institute.</p>
      
    </div>
    <div>
      <h4 class="display-4 text-white">Vision</h4>
      <p class="lead">To offer high quality, academically sound education to a student in a supportive and understanding environment. By developing and adopting an English language curriculum from preschool to grade 12 By nurturing an atmosphere of trust between students, staff, administrators and parents.

To promote a positive attitude towards creativity, allowing students to actively engage in the learning process . By providing a wide variety of stimulating learning experiences, allowing students to acquire the concepts, skills and attitudes necessary to develop their full individual potential . By helping students to assess their own abilities and become independent learners, able to solve problems, work in groups and set priorities.</p>
    </div>
    
  </div>

</div>
<!-- End demo content -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>

