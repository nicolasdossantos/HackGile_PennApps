<?php

require_once('../../../private/initialize.php');


if (!isset($_GET['id'])) {
    redirect_to(url_for('/project.php'));
}
$id = $_GET['id'];
$sprint = sprint::find_by_id($id);
if ($sprint == false) {
    redirect_to(url_for('/project.php'));
}

if (is_post_request()) {

    // Delete bicycle
    $result = $sprint->delete();
    redirect_to(url_for('/project.php'));

} else {
    // Display form
}

?>

<?php $page_title = 'Delete Sprint'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

    <div id="content">

        <a class="back-link" href="<?php echo url_for('/project.php'); ?>">&laquo; Back to Project</a>

        <div class="project delete">
            <h1>Delete Sprint</h1>
            <p>Are you sure you want to delete this sprint?</p>
            <p class="item"><?php echo h($sprint->name); ?></p>

            <form action="<?php echo url_for('/admin/Projects/delete_sprint.php?id=' . h(u($id))); ?>" method="post">
                <div id="operations">
                    <input type="submit" name="commit" value="Delete Sprint"/>
                </div>
            </form>
        </div>

    </div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>