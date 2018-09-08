<!doctype html>

<html lang="en">
<head>
    <title>Chain Gang <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
</head>

<body>

<header>
    <nav>
        <div class="nav-wrapper teal">
            <div class="container">
                <a href="<?php echo url_for('/index.php'); ?>" class="brand-logo">
                    <img class="responsive-img" src="<?php echo url_for('/images/logo.svg'); ?>">
                </a>
                <ul id="nav-mobile" class="right">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
                        <li><a href="<?php echo url_for('/member.php'); ?>">Profile</a></li>
                        <li><a href="<?php echo url_for('/logout.php'); ?>" class="waves-effect waves-light btn">Logout</a></li>
                    <?php else : ?>
                        <li><a class="waves-effect waves-light btn">Login</a></li>
                        <li><a href="<?php echo url_for('/signup.php'); ?>" class="waves-effect waves-light btn">Sign Up</a></li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </nav>
</header>
