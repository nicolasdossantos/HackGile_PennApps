<?php
require_once('../private/initialize.php');

if(is_post_request()){
    $story_id = $_POST['storyValue'];
    $user_id = $_POST['userId'];

    $story = story::find_by_id($story_id);

    $arr = array("claimed_by" => $user_id);
    $story->merge_attributes($arr);
    $story->save();
}
?>