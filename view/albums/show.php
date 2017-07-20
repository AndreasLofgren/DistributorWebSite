<p>This is the requested post:</p>


<?php echo $album->getTitle(); ?>

<p>This is the songs title:</p>

<p>  </p>
<?php foreach ($album->getLyric() as $lyric) { ?>
    <p>
        <?php echo $lyric; ?>

    </p>
<?php } ?>
