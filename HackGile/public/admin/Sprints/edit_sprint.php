<?php require_once('../../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php
if(is_post_request()){ //TODO Change to edit
    $name = $_POST['sprint_name'] ?? '';
    $dur = $_POST['sprint_duration'] ?? 2;

    $sprint = new sprint($name, $dur);
    $sprint->save();

    //Do database stuff

    //redirect_to("create_sprint.php");
}
?>

<div class="container white z-depth-2" style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px;">
    <div class="row">
        <form action="create_sprint.php" method='POST' class="col s12">
            <h3>Create a New Sprint</h3>

            <div class="row">
                <div class="input-field col s8">
                    <label for="sprint_name">Sprint Name</label>
                    <input type="text" class="form-control" name="sprint_name" placeholder="Sprint Name">
                </div>
                <div class="input-field col s4">
                    <label for="sprint_duration">Sprint Duration (Hours)</label>
                    <input type="number" class="form-control" name="sprint_duration" value="2">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <a action="add_sprint" class="btn btn-primary">Add Sprint</a>
                </div>

            </div>
            <hr>
            <button type="submit" class="btn btn-primary right">Submit Event</button>
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