<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
    header('Location: member.php');
}

if(is_post_request()){
    $email = mysqli_real_escape_string($database, $_POST['email']);
    $hashed_password = hash("md5", mysqli_real_escape_string($database, $_POST['password']));

    $sql = "SELECT * from members WHERE email = '$email' and hashed_password = '$hashed_password'";
    $result =  member::find_by_sql($sql);

    if (count($result) == 1){
        $value = $result[0];
        $_SESSION['user-id'] = $value->id;
        $_SESSION['logged_in'] = true;
        header("Location: member.php");
    }
    else{
        $statusCode = 401;
        $statusMessage = "Invalid Credentials";
        header("Location: login.php");
        header('Status: '.$statusCode.' '.$statusMessage);
    }
}
?>

<div class="container white z-depth-2" style="padding-top: 10px; padding-bottom: 10px; margin-top: 100px;">
    <div class="row">
        <form method='POST' class="col s12" action="login.php">
            <?php if(isset($statusCode)) { ?>
                <h6 id="warning" style="padding: 20px;" class="red"><i class="material-icons left">cancel</i><?php echo $statusMessage?></h6>
            <?php } ?>
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

<script>
    $('document').ready(function(){
        $('#warning').delay(2000).hide(250);
    });
</script>