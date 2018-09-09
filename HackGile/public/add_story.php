<?php
require_once('../private/initialize.php');

if(is_post_request()){
    $story_id = $_POST['storyValue'];
    $sprint_id = $_POST['sprintValue'];

    $story = story::find_by_id($story_id);

    $arr = array("sprint_id" => $sprint_id);
    $story->merge_attributes($arr);
    $story->save();
}
?>