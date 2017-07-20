<p>This is the requested post:</p>

<?php foreach ($albums as $album) { ?>
    <p>
        <?php
        echo 'test';
        echo $albums;
        echo $album;
        echo $album->getTitle();
        echo $album->id;
        ?>
    </p>
<?php } ?>