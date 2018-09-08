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