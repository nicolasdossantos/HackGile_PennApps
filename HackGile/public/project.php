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

    if( is_post_request() ){
        $email = $_POST['email'];
        $project = project::find_by_id($_POST['id']);

        $sql = "SELECT * from members WHERE email='".$email."'";
        $result = member::find_by_sql($sql);

        if(count($result) == 1){
            $user = $result[0];
            $arr = array("project_id" => $project->id);

            $user->merge_attributes($arr);
            $user->save();
            //$database->query($sql);
        }
        redirect_to("project.php?id=".$_POST['id']);
    }
?>

<?php $page_title = $project->name; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>
<script src="timer.js"></script>
<div class="container teal lighten-4 z-depth-2">
    <h2 class="center z-depth-2 teal white-text">
        <?php echo $project->name ?>
        <span style="float:right;margin-right:20px">
            <a href="admin/Projects/edit_project.php?id=<?php echo $_GET['id']?>" class="btn btn-primary waves-effect waves-light"><i class="material-icons left">edit</i>Edit</a>
        </span>
    </h2>

    <div class="row">
        <form action="project.php?id="<?php echo $_GET['id']?> method="POST">
        <div class="col s3">
            <input type='email' name='email'>
            <label for="email">Member Email</label>
        </div>
        <div class="col s2">
            <input name="id" value="<?php echo $project->id ?>" hidden>
            <button type="submit" class="btn btn-primary waves waves-light">Add Member</button>
        </div>
        </form>
        <div class="col s2 offset-s2">
            <?php echo "<a class='btn btn-primary waves-effect waves-light' href='" . url_for("/admin/Sprints/create_sprint.php") . "?id=" . $_GET['id'] . "'>New Sprint</a>" ?>
        </div>
        <div class="col s2">
            <?php echo "<a class='btn btn-primary waves-effect waves-light' href='" . url_for("/admin/Stories/create_story.php") . "?id=" . $_GET['id'] . "'>New Story</a>" ?>
        </div>
    </div>

    <?php
        $sql = "SELECT * from sprints WHERE project_id = '".$project->id."'";
        $sprints = sprint::find_by_sql($sql);
        $number_of_sprints = count($sprints);
        $sprint_index = 1;
    ?>

    <?php $i = 0; foreach($sprints as $sprint) { ?>
        <div class="row">
            <ul class="collection with-header z-depth-1">
                <li class="collection-header">
                    <?php echo "<h4> Sprint " . $sprint_index . "/" . $number_of_sprints . ": " . $sprint->name
                        . "<div class='secondary-content black-text' style='padding-right:10px;' id='$i'></div>". " t".$i." = new timer(". "strtotime(".$sprint->alertTime().")" .",'" . $i ."');" ."</h4>"
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
                <?php$i++; } ?>
                <li class="collection-header center-align">
                    <?php $stories = story::find_all(); ?>
                    <select>
                        <option value="" disabled selected>Add Story</option>
                        <?php foreach($stories as $story){ ?>
                            <option href="project.php?">
                                <?php echo $story->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </li>
                <li class="collection-header center-align">
                    <?php echo "<a href='#' ?id='". $sprint->id . "' class='btn btn-primary btn-large green' onclick='t".$i.".startTimer();'>Start Sprint</a>" ?>
                </li>
            </ul>
        </div>
        <?php $sprint_index++; } ?>
    <h5 class="center teal-text" style="font-weight:bold;">24:00 / 36:00</h5>
    <div class="progress" style="height:15px;">
        <div class="determinate teal" style="width: 70%">
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, {classes: '', dropdownOptions: {}});
    });
</script>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
