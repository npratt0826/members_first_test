<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Group Setup'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <br />
    <br />
    <div class="jumbotron">
      <h1 class="display-4">Welcome to Team Builder</h1>
      <p class="lead">Make different staff teams and get a complete member list!</p>
      <hr class="my-4">
      <p class="lead">
        <a class="btn btn-lg btn-light" href="<?php echo url_for('/staff/teams/index.php'); ?>">Teams</a>
        <a class="btn btn-lg btn-light" href="<?php echo url_for('/staff/members/index.php'); ?>">Member List</a>
      </p>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
