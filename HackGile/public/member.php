<?php require_once('../private/initialize.php'); ?>
<?php $page_title = 'HackGILE - Profile'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>
<?php
    $user = member::find_by_id($_SESSION['id']);
?>
<div class="teal lighten-4" style="height:12em;"></div>
<div class="teal z-depth-2">
    <div class="container">
        <div class="row" style="margin-bottom:150px;">
            <div class="col m3">
                <div class="user-profile user-picture" style="height: 11em;" >
                    <?php echo "<img class='z-depth-2' src=" . get_gravatar_url($user->email, $user->first_name, $user->last_name, "180", true) . ">" ?>
                </div>
            </div>
            <div class="col m9">
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
