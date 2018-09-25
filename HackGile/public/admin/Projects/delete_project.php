<?php
require_once('../../../private/initialize.php');

$project = null;
if (is_get_request()) {
    if (!isset($_GET['id'])) {
        redirect_to('../../member.php');
    }
    $id = $_GET['id'];
    $project = project::find_by_id($id);
    if ($project == false) {
        redirect_to('../../project.php?id=' . $id);
    }
}

if (is_post_request()) {
    $result = $project->delete();
    if ($result) {
        die($result);
    }
    redirect_to('../../member.php');
}

$page_title = 'Delete Project ' . $project->name;

include(SHARED_PATH . '/public_header.php');
?>

<div class="container">
    <div class="project delete">
        <h3>Delete Project <?php echo $project->name ?></h3>
        <h6>Are you sure you want to delete <?php echo $project->name ?>?</h6>
        <br>
        <br>
        <form action="<?php echo url_for('/admin/Projects/delete_project.php?id=' . h(u($id))); ?>" method="post">
            <div class="row">
                <div class="col s2">
                    <a class="btn btn-primary btn-large" href="<?php echo url_for('project.php?id=' . h(u($id))); ?>">&laquo;
                        Back</a>
                </div>
                <div class="col s2">
                    <button class="btn red btn-large" type="submit">Delete</button>
                </div>
            </div>
        </form>
    </div>

</div>
