<?php

require_once('../../../private/initialize.php');
require_login();
if (!isset($_GET['id'])) {
  redirect_to(url_for('/active-record/members/index.php'));
}
$id = $_GET['id'];

// Find the member by ID
$member = Member::find_by_id($id);
if ($member == false) {
  redirect_to(url_for('/active-record/members/index.php'));
}

if (is_post_request()) {
  // Delete the member from the database
  $result = $member->delete();

  // Set a success message if the deletion was successful
  if ($result) {
    $session->message('The member was deleted successfully.');
    redirect_to(url_for('/active-record/members/index.php'));
  } else {
    // Handle deletion failure (optional)
    $_SESSION['message'] = 'The member could not be deleted.';
  }
}

?>

<?php $page_title = 'Delete Member'; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>

<div id="content">
  <a href="<?php echo url_for('/active-record/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member delete">
    <h1>Delete Member</h1>
    <p>Are you sure you want to delete this member?</p>
    <p><?php echo h($member->full_name()); ?></p>

    <form action="<?php echo url_for('/active-record/members/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete <?php echo h($member->full_name()); ?>">
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
