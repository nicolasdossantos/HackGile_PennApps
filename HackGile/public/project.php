<?php require_once('../private/initialize.php');
//require_login();
?>

<?php
    if( isset($_GET['id'])) {
        $project = project::find_by_id($_GET['id']);
    }
    else{
        $project = project::get_default_project1();
    }
?>

<?php $page_title = 'HackGILE - ' . $project->name; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="container teal lighten-4 z-depth-2">
    <h2 class="center z-depth-2 teal white-text">
        <?php echo $project->name ?>
        <span style="float:right;margin-right:20px">
            <a href="admin/Projects/edit_project.php?id=<?php echo $_GET['id']?>" class="btn btn-primary waves-effect waves-light"><i class="material-icons">edit</i>Edit</a>
        </span>
    </h2>

    <?php
    $sprints = $project->sprints;
    $sprint_index = 1;
    ?>

    <?php foreach($sprints as $sprint) { ?>
        <div class="row">
            <ul class="collection with-header z-depth-1">
                <li class="collection-header">
                    <?php echo "<h4> Sprint " . $sprint_index . "/" . $project->number_of_sprints() . ": " . $sprint->name
                        . "<div class='secondary-content black-text' style='padding-right:10px;'>" . $sprint->alertTime() . "</div></h4>"
                    ?>
                    <div class="progress" style="height:10px;">
                        <div class="determinate <?php echo $sprint->getStatusColor() ?>" style="width:<?php echo $sprint->getCompletionPercentage() ?>%">
                        </div>
                    </div>
                </li>

                <?php $stories = $sprint->stories ?>

                <?php foreach($stories as $story) { ?>
                    <li class="collection-item">
                        <?php echo "<h6 style='font-weight:bold;'>$story->title" ?>
                        <?php echo "<div class='secondary-content'>" ?>
                            <?php if($story->isComplete) { ?>
                                <a class='btn green btn-flat'>Complete<i class="material-icons">check</i></a>
                            <?php } else { ?>
                                <a action='claim' class='btn btn-primary'>Claim</a>
                                <a action='assign' class='btn btn-primary'>Assign</a>
                            <?php  } ?>
                        <?php echo "</div></h6>" ?>

                        <?php echo "<p> $story->description</p>" ?>

                        <?php $members = $story->members ?>
                        <?php foreach($members as $member) { ?>
                            <?php echo
                                "<img 
                                    style='border-radius:50%; display:inline;' 
                                    src=" . get_gravatar_url($member->email, $member->first_name, $member->last_name, 35, false) .
                                ">"
                            ?>
                        <?php } ?>


                        <?php /*$substories = $story->substory ?>
                        <?php if(!empty($substories)) : ?>
                            <ul class="collection z-depth-1">
                                <?php foreach($substories as $substory) { ?>
                                    <li class="collection-item">
                                        <?php echo "<h6 style='font-weight:bold;'>$substory->title<div class='secondary-content'>Claim</div></h6>" ?>
                                        <?php echo "<p> $substory->description</p>" ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php endif; */?>
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




