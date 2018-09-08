<?php
if(is_post_request()){
    $inputUsername = mysqli_real_escape_string($_POST['username']);
    $inputPassword = mysqli_real_escape_string($_POST['password']);

    //Set up connection

    if(mysqli_num_rows($sql) == 1) {
        $row = mysqli_fetch_array($sql);
        session_start();
        $_SESSION['fname'] = $row['first_name'];
        $_SESSION['logged'] = TRUE;
        header("Location: member.php");
        exit;
    }
    else{
        header("Location: login.php");
        exit
        }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PennApps - Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<div class="login-box">
    <form action="">
        <h3>Login</h3>
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email"
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password"
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</html>