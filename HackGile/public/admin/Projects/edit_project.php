<?php require_once('../../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>


<!--if(!isset($_GET['id'])) {-->
<!--redirect_to(url_for('/staff/bicycles/index.php'));-->
<!--}-->
<!--$id = $_GET['id'];-->
<!--$bicycle = Bicycle::find_by_id($id);-->
<!--if($bicycle == false) {-->
<!--redirect_to(url_for('/staff/bicycles/index.php'));-->
<!--}-->
<!---->
<!--if(is_post_request()) {-->
<!---->
<!--// Save record using post parameters-->
<!--$args = $_POST['bicycle'];-->
<!--$bicycle->merge_attributes($args);-->
<!--$result = $bicycle->save();-->
<!---->
<!--if($result === true) {-->
<!--$session->message('The bicycle was updated successfully.');-->
<!--redirect_to(url_for('/staff/bicycles/show.php?id=' . $id));-->
<!--} else {-->
<!--// show errors-->






<?php
if(is_post_request()){
    $name = $_POST['name'] || '';
    $desc = $_POST['desc'] || '';
    $repo = $_POST['repo'] || '';
    $max_members = $_POST['max_members'] || '';
    $hackathon_name = $_POST['hackathon_name'] || '';
    $hackathon_length = $_POST['hackathon_length'] || '';

    //Do database stuff

    header("Location: ../project.php");
}
?>

<div class="container white z-depth-2" style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px;">
    <div class="row">
        <form method='POST' class="col s12" action="edit_project.php">
            <h3>Edit Project</h3>

            <div class="row">
                <div class="input-field col s12">
                    <label for="name">Project Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Project Name (Can be changed later)">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <label for="desc">Description</label>
                    <textarea id="desc-text-area" name="desc" class="materialize-textarea" placeholder="Description (Optional)"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <label for="repo">Repository Link</label>
                    <input type="url" class="form-control" name="repo" placeholder="Repo Link">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <label for="max_members">Maximum Team Members</label>
                    <input type="number" class="form-control" name="max_members" value="4">
                </div>
                <div class="input-field col s8">
                    <a action="add_member" class="btn btn-primary">Add Member</a>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s8">
                    <label for="hackathon_name">Hackathon Name</label>
                    <input type="text" class="form-control" name="hackatho_name" placeholder="Hackathon Name">
                </div>
                <div class="input-field col s4">
                    <label for="hackathon_length">Hackathon Length (Hours)</label>
                    <input type="number" class="form-control" name="hackathon_length" value="24">
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