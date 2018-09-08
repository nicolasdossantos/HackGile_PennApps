<?php require_once('../private/initialize.php'); ?>
<html>
<head>
    <title>TEST</title>
</head>
<body>
<p><?php

$args = ['email'=>'nicolas@icloud.com', 'fname' => 'Nick', 'lname'=>'Santos','is_admin'=> 1];
$member = new member($args);

print_r($member);

$result = $member->save();
if($result){
    echo "HELLO";

}else{
    echo "MEh";
}

?></p>
<p>hello</p>

</body>
</html>