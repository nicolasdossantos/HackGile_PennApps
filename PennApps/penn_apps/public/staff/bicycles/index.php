<?php require_once('../../../private/initialize.php'); ?>
<?php
// Find all bicycles;
// use pagination instead
$projects = Projects::find_all();
?>
<?php $page_title = 'Projects'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="bicycles listing">
    <h1>Bicycles</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/bicycles/new.php'); ?>">Create a Project</a>
    </div>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Number of Members Allowed</th>
        <th>Git Link</th>
      </tr>
      <?php foreach($projects as $project) { ?>
        <tr>
          <td><?php echo h($project->id); ?></td>
          <td><?php echo h($project->name); ?></td>
          <td><?php echo h($project->description); ?></td>
          <td><?php echo h($project->max_member); ?></td>
          <td><?php echo h($project->git_id); ?></td>

          <td><a class="action" href="<?php echo url_for('/staff/bicycles/show.php?id=' . h(u($project->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/bicycles/edit.php?id=' . h(u($project->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/bicycles/delete.php?id=' . h(u($project->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php
$url = url_for('/staff/bicycles/index.php');

?>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
