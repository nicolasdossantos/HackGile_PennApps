<?php require_once('../../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php
if (is_get_request()) {
    $id = $_GET['id'];
    $project = project::find_by_id($id);
}

if (is_post_request()) {
    $id = $_POST['id'];
    $project = project::find_by_id($id);
    $name = $_POST['sprint_name'] ?? '';
    $dur = $_POST['sprint_duration'] ?? 2;

    $arr = array('name' => $name, 'duration' => $dur, 'project_id' => $project->id);
    $sprint = new sprint($arr);
    $sprint->save();
    redirect_to("../../project.php?id=" . $id);
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
            <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
            <button type="submit" class="btn btn-primary right">Create Sprint</button>
        </form>
    </div>
</div>


<script>
    function checkPasswordLabel() {
        let password1 = $('#password').val();
        let password2 = $('#confirmPassword').val();
        console.log(password2)
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
        $("#confirmPassword").on("focus", checkPasswordLabel);
        $("#confirmPassword").on("keyup", checkPasswordLabel);
        $("#confirmPassword").on("focusout", hideLabel);
    });
</script>