<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <header>
      <a href='/DistributorWebSite'>Home</a>
      <a href='?controller=album&action=index'>Albums</a>
      <a href='?controller=signIn&action=signIn'>Log In</a>
      <a href='?controller=order&action=show'>Order</a>
      
    </header>

    <?php require_once('routes.php'); ?>

    <footer>
      Copyright
    </footer>
  </body>
</html>