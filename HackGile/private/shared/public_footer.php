<?php if (isset($super_hero_image)) { ?>

    <div class="expanding-wrapper">
        <?php $image_url = url_for('/images/' . $super_hero_image); ?>
        <div class="parallax-container">
            <div class="parallax"><img id="super-hero-image" src="<?php echo $image_url; ?>"/></div>
        </div>

        <footer class="teal">
            <?php include('public_copyright_disclaimer.php'); ?>
        </footer>
    </div>

<?php } else { ?>

    <footer class="teal">
        <?php include('public_copyright_disclaimer.php'); ?>
    </footer>

<?php } ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems);
    });
</script>
</body>
</html>
