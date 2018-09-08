<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'HackGILE - Profile'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php
    $user = member::GetDefaultMember1();
    $gravatar_hash = md5(strtolower(trim(h($user->getEmail()))));
?>
<div class="grey" style="height:15em;"></div>
<div class="user-profile">
    <?php echo "<img src=https://www.gravatar.com/avatar/". $gravtar_hash . "?d=mp>" ?>
</div>
<div class="container">
    <h2>
        Projects
    </h2>
    <?php
        $projects = Projects::find_all_for_user($username);
    ?>
    <?php if(empty($projects)): ?>
        <p>No projects yet</p>
    <?php else: ?>
        <?php foreach($projects as $project){ ?>
        <div class="row">
            <p><?php echo h($project->title); ?></p>
        </div>
        <?php } ?>
    <?php endif; ?>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
