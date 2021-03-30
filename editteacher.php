<html>
    <head>
    </head>
    <body>
        <?php 
            if(isset($_POST['submit'])){
                $teacherid = $_GET['teacherid'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $dob = $_POST['dob'];
                $phone = $_POST['phone'];
                $hiredate= $_POST['hiredate'];
                $salary=$_POST['salary'];
                $sex = $_POST['sex'];

                echo "$teacherid <br />";
                echo "$name <br ?>";
                echo "$email <br />";
                echo "$salary <br />";
                echo "$address <br />";
                echo "$dob <br />";
                echo "$sex <br />";
                echo "$phone <br />";
                echo "$hiredate <br />";
                echo "Query updated";
                $dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
                or die('Error connecting to MySQL server.');

                $query = "update teachers set name='$name' where teacherid='$teacherid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database1.');

                $query = "update teachers set phone='$phone' where teacherid='$teacherid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database2.');

                $query = "update teachers set email='$email' where teacherid='$teacherid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database3.');

                $query = "update teachers set sex='$sex' where teacherid='$teacherid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database4.');

                $query = "update teachers set dob='$dob' where teacherid='$teacherid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database5.');

                $query = "update teachers set hiredate='$hiredate' where teacherid='$teacherid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database6.');

                $query = "update teachers set address='$address' where teacherid='$teacherid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database.');

                $query = "update teachers set salary=$salary where teacherid='$teacherid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database.');

                mysqli_close($dbc);
                $load_form=false;
            }else{
                $teacherid=$_GET['teacherid'];
                
                $dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
                or die('Error connecting to MySQL server.');
                
                $query = "select * from teachers where teacherid='$teacherid'";

                $result = mysqli_query($dbc, $query)
                or die('Error querying database.');
                $row=mysqli_fetch_array($result);
                $name=$row['name'];
                $address=$row['address'];
                $phone=$row['phone'];
                $email=$row['email'];
                $sex=$row['sex'];
                $dob=$row['dob'];
                $hiredate=$row['hiredate'];
                $address=$row['address'];
                $salary=$row['salary'];
                
                mysqli_close($dbc);
                $load_form=true;
            }
            if($load_form){
                ?>
                <h2>Edit Teacher</h2>
                <form method="post" action="<?php echo "/editteacher.php?teacherid=$teacherid" ?>">
                    <label for="teacherid">Teacher Id:</label>
                    <input type="text" id="teacherid" name="teacherid" size="20" value="<?php echo $teacherid ?>" readonly="readonly"/><br />
                    <label for="name">Name: </label>
                    <input type="text" id="name" name="name" value="<?php echo $name ?>" /><br />
                    <label for="email">Email: </label>
                    <input type="text" id="email" name="email" size="20" value="<?php echo $email ?>" /><br />
                    <label for="dob">DOB: </label>
                    <input type="text" id="dob" name="dob" value="<?php echo $dob ?>" /><br />
                    <label for="hiredate">Hire Date: </label>
                    <input type="text" id="hiredate" name="hiredate" value="<?php echo $hiredate ?>" /><br />
                    <label for="address">Address: </label>
                    <input type="text" id="address" name="address" size="30" value="<?php echo $address ?>" /><br />
                    <label for="sex">Gender: </label>
                    <input type="text" id="sex" name="sex" size="7" value="<?php echo $sex ?>" /><br />
                    <label for="phone">Contact: </label>
                    <input type="text" id="phone" name="phone" size="13" value="<?php echo $phone ?>" /><br />
                    <label for="salary">Salary: </label>
                    <input type="number" id="salary" name="salary" value="<?php echo $salary ?>" /><br />
                    <input type="submit" value="Submit" name="submit" />
                </form>

            <?php
            }
            ?>


    </body>

</html>