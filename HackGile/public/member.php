<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'HackGILE - Profile'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php
$user = member::GetDefaultMember1();
$gravatar_hash = md5(strtolower(trim(h($user->getEmail()))));
?>
<div class="grey" style="height:15em;"></div>
<div class="container">
    <div class="user-profile row">
        <div class="col m3">
            <?php echo "<img src=https://www.gravatar.com/avatar/". $gravatar_hash . "?s=180&d=mp>" ?>
        </div>
        <div class="col m9">
            <?php echo "<h4>" . $user->getFullName() . "</h4>" ?>
        </div>
    </div>
</div>
<div class="container">
    <h2>
        Projects
    </h2>
    <?php
    $projects = $user->getAssociatedProjects();
    ?>
    <?php if(empty($projects)): ?>
        <p>No projects yet</p>
    <?php else: ?>
        <?php foreach($projects as $project){ ?>
            <a href="<?php echo url_for('/project.php'); ?>">
                <div class="row">
                    <p><?php echo h($project->name); ?></p>
                </div>
            </a>
        <?php } ?>
    <?php endif; ?>
</div>
<?php include(SHARED_PATH . '/public_footer.php'); ?>
