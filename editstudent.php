<html>
    <head>
    </head>
    <body>
        <?php 
            if(isset($_POST['submit'])){
                $studentid = $_GET['studentid'];
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

                $query = "update students set name='$name' where id='$studentid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database1.');

                $query = "update students set phone='$phone' where id='$studentid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database2.');

                $query = "update students set email='$email' where id='$studentid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database3.');

                $query = "update students set sex='$sex' where id='$studentid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database4.');

                $query = "update students set dob='$dob' where id='$studentid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database5.');

                $query = "update students set addmissiondate='$addmissiondate' where id='$studentid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database6.');

                $query = "update students set address='$address' where id='$studentid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database.');

                $query = "update students set parentid='$parentid' where id='$studentid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database.');

                $query = "update students set classid='$classid' where id='$studentid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database.');

                mysqli_close($dbc);
                echo "successfully edited";
                $load_form=false;
            }else{
                $studentid=$_GET['studentid'];
                
                $dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
                or die('Error connecting to MySQL server.');
                
                $query = "select * from students where id='$studentid'";

                $result = mysqli_query($dbc, $query)
                or die('Error querying database.');
                $row=mysqli_fetch_array($result);
                $name=$row['name'];
                $address=$row['address'];
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
            if($load_form){
                ?>
                <h2>Edit Student</h2>
                <form method="post" action="<?php echo "/editstudent.php?studentid=$studentid" ?>">
                    <label for="studentid">Student Id:</label>
                    <input type="text" id="studentid" name="studentid" size="20" value="<?php echo $studentid ?>" readonly="readonly"/><br />
                    <label for="name">Name: </label>
                    <input type="text" id="name" name="name" value="<?php echo $name ?>" /><br />
                    <label for="email">Email: </label>
                    <input type="text" id="email" name="email" size="20" value="<?php echo $email ?>" /><br />
                    <label for="dob">DOB: </label>
                    <input type="text" id="dob" name="dob" value="<?php echo $dob ?>" /><br />
                    <label for="addmissiondate">Admission Date: </label>
                    <input type="text" id="addmissiondate" name="addmissiondate" value="<?php echo $addmissiondate ?>" /><br />
                    <label for="address">Address: </label>
                    <input type="text" id="address" name="address" size="50" value="<?php echo $address ?>" /><br />
                    <label for="sex">Gender: </label>
                    <input type="text" id="sex" name="sex" size="7" value="<?php echo $sex ?>" /><br />
                    <label for="phone">Contact: </label>
                    <input type="text" id="phone" name="phone" size="13" value="<?php echo $phone ?>" /><br />
                    <label for="parentid">Parent Id: </label>
                    <input type="text" id="parentid" name="parentid" size="20" value="<?php echo $parentid ?>" /><br />
                    <label for="classid">Class Id</label>
                    <input type="text" id="classid" name="classid" size="20" value="<?php echo $classid ?>" /><br />
                    <input type="submit" value="Submit" name="submit" />
                </form>

            <?php
            }
            ?>


    </body>

</html>