<?php

require_once('../../../private/initialize.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/bicycles/index.php'));
}
$id = $_GET['id'];
$project = project::find_by_id($id);
if($project == false) {
    redirect_to(url_for('/staff/bicycles/index.php'));
}

if(is_post_request()) {

    // Delete bicycle
    $result = $project->delete();
    redirect_to(url_for('/staff/bicycles/index.php'));

} else {
    // Display form
}

?>

<?php $page_title = 'Delete Project'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>

    <div class="project delete">
        <h1>Delete Project</h1>
        <p>Are you sure you want to delete this bicycle?</p>
        <p class="item"><?php echo h($project->name); ?></p>

        <form action="<?php echo url_for('/admin/Projects/delete_project.php?id=' . h(u($id))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Bicycle" />
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
