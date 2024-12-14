<?php

require_once('../../../private/initialize.php');

// determine access type
$is_admin = $session->is_admin();
$is_logged_in = $session->is_logged_in();

// if not logged in or not an admin, allow only for sign-up
if (!$is_logged_in) {
  $signup_mode = true;
} elseif ($is_admin) {
  $signup_mode = false;
} else {
  // Non-admin members cannot access this page 
  redirect_to(url_for('index.php'));
}

if (is_post_request()) {
  $args = $_POST['member'];
  $member = new Member($args);
  $result = $member->create();

  if ($result === true) {
    $new_id = $member->id;
    $session->message('The member was created successfully.');
    redirect_to(url_for('/active-record/members/show.php?id=' . $new_id));
  } else {
    //show errors
  }
} else {
  //display the form
  $member = new Member([]);
}

?>

<?php $page_title = 'Create Member'; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/active-record/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member new">
    <h1>Create Member</h1>

    <?php echo display_errors($member->errors);
    ?>

    <form action="<?php echo url_for('/active-record/members/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Member">
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
