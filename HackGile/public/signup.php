<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php
if(is_post_request()){
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $_SESSION['email'] = $email;
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['logged_in'] = true;
    header("Location: member.php");
}
?>

<div class="container white z-depth-2" style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px;">
    <div class="row">
        <form method='POST' class="col s12" action="signup.php">
            <h3>Sign Up for HACKGILE!</h3>
            <div class="input-field col s12">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="E-mail">
            </div>
            <div class="input-field col s6">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="First name">
            </div>
            <div class="input-field col s6">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Last name">
            </div>
            <div class="input-field col s12">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="input-field col s12">
                <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm password">
                <label for="confirmPassword" class="red-text" id="confirm-password-label" hidden>Passwords must match.</label>
            </div>

            <button type="submit" class="btn btn-primary">Sign Up!</button>
        </form>
    </div>
</div>

<script>
    function checkPasswordLabel(){
        let password1 = $('#password').val();
        let password2 = $('#confirmPassword').val();
        console.log(password2)
        if(password1 !== password2) {
            $('#confirm-password-label').show(250);
        }
        else{
            $('#confirm-password-label').hide(250);
        }
    }

    function hideLabel(){
        $('#confirm-password-label').hide(250);
    }

    $(document).ready(function(){
        hideLabel();
        $("#confirmPassword").on("focus", checkPasswordLabel);
        $("#confirmPassword").on("keyup", checkPasswordLabel);
        $("#confirmPassword").on("focusout", hideLabel);
    });
</script>