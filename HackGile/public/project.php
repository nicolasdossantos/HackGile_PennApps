<?php require_once('../private/initialize.php'); ?>

<?php
$project = project::get_default_project1();
?>

<?php $page_title = 'HackGILE - ' . $project->name; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="container teal lighten-4 z-depth-2">
    <h2 class="center z-depth-2 teal white-text"><?php echo $project->name ?></h2>

    <?php
    $sprints = $project->sprints;
    $sprint_index = 1;
    ?>

    <?php foreach($sprints as $sprint) { ?>
        <div class="row">
            <ul class="collection with-header z-depth-1">
                <li class="collection-header">
                    <?php echo "<h4> Sprint " . $sprint_index . "/" . $project->number_of_sprints() . ": " . $sprint->name
                        . "<div class='secondary-content teal-text' style='padding-right:10px;'>" . $sprint->alertTime() . "</div></h4>"
                    ?>
                    <div class="progress" style="height:10px;">
                        <div class="determinate teal" style="width: 70%">
                        </div>
                    </div>
                </li>

                <?php $stories = $sprint->stories ?>

                <?php foreach($stories as $story) { ?>
                    <li class="collection-item">
                        <?php echo "<h6 style='font-weight:bold;'>$story->title<div class='secondary-content'>Claim</div></h6>" ?>
                        <?php echo "<p> $story->description</p>" ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php $sprint_index++; } ?>
    <h5 class="center teal-text" style="font-weight:bold;">24:00 / 36:00</h5>
    <div class="progress" style="height:15px;">
        <div class="determinate teal" style="width: 70%">
        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>




