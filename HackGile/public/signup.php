<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    header('Location: member.php');
}

if (is_post_request()) {

    $email = mysqli_real_escape_string($database, $_POST['email'] ?? '');
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if ($password !== $confirmPassword) {
        $statusCode = 400;
        $statusMessage = "Passwords must match";
        header("Location: signup.php");
        header("Status: " . $statusCode . " " . $statusMessage);
        exit();
    }

    $sql = 'SELECT id FROM members WHERE email="' . $email . '"';
    $results = member::find_by_sql($sql);
    if (!empty($results)) {
        $statusCode = 400;
        $statusMessage = "An account with that username already exists.";
        header("Location: signup.php");
        header("Status: " . $statusCode . " " . $statusMessage);
        exit();
    }

    $sql = 'INSERT INTO members (email, first_name, last_name, hashed_password) VALUES ("'
        . $email . '", "' . $first_name . '", "' . $last_name . '", "' . hash("md5", $password) . '");';
    echo $sql;
//    $sql = "INSERT INTO members (email) VALUES (a@a.com)";
    if ($database->query($sql)) {
        $last_id = $database->insert_id;
        $_SESSION['user-id'] = $last_id;
        $_SESSION['logged_in'] = true;
        header("Location: member.php");
    }
}
?>

<div class="container white z-depth-2" style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px;">
    <div class="row">
        <form method='POST' class="col s12" action="signup.php">
            <?php if (isset($statusCode)) { ?>
                <h6 id="warning" style="padding: 20px;" class="red"><i
                            class="material-icons left">cancel</i><?php echo $statusMessage ?></h6>
            <?php } ?>
            <h3>Sign Up for HACKGILE!</h3>
            <div class="input-field col s12">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="E-mail" <?php if (isset($email)) {
                    echo "value=" . $email;
                } ?>>
            </div>
            <div class="input-field col s6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name"
                       placeholder="First name" <?php if (isset($first_name)) {
                    echo "value=" . $first_name;
                } ?>>
            </div>
            <div class="input-field col s6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name"
                       placeholder="Last name" <?php if (isset($last_name)) {
                    echo "value=" . $last_name;
                } ?>>
            </div>
            <div class="input-field col s12">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="input-field col s12">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                       placeholder="Confirm password">
                <label for="confirmPassword" class="red-text" id="confirm-password-label" hidden>Passwords must
                    match.</label>
            </div>

            <button type="submit" class="btn btn-primary">Sign Up!</button>
        </form>
    </div>
</div>

<script>
    function checkPasswordLabel() {
        let password1 = $('#password').val();
        let password2 = $('#confirmPassword').val();
        if (password1 !== password2) {
            $('#confirm-password-label').show(250);
        }
        else {
            $('#confirm-password-label').hide(250);
        }
    }

    function hideLabel() {
        $('#confirm-password-label').hide(250);
    }

    $(document).ready(function () {
        hideLabel();
        $('#warning').delay(2000).hide(250);
        $("#confirmPassword").on("focus", checkPasswordLabel);
        $("#confirmPassword").on("keyup", checkPasswordLabel);
        $("#confirmPassword").on("focusout", hideLabel);
    });
</script>