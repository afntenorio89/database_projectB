<?php include_once('templates/header.php') ?>

<section>

  <?php
    if (isset($_SESSION['u_id']) && isset($_SESSION['u_permission'])) {
      include_once('contents/content_user.php');
    } else {
      include_once('contents/content_visitor.php');
    }
  ?>

</section>
<?php include_once('templates/footer.php') ?>
