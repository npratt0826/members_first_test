<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Group Setup'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_for('/staff/teams/index.php'); ?>">Teams</a></li>
      <li><a href="<?php echo url_for('/staff/members/index.php'); ?>">Members</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
