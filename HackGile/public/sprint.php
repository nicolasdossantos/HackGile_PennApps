<?php require_once('../private/initialize.php');

include(SHARED_PATH . '/public_header.php');

$sprint = null;
if(is_get_request()) {
    if (isset($_GET['storyid'])){
        $story_id = $_GET['storyid'];
        $entry = story::find_by_id($story_id);
        $arr = array("complete" => 1);

        $entry->merge_attributes($arr);
        $entry->save();

        redirect_to("sprint.php");
    }
    else if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $_SESSION['sprint-id'] = $id;
            $sprint = sprint::find_by_id($id);
        } else if (isset($_SESSION['sprint-id'])) {
            $id = $_SESSION['sprint-id'];
            $sprint = sprint::find_by_id($id);
        } else {
            redirect_to("member.php");
        }
    } else {
        redirect_to("index.php");
    }
}
?>
<div class="container">
    <div class="row">
        <ul class="collection with-header z-depth-1">
            <li class="collection-header">
                <?php echo "<h4>" . $sprint->name . "<div class='secondary-content black-text' style='padding-right:10px;'>" . $sprint->alertTime() . "</div></h4>"?>
                <div class="progress" style="height:10px;">
                    <div class="determinate <?php echo $sprint->getStatusColor() ?>" style="width:<?php echo $sprint->getCompletionPercentage() ?>%">
                    </div>
                </div>
            </li>

            <?php $stories = $sprint->stories ?>

            <?php
            $sql = "SELECT * from stories WHERE sprint_id='". $sprint->id ."'";
            $stories = story::find_by_sql($sql);
            ?>

            <?php foreach($stories as $story) { ?>
                <li class="collection-item <?php if($story->priority == 1){ echo "green lighten-3"; }?>
                        <?php if($story->priority == 2){ echo "yellow lighten-2"; }?>
                        <?php if($story->priority == 3){ echo "red lighten-3"; }?>">
                    <?php echo "<h6 style='font-weight:bold;'>$story->name" ?>
                    <?php echo "<div class='secondary-content'>" ?>
                    <?php if($story->complete) { ?>
                        <a class='btn green btn-flat'>Complete<i class="material-icons right">check</i></a>
                    <?php } else { ?>
                        <a href='sprint.php?storyid=<?php echo $story->id ?>' class='btn'>Completed?</a>
                    <?php  } ?>
                    <?php echo "</div></h6>" ?>

                    <?php echo "<p> $story->description</p>" ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>