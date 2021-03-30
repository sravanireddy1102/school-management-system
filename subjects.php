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
            if(!empty($_POST['subjectid'])){
                $subject_id=$_POST['subjectid'];
                $dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
                or die('Error connecting to MySQL server.');
                
                $query = "select * from subjects where subjectid='$subject_id'";

                $result = mysqli_query($dbc, $query)
                or die('Error querying database.');
                $row=mysqli_fetch_array($result);
                $name=$row['name'];
                $teacherid=$row['teacherid'];
                $classid=$row['classid'];

                $query1 = "select * from teachers where teacherid='$teacherid'";

                $result1 = mysqli_query($dbc, $query1)
                or die('Error querying database.');
                $row=mysqli_fetch_array($result1);
                
                $teachername = $row['name'];
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
            <form method = "post" action = "<?php echo "/subjects.php?userid=$userid" ?>"> 
                <div class="search">
                    <h2>Enter the SubjectId</h2>
                   
                        <lable><?php echo "$notif" ?></lable><br />
                        <input class="enter" type="text" placeholder="SubjectId" spellcheck="false" name="subjectid" value="<?php echo $subject_id ?>">
                   
                    <input class="btn" type="submit" name="submit" value="Submit">
                </div>
                </form>
                <form method="post" action="/addsubject.html">
                    <div class="add">
                    <input class="btn" type="submit" name="submit" value="Add Subject">
                    </div>
                </form>


                
            </div>
                <?php
                if(isset($_POST['submit'])){
                    ?>
            <div class="container">
                <form method="post" action="<?php echo "/editsubject.php?subjectid=$subject_id" ?>">
                    <div class="edit">
                        <input type="submit" class="btn" name="editprofile" value="Edit Profile"/>
                    </div>
                </form> 
                <div class="head">
                <h5>
                    <?php echo $name ?>
                </h5> 
                <h6>
                    Subject
                </h6> 
                </div> 
                    
                <div class="row">
                        <label>Subject Id</label>
                        <p><?php echo $subject_id ?></p>
                </div>
                <div class="row">
                        <label>Subject Name</label>
                        <p><?php echo $name ?></p>
                </div>
                <div class="row">
                        <label>Teacher Id</label>
                        <p><?php echo $teacherid ?></p>
                </div>
                <div class="row">
                        <label>Teacher Name</label>
                        <p><?php echo $teachername ?></p>
                </div>
                <div class="row">
                        <label>Class Id</label>
                        <p><?php echo $classid ?></p>
                    </div>
                </div>

                <?php
                }
            }
            ?>
        
    </body>
    </html>