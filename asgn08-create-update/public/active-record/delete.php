<?php

require_once('../../private/initialize.php');

if (!isset($_GET['id'])) {
  redirect_to(url_for('/active-record/index.php'));
}
$id = $_GET['id'];

// Find the bird by ID
$bird = Bird::find_by_id($id);
if ($bird == false) {
  redirect_to(url_for('/active-record/index.php'));
}

if (is_post_request()) {
  // Delete the bird from the database
  $result = $bird->delete();

  // Set a success message if the deletion was successful
  if ($result) {
    $_SESSION['message'] = 'The bird was deleted successfully.';
    redirect_to(url_for('/active-record/index.php'));
  } else {
    // Handle deletion failure (optional)
    $_SESSION['message'] = 'The bird could not be deleted.';
  }
}

?>

<?php $page_title = 'Delete Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
  <a href="<?php echo url_for('/active-record/index.php'); ?>">&laquo; Back to List</a>

  <div class="bird delete">
    <h1>Delete Bird</h1>
    <p>Are you sure you want to delete this bird?</p>
    <p><?php echo h($bird->common_name); ?></p>

    <form action="<?php echo url_for('/active-record/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete <?php echo h($bird->common_name); ?>">
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
