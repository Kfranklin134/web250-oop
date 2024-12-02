<?php
require_once('../../private/initialize.php');
include(SHARED_PATH . '/member_header.php');
?>

<?php
require_login();
?>

<h1>Members Area</h1>
<ul>
  <li><a href="<?php echo url_for('/active-record/birds/index.php'); ?>">Birds</a></li>
  <li><a href="<?php echo url_for('/active-record/members/index.php'); ?>">Members</a></li>
  <li><a href="<?php echo url_for('/about.php'); ?>">About Us</a></li>
</ul>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
