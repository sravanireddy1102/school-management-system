<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login Form</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        if(isset($_POST['submit'])){
            $userid = $_POST['userid'];
            $password = $_POST['password'];
            $load_form = false;
            $userid_exists = 0;
            $notif='';
            if(empty($_POST['userid'])&&empty($_POST['password'])){
                $notif = 'Please enter your UserId and Password!';
                $load_form = true;
            }
            if(!empty($_POST['userid'])&&empty($_POST['password'])){
                $notif = 'Please enter your Password!';
                $load_form = true;
            }
            if(empty($_POST['userid'])&&!empty($_POST['password'])){
                $notif = 'Please enter your UserId!';
                $load_form = true;
            }
            if(!empty($_POST['userid'])&&!empty($_POST['password'])){
                $dbc = mysqli_connect('localhost', 'dbs', 'School-info123', 'schooldatabase')
                or die('Error connecting to MySQL server.');

                $query = "select count(*) from users where userid='$userid'";

                $userid_exists = mysqli_query($dbc, $query)
                or die('Error querying database1.');
                if($userid_exists==1){
                    $query = "select * from users where userid='$userid'";
                    $result = mysqli_query($dbc, $query)
                    or die('Error querying database2.');
                    $row = mysqli_fetch_array($result);
                    $pwd=$row['password'];
                    $uertype = $row['usertype'];
                    if($password==$pwd){
                        header('Location:/home.php?userid='.$userid);
                        exit();
                    }
                }
                mysqli_close($dbc);
            }
        }else{
            $load_form = true;
        }

        if($load_form){
        ?>
        <form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>"> 
            <div class="login-box">
                <h1>Login</h1>
                <div class="notif">
                    <label><?php echo "$notif" ?></label><br />
                </div>
                <div class="textbox">
                <i class="fas fa-user"></i>
                    <input type="text" placeholder="UserId" spellcheck="false" name="userid" value="<?php echo $userid ?>">
                </div>

                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" spellcheck="false" name="password" value="<?php echo $password ?>">
                </div>

                <div class="forgotPassword"><a href='forgotpwd.php'>Forgot Password</a></div>

                <input class="btn" type="submit" name="submit" value="Sign in">
            </div>
        </form>
        <?php
        }
        ?>
        
    </body>
</html>
