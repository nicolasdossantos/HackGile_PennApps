<?php require_once('../private/initialize.php');

include(SHARED_PATH . '/public_header.php');

$sprint = null;
if (is_get_request()) {
    if (isset($_GET['storyid'])) {
        $story_id = $_GET['storyid'];
        $entry = story::find_by_id($story_id);
        $arr = array("complete" => 1);

        $entry->merge_attributes($arr);
        $entry->save();

        redirect_to("sprint.php");
    } else if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
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
<script src="timer.js"></script>
<div class="container">
    <div class="row">
        <ul class="collection with-header z-depth-1">
            <li class="collection-header">
                <?php echo "<h4> Sprint " . $sprint->name
                    . "<div class='secondary-content black-text' style='padding-right:10px;' id='countdown'></div><script>t = new timer(\"" . $sprint->alertTime() . "\",'countdown');</script></h4>"
                ?>
                <?php
                $sql = "SELECT * from stories WHERE sprint_id='" . $sprint->id . "'";
                $stories = story::find_by_sql($sql);
                $completeCount = 0;
                foreach ($stories as $story) {
                    if ($story->complete) {
                        $completeCount++;
                    }
                }
                if (count($stories) == 0) {
                    return 100;
                }
                $percentage = (100 * $completeCount / count($stories));

                $statusColor = "teal";
                if ($percentage == 100) {
                    $statusColor = "green";
                }
                ?>
                <div class="progress" style="height:10px;">
                    <div class="determinate <?php echo $statusColor ?>" style="width:<?php echo $percentage ?>%">
                    </div>
                </div>
            </li>

            <?php foreach ($stories as $story) { ?>
                <li class="collection-item <?php if ($story->priority == 1) {
                    echo "green lighten-3";
                } ?>
                        <?php if ($story->priority == 2) {
                    echo "yellow lighten-2";
                } ?>
                        <?php if ($story->priority == 3) {
                    echo "red lighten-3";
                } ?>">
                    <?php echo "<h6 style='font-weight:bold;'>$story->name" ?>
                    <?php echo "<div class='secondary-content'>" ?>

                    <?php if ($story->claimed_by != 0) { ?>
                        <?php
                        $member = member::find_by_id($story->claimed_by);
                        echo
                            "<img
                                style='border-radius:50%; display:inline;margin-right:40px;'
                                src=" . get_gravatar_url($member->email, $member->first_name, $member->last_name, 35, false) .
                            ">";
                    } ?>

                    <?php if ($story->complete) { ?>
                        <a class='btn green btn-flat'>Complete<i class="material-icons right">check</i></a>
                    <?php } else { ?>
                        <a href='sprint.php?storyid=<?php echo $story->id ?>' class='btn'>Completed?</a>
                    <?php } ?>
                    <?php echo "</div></h6>" ?>

                    <?php echo "<p> $story->description</p>" ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>