<html>
    <head>
        <title>School Database Project</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php
    //$load_form=false;
    $userid=$_GET['userid'];
    $dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
    or die('Error connecting to MySQL server.');
    $query = "select * from users where userid='$userid'";
    $result = mysqli_query($dbc, $query)
    or die('Error querying database1.');
    $row = mysqli_fetch_array($result);
    $usertype = $row['usertype'];
    $user_name = $row['name'];
    mysqli_close($dbc);
        if(isset($_POST['submit'])){
            if(!empty($_POST['studentid'])){
                $student_id=$_POST['studentid'];
                $dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
                or die('Error connecting to MySQL server.');

                $query = "select * from users where userid='$userid'";

                $result = mysqli_query($dbc, $query)
                or die('Error querying database1.');
                $row = mysqli_fetch_array($result);
                $usertype = $row['usertype'];
                $user_name = $row['name'];
                
                $query = "select * from students where id='$student_id'";

                $result = mysqli_query($dbc, $query)
                or die('Error querying database.');
                $row=mysqli_fetch_array($result);
                $name=$row['name'];
                $phone=$row['phone'];
                $email=$row['email'];
                $sex=$row['sex'];
                $dob=$row['dob'];
                $addmissiondate=$row['addmissiondate'];
                $address=$row['address'];
                $parentid=$row['parentid'];
                $classid=$row['classid'];
                
                mysqli_close($dbc);
                $load_form=true;
            }
            
        }
        else{
            $load_form=true;
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
                <form method = "post" action = "<?php echo "/student.php?userid=$userid" ?>">
                    <div class="search"> 
                        <h2>Enter the Student ID</h2>
                        <input class="enter" type="text" placeholder="  StudentId" spellcheck="false" name="studentid" value="<?php echo $student_id ?>">
                        <input class="btn" type="submit" name="submit" value="Submit">
                    </div>
                </form>
                </form>
                    <form method="post" action="/addstudent.html">
                    <div class="add">
                    <input class="btn" type="submit" name="submit" value="Add Student">
                    </div>
                </form>
            </div>
                <?php
                if(isset($_POST['submit'])){
                    ?>
            <div class="container">
                <form method="post" action="<?php echo "/editstudent.php?studentid=$student_id" ?>">
                    <div class="edit">
                        <input type="submit" class="btn" name="editprofile" value="Edit Profile"/>
                    </div>
                </form>   
                <div class="head">
                <h5>
                    <?php echo $name ?>
                </h5> 
                <h6>
                    Student
                </h6> 
                </div> 
                     
                <p class="proile-rating">RANKINGS : <span>8/10</span></p>                       
                
                <div class="row">
                        <label>Student Id</label>
                        <p><?php echo $student_id ?></p>
                </div>
                <div class="row">
                        <label>Name</label>
                        <p><?php echo $name ?></p>
                </div>
                <div class="row">
                        <label>Email</label>
                        <p><?php echo $email ?></p>
                </div>
                <div class="row">
                        <label>Phone</label>
                        <p><?php echo $phone ?></p>
                </div>
                <div class="row">
                        <label>Address</label>
                        <p><?php echo $address ?></p>
                    </div>
                </div>
                <!--<div class="row">
                        <label>DOB</label>
                        <p><?php echo $dob ?></p>
                </div>
                <div class="row">
                        <label>Admission Date</label>
                        <p><?php echo $addmissiondate ?></p>
                </div>
                <div class="row">
                        <label>Gender</label>
                        <p><?php echo $sex ?></p>
                </div>-->

                <?php
                }
            }
            ?>
        
    </body>
    </html>


    