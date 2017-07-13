<p>Here is a list of all albums:</p>

<?php foreach($albums as $album) {?>
  <p>
    <?php echo $album->title; ?>
    <a href='?controller=albums&action=show&id=<?php echo $album->id; ?>'>See content</a>
  </p>
<?php } ?>