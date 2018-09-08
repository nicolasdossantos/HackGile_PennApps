<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php
if(is_post_request()){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['email'] = $email;
    $_SESSION['fname'] = "Nick";
    $_SESSION['lname'] = "DeFilippis";
    $_SESSION['logged_in'] = true;
    header("Location: member.php");
}
?>

<div class="container white z-depth-2" style="padding-top: 10px; padding-bottom: 10px; margin-top: 100px;">
    <div class="row">
        <form method='POST' class="col s12" action="login.php">
            <h3>Login to HackGile</h3>
            <div class="input-field col s12">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="E-mail">
            </div>
            <div class="input-field col s12">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>