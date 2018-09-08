<?php require_once('../private/initialize.php'); ?>

require_login();

<?php $page_title = 'HackGILE - Profile'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>
<?php
$user = member::GetDefaultMember1();
?>
<div class="teal lighten-4" style="height:10em;"></div>
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
                    <?php echo "<h4 style='font-weight:bold;'>" . $user->getFullName() . "</h4>" ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container white z-depth-2">
    <div clas="row">
        <ul class="collection with-header">
            <li class="collection-header">
                <h2>Projects</h2>
            </li>
            <?php
            $projects = $user->getAssociatedProjects();
            ?>
            <?php if(empty($projects)): ?>
                <li class="collection-item">
                    No projects yet
                </li>
            <?php else: ?>
                <?php foreach($projects as $project){ ?>
                    <li class="collection-item">
                        <a href="<?php echo url_for('/project.php'); ?>">
                            <div class="row">
                                <p><?php echo h($project->name); ?></p>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            <?php endif; ?>
        </ul>
    </div>


</div>
