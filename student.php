<html>
    <head>
        <title>School Database Project</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="profile.css">
        <link rel="stylesheet" href="all.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        <!-- Vertical navbar -->
        <div class="vertical-nav bg-white" id="sidebar">
            <div class="py-4 px-3 mb-4 bg-light">
                <div class="media d-flex align-items-center">
                <img loading="lazy" src="images/p-1.png" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <div class="media-body">
                    <h4 class="m-0"><?php echo $user_name ?></h4>
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
        <form method = "post" action = "<?php echo "/student.php?userid=$userid" ?>"> 
            <div class="student-box">
                <h4>Enter the StudentId</h4>
                <div class="notif">
                    <lable><?php echo "$notif" ?></lable><br />
                </div>
                <div class="textbox">
                <!--<i class="fas fa-user"></i>-->
                    <input type="text" placeholder="StudentId" spellcheck="false" name="studentid" value="<?php echo $student_id ?>">
                </div>
                <input class="btn" type="submit" name="submit" value="Submit">
                
            </div>
        </form>
            <form method="post" action="/addstudent.html">
            <div class="col-md-2">
            <input class="btn" type="submit" name="submit" value="Add Student">
                <!--<input type="submit" class="profile-edit-btn" name="btnAddMore" value="Add Student"/>-->
            </div>
        </form>
            <?php
            if(isset($_POST['submit'])){
                ?>
        <div class="container emp-profile">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                                    <div class="file btn btn-lg btn-primary">
                                        Change Photo
                                        <input type="file" name="file"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                            <h5>
                                                <?php echo $name ?>
                                            </h5>
                                            <h6>
                                                Student
                                            </h6>
                                            <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <form method="post" action="<?php echo "/editstudent.php?studentid=$student_id" ?>">
                            <div class="col-md-2">
                                <input type="submit" class="btn" name="editprofile" value="Edit Profile"/>
                            </div>
                            </form>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Student Id</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $student_id ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $name ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $email ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Phone</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $phone ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $address ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>DOB</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $dob ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Admission Date</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $addmissiondate ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Gender</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $sex ?></p>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>           
        </div>
        <?php
            }
            ?>
            
        </form>
        <?php
        }
        ?>

        </div>
        <!-- End demo content -->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="main.js"></script>
        
    </body>
    </html>


    