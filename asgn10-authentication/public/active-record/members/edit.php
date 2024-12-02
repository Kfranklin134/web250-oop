<?php

require_once('../../../private/initialize.php');
require_login();
if (!isset($_GET['id'])) {
  redirect_to(url_for('/active-record/members/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {
  // Get existing member record
  $member = Member::find_by_id($id);

  if ($member == false) {
    redirect_to(url_for('/active-record/members/index.php'));
  }

  // Get updated values from the form submission
  $args = [];
  $args['first_name'] = $_POST['first_name'] ?? NULL;
  $args['last_name'] = $_POST['last_name'] ?? NULL;
  $args['email'] = $_POST['email'] ?? NULL;
  $args['username'] = $_POST['username'] ?? NULL;

  // Merge new data into the existing member object
  $member->merge_attributes($args);

  // Attempt to update the record in the database
  $result = $member->update();

  if ($result === true) {
    $session->message('The member was updated successfully.');
    redirect_to(url_for('/active-record/members/show.php?id=' . $id));
  } else {
    // Show errors if the update failed
    // Assuming $errors is set by the update() method in case of failure
    // echo display_errors($member->errors);
  }
} else {
  // Display the form with existing data
  $member = Member::find_by_id($id);
  if ($member == false) {
    redirect_to(url_for('/active-record/members/index.php'));
  }
}

?>

<?php $page_title = 'Edit Member'; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/active-record/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member edit">
    <h1>Edit Member</h1>

    <?php echo display_errors($member->errors);
    ?>

    <form action="<?php echo url_for('/active-record/members/edit.php?id=' . h(u($id))); ?>" method="post">
      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Member">
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
