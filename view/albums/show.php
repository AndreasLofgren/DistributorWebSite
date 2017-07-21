<p>This is the requested post:</p>


<?php echo $album->getTitle(); ?>

<p>This is the songs title:</p>

<p>  </p>
<?php foreach ($album->getLyric() as $lyric) { ?>
    <p>

        <a href='?controller=lyric&action=lyric&id=<?php echo $lyric->id; ?>'><?php echo $lyric->title; ?></a>

    </p>
<?php } ?>
