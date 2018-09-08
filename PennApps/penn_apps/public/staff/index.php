<?php require_once('../../private/initialize.php'); ?>
<?php
$args = ['Test','Test','Test','TEst'];
$test = new Projects($args) ?>

<?php require_login(); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_for('/staff/bicycles/index.php'); ?>">Bicycles</a></li>
      <li><a href="<?php echo url_for('/staff/admins/index.php'); ?>">Admins</a></li>
      <li><?php echo $test->name; ?></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
