<?php require_once('../../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php

$project = null;
if (is_get_request()) {
    if (!isset($_GET['id'])) {
        redirect_to('../../signup.php');
    }
    $id = $_GET['id'];
    $project = project::find_by_id($id);
    if ($project == false) {
        redirect_to('../../index.php');
    }
}

if (is_post_request()) {

    $id = $_POST['id'];
    $project = project::find_by_id($id);

    $name = $_POST['name'] ?? '';
    $desc = $_POST['description'] ?? '';
    $repo = $_POST['git_link'] ?? '';
    $max_members = $_POST['max_members'] ?? 5;
    $hackathon_name = $_POST['hackathon_name'] ?? '';
    $hackathon_length = $_POST['hackathon_length'] ?? 24;

    $args = array('name' => $name, 'description' => $desc, 'git_link' => $repo, 'max_members' => $max_members);

    $project->merge_attributes($args);
    $result = $project->save();
    redirect_to("../../project.php?id=" . $id);
}


//  if($result === true) {
//    $session->message('The bicycle was updated successfully.');
//    redirect_to(url_for('/staff/bicycles/show.php?id=' . $id));
//  } else {
//    // show errors
//  }
?>

<div class="container white z-depth-2" style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px;">
    <div class="row">
        <form action="edit_project.php" method='POST' class="col s12">
            <h3>Edit <?php echo $project->name; ?></h3>

            <div class="row">
                <div class="input-field col s12">
                    <label for="name">Project Name</label>
                    <input type="text" class="form-control" name="name"
                           placeholder="Project Name (Can be changed later)" value="<?php echo h($project->name); ?>">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <label for="description">Description</label>
                    <textarea id="desc-text-area" name="description" class="materialize-textarea"
                              placeholder="Description (Optional)"><?php echo h($project->description); ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <label for="git_link">Repository Link</label>
                    <input type="url" class="form-control" name="git_link" placeholder="Repo Link"
                           value="<?php echo h($project->git_link); ?>">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <label for="max_members">Maximum Team Members</label>
                    <input type="number" class="form-control" name="max_members"
                           value="<?php echo h($project->max_members); ?>">
                </div>
                <div class="input-field col s8">
                    <a action="add_member" class="btn btn-primary">Add Member</a>
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

            <div class="row">
                <div class="input-field col s6">
                    <a action="add_sprint" class="btn btn-primary">Add Sprint</a>
                </div>

            </div>
            <hr>
            <input type="text" name="id" value='<?php echo "$project->id" ?>' hidden>
            <button type="submit" class="btn btn-primary right">Submit Event</button>
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
</script></script>