<?php require_once('../private/initialize.php'); ?>
<html>
<head>
    <title>TEST</title>
</head>
<body>
<p><?php
$argsp = ['name'=>'Hackagile','Implements Scrum into hackathons', 4, 'website', 12];
$args = ['name'=>'sprint 1','duration' => 2];
$project = new project($argsp);
echo $project->name;
$sprint = $project->create_sprint('test 1', 20);
echo $sprint->duration;

?></p>
<p>hello</p>

</body>
</html>