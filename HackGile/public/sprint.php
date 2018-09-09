<?php require_once('../private/initialize.php');

include(SHARED_PATH . '/public_header.php');

$sprint = null;
if(is_get_request()) {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
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
} ?>
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

        <?php foreach($stories as $story) { ?>
            <li class="collection-item">
                <?php echo "<h6 style='font-weight:bold;'>$story->title" ?>
                <?php echo "<div class='secondary-content'>" ?>
                <?php if($story->isComplete) { ?>
                    <a class='btn green btn-flat'>Complete<i class="material-icons right">check</i></a>
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
