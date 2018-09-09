<?php require_once('../private/initialize.php'); ?>
<?php $page_title = 'HackGILE - Profile'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>
<?php
    $user = member::find_by_id($_SESSION['id']);
?>
<div class="user-profile teal lighten-4 z-depth-2" style="height:12em;border-bottom: 15px solid #009688; margin-bottom:100px;">
    <div class="container">
        <div class="row" style="height:50px; padding-top: 5em">
            <div class="col m2">
                <div class="user-picture" style="height: 10em;" >
                    <?php echo "<img class='z-depth-2' src=" . get_gravatar_url($user->email, $user->first_name, $user->last_name, "150", true) . ">" ?>
                </div>
            </div>
            <div class="col m8">
                <div class="user-description">
                    <?php echo "<h4 style='font-weight:bold;'>" . $user->getFullName() . "</h4>" ?>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container white z-depth-2">
    <div clas="row">
        <ul class="collection with-header">
            <li class="collection-header">
                <h3>Projects
                    <?php echo "<a class='secondary-content btn btn-primary' href=".url_for("admin/Projects/create_project.php").">
                            <i class='material-icons left'>add</i>Create New Project</a>"; ?>
                </h3>
            </li>
            <?php
            $projects = project::find_all();
            ?>
            <?php if(empty($projects)): ?>
                <li class="collection-item">
                    No projects yet
                </li>
            <?php else: ?>
                <?php foreach($projects as $project){ ?>
                    <li class="collection-item">
                        <?php echo "
                            <a href=" . url_for('/project.php') . "?id=" . $project->id . ">";
                        ?>

                        <div class="row">
                            <p><?php echo h($project->name); ?></p>
                        </div>
                    </li>
                <?php } ?>
            <?php endif; ?>
        </ul>
    </div>


</div>
