<p>This is the requested post:</p>

<?php foreach ($albums as $album) { ?>
    <p>
        <?php echo $album->getTitle(); ?>
        <?php echo $album->id; ?>
    </p>
<?php } ?>