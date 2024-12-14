<!doctype html>

<html lang="en">

<head>
  <title>WNC Birds <?php if (isset($page_title)) {
                      echo '- ' . h($page_title);
                    } ?></title>
  <meta charset="utf-8">
</head>

<body>

  <header>
    <h1>
      WNC Birds Member Area
    </h1>

    <navigation>
      <ul>
        <?php if ($session->is_logged_in()) { ?>
          <li><?php echo "User: " . $session->username ?></li>
          <?php if ($session->is_admin()) { ?>
            <li><a href="<?php echo url_for('/active-record/members/index.php'); ?>">Members</a></li>
          <?php } ?>
          <li><a href="<?php echo url_for('/active-record/members/logout.php'); ?>">Logout, <?php echo h($session->first_name); ?></a></li>
        <?php } ?>
      </ul>
    </navigation>

    <?php echo display_session_message(); ?>
  </header>
