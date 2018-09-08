<?php require_once('../private/initialize.php'); ?>

require_login();

<?php $page_title = 'HackGILE - Profile'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>
<?php
    $user = member::GetDefaultMember1();
?>
<div class="grey" style="height:15em;"></div>
<div class="teal">
<div class="container">
    <div class="row">
        <div class="col m2">
        <div class="user-profile user-picture">
            <?php echo "<img src=" . get_gravatar_url($_SESSION['email'], $_SESSION['fname'], $_SESSION['lname'], "180", false) . ">" ?>
        </div>
        </div>
        <div class="col m10">
            <div class="user-profile user-description">
            <?php echo "<h4><strong>" . $user->getFullName() . "</strong></h4>" ?>
            </div>
        </div>
        </div>
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
