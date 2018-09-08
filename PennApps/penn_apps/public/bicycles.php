<?php require_once('../private/initialize.php'); ?>

<?php $page_title ="Projects" ; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/AdobeStock_55807979_thumb.jpeg') ?>" />
      <h2>Our Inventory of Used Bicycles</h2>
      <p>Choose the bike you love.</p>
      <p>We will deliver it to your door and let you try it before you buy it.</p>
    </div>

    <table id="inventory">
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Group Capacity</th>
        <th>Git Link</th>

        <th>&nbsp;</th>
      </tr>

<?php

$projects = Projects::find_all();

?>
      <?php foreach($projects as $project) { ?>
      <tr>
        <td><?php echo h($project->name); ?></td>
          <td><?php echo h($project->description); ?></td>
          <td><?php echo h($project->max_member); ?></td>
          <td><?php echo h($project->git_link); ?></td>


        <td><a href="detail.php?id=<?php echo $bike->id; ?>">View</a></td>
      </tr>
      <?php } ?>

    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
