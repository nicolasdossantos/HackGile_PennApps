<?php require_once('../private/initialize.php'); ?>

<?php
    $project = project::get_default_project1();
?>

<?php $page_title = 'HackGILE - ' . $project->name; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="container grey lighten-1">
    <h3><?php echo $project->name ?></h3>

    <?php $sprints = $project->sprints ?>

    <?php foreach($sprints as $sprint) { ?>
        <div class="row">
            <?php echo "<h5> Sprint " . $sprint->number . "/" . $project->number_of_sprints() . "</h5>" ?>

            <?php $stories = $sprint->stories ?>

            <?php foreach($stories as $story) { ?>
                <div class="row">
                    <?php echo "<p>" . $story->title . "</p>" ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>




