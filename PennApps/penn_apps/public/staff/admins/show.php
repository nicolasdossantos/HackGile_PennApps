<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$project = Projects::find_by_id($id);
echo "HELLO";

?>

<?php $page_title = 'Show Admin: ' . h($admin->full_name()); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin show">



    <div class="attributes">
      <dl>
        <dt>Project Name</dt>
        <dd><?php echo h($project->name); ?></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><?php echo h($project->description); ?></dd>
      </dl>
      <dl>
<!--        <dt>Email</dt>-->
<!--        <dd>--><?php //echo h($admin->email); ?><!--</dd>-->
<!--      </dl>-->
<!--      <dl>-->
<!--        <dt>Username</dt>-->
<!--        <dd>--><?php //echo h($admin->username); ?><!--</dd>-->
<!--      </dl>-->
    </div>

  </div>

</div>
