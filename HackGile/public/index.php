<?php require_once('../private/initialize.php'); ?>

<?php include('../private/shared/public_header.php'); ?>

<div class="parallax-container">
    <div class="parallax"><img src=<?php echo url_for('/images/header_image.jpg') ?>></div>
</div>

<div class="container">
    <h1><strong>HackGile</strong></h1>
    <h5 style="padding-left:5em;"><em>Bring Agile Development to Every Hackathon</em></h5>
    <br>
    <h6>
        With our tool, you can use an Agile/Scrum methodology at your next hackathon. Just sign up,
        start a new project, and begin creating sprints throughout the duration of the
        hackathon. Our project also boasts these cool features.
    </h6>
    <div class="row">
        <div class="col s4">
            <div class="center promo promo-example">
                <i class="large material-icons">group</i>
                <h5 class="promo-caption">Collaboration Focused</h5>
                <p class="light center">HackGile allows you to quickly and easily work with your team members on a project. Any one in the group can assign or claim a task and report back when its done.</p>
            </div>
        </div>
        <div class="col s4">
            <div class="center promo promo-example">
                <i class="large material-icons">clear_all</i>
                <h5 class="promo-caption">Blockchain Enabled</h5>
                <p class="light center">Utilize the power of the blockchain with proof-of-work. Collaborators can verify a member's work after they report it complete to claim a new task.</p>
            </div>
        </div>
        <div class="col s4">
            <div class="center promo promo-example">
                <i class="large material-icons">format_color_text</i>
                <h5 class="promo-caption">Agile Approved</h5>
                <p class="light center">Small sprints have been proven to increase workflow. With short sprints during the course of a hackathon, your team can stay focused, organized and produce the best app possible.</p>
            </div>
        </div>
        <div>
            <div class="col s12">
                <p class="center">
                    <a href="<?php echo url_for('/signup.php'); ?>" class="waves-effect waves-light btn btn-large center">Sign Up Now!</a>
                </p>
            </div>
        </div>
    </div>
</div>


<?php $super_hero_image = 'banner.jpg'; ?>

<?php include('../private/shared/public_footer.php'); ?>

