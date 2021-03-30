<html>
    <head>
    </head>
    <body>
        <?php 
            if(isset($_POST['submit'])){
                $subjectid = $_GET['subjectid'];
                $name = $_POST['name'];
                $teacherid = $_POST['teacherid'];
                $classid = $_POST['classid'];

                $dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
                or die('Error connecting to MySQL server.');

                $query = "update subjects set name='$name' where subjectid='$subjectid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database1.');

                $query = "update subjects set teacherid='$teacherid' where id='$subjectid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database2.');

                $query = "update subjects set classid='$classid' where id='$subjectid'";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database3.');

                mysqli_close($dbc);
                echo "successfully edited";
                $load_form=false;
            }else{
                $subjectid=$_GET['subjectid'];
                
                $dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
                or die('Error connecting to MySQL server.');
                
                $query = "select * from subjects where subjectid='$subjectid'";

                $result = mysqli_query($dbc, $query)
                or die('Error querying database.');
                $row=mysqli_fetch_array($result);
                $name=$row['name'];
                $teacherid=$row['teacherid'];
                $classid=$row['classid'];
                
                mysqli_close($dbc);
                $load_form=true;
            }
            if($load_form){
                ?>
                <h2>Edit Subject</h2>
                <form method="post" action="<?php echo "/editsubject.php?subjectid=$subjectid" ?>">
                    <label for="subjectid">Subject Id:</label>
                    <input type="text" id="subjectid" name="subjectid" size="20" value="<?php echo $subjectid ?>" readonly="readonly" /><br />
                    <label for="name">Name: </label>
                    <input type="text" id="name" name="name" value="<?php echo $name ?>" /><br />
                    <label for="teacherid">teacherid: </label>
                    <input type="text" id="teacherid" name="teacherid" size="20" value="<?php echo $teacherid ?>" /><br />
                    <label for="classid">classid: </label>
                    <input type="text" id="classid" name="classid" value="<?php echo $classid ?>" /><br />
                    <input type="submit" value="Submit" name="submit" />
                </form>

            <?php
            }
            ?>


    </body>

</html>