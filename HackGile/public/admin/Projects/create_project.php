<?php require_once('../../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php
if (is_post_request()) {
    $name = $_POST['name'] ?? '';
    $desc = $_POST['description'] ?? '';
    $repo = $_POST['git_link'] ?? '';
    $max_members = $_POST['max_members'] ?? 5;
    $hackathon_name = $_POST['hackathon_name'] ?? '';
    $hackathon_duration = $_POST['hackathon_length'] ?? 24;
    $creator_id = $_POST['created_by_id'];

    $arr = array('name' => $name, 'description' => $desc, 'git_link' => $repo, 'max_members' => $max_members, 'hackathon_name' => $hackathon_name,
        'hackathon_duration' => $hackathon_duration);
    $project = new project($arr);
    $project->save();
    $last_id = $database->insert_id;


    $arr = array('project_id' => $last_id);
    $user = member::find_by_id($creator_id);

    $user->merge_attributes($arr);
    $user->save();


    redirect_to("../../member.php");
}
?>

<div class="container white z-depth-2" style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px;">
    <div class="row">
        <form action="create_project.php" method='POST' class="col s12">
            <h3>Create a New Project</h3>

            <div class="row">
                <div class="input-field col s12">
                    <label for="name">Project Name</label>
                    <input type="text" class="form-control" name="name"
                           placeholder="Project Name (Can be changed later)">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <label for="description">Description</label>
                    <textarea id="desc-text-area" name="description" class="materialize-textarea"
                              placeholder="Description (Optional)"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <label for="git_link">Repository Link</label>
                    <input type="url" class="form-control" name="git_link" placeholder="Repo Link">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <label for="max_members">Maximum Team Members</label>
                    <input type="number" class="form-control" name="max_members" value="4">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s8">
                    <label for="hackathon_name">Hackathon Name</label>
                    <input type="text" class="form-control" name="hackathon_name" placeholder="Hackathon Name">
                </div>
                <div class="input-field col s4">
                    <label for="hackathon_length">Hackathon Length (Hours)</label>
                    <input type="number" class="form-control" name="hackathon_length" value="24">
                </div>
            </div>
            <input type="text" name="created_by_id" value="<?php echo $_SESSION['user-id'] ?>" hidden>
            <button type="submit" class="btn btn-primary">Create Project</button>
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