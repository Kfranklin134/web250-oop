<?php

require_once('../../private/initialize.php');

if (!isset($_GET['id'])) {
  redirect_to(url_for('/active-record/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {
  // Get existing bird record
  $bird = Bird::find_by_id($id);

  if ($bird == false) {
    redirect_to(url_for('/active-record/index.php'));
  }

  // Get updated values from the form submission
  $args = [];
  $args['common_name'] = $_POST['common_name'] ?? NULL;
  $args['habitat'] = $_POST['habitat'] ?? NULL;
  $args['food'] = $_POST['food'] ?? NULL;
  $args['conservation_id'] = $_POST['conservation_id'] ?? NULL;
  $args['backyard_tips'] = $_POST['backyard_tips'] ?? NULL;

  // Merge new data into the existing bird object
  $bird->merge_attributes($args);

  // Attempt to update the record in the database
  $result = $bird->update();

  if ($result === true) {
    $_SESSION['message'] = 'The bird was updated successfully.';
    redirect_to(url_for('/active-record/show.php?id=' . $id));
  } else {
    // Show errors if the update failed
    // Assuming $errors is set by the update() method in case of failure
    // echo display_errors($bird->errors);
  }
} else {
  // Display the form with existing data
  $bird = Bird::find_by_id($id);
  if ($bird == false) {
    redirect_to(url_for('/active-record/index.php'));
  }
}

?>

<?php $page_title = 'Edit Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/active-record/index.php'); ?>">&laquo; Back to List</a>

  <div class="bird edit">
    <h1>Edit Bird</h1>

    <?php // echo display_errors($errors); 
    ?>

    <form action="<?php echo url_for('/active-record/edit.php?id=' . h(u($id))); ?>" method="post">
      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Bird">
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
