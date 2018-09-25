<?php require_once('../../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>



<?php


if (is_get_request()) {
    $projectId = $_GET['id'];
}

if (is_post_request()) {
    $projectId = $_POST['id'];
    $name = $_POST['name'] ?? '';
    $desc = $_POST['description'] ?? '';
    $priority = $_POST['priority'] ?? '';

    $arr = array("name" => $name, "description" => $desc, "project_id" => $projectId, "priority" => $priority);
    $story = new story($arr);
    $result = $story->save();


    redirect_to("../../project.php?id=" . $_POST['id']);
}
?>

<div class="container white z-depth-2" style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px;">
    <div class="row">
        <form action="create_story.php" method='POST' class="col s12">
            <h3>Create a New Story</h3>

            <div class="row">
                <div class="input-field col s12">
                    <label for="name">Story Title</label>
                    <input type="text" class="form-control" name="name"
                           placeholder="Story Title ">
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
                    <select name="priority">
                        <option value="" disabled selected>Priority</option>
                        <option value="3">High</option>
                        <option value="2">Medium</option>
                        <option value="1">Low</option>
                    </select>
                </div>
            </div>
            <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
            <button type="submit" class="btn btn-primary">Add Story</button>
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, {classes: '', dropdownOptions: {}});
    });

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