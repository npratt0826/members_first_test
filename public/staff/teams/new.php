<?php

require_once('../../../private/initialize.php');

if(request_is_post()) {
  $team = [];
  $team['team_name'] = $_POST['team_name'] ?? '';
  $team['visible'] = $_POST['visible'] ?? '';

  $result = insert_team($team);
  // $new_id = mysqli_insert_id($db);
  if($result === true) {
    redirect_to(url_for('/staff/teams/index.php'));
  } else {
    $errors = $result;
    // var_dump($errors);
  }

}
?>
<?php $page_title = 'Create Team'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">
  <div>
    <a class="btn btn-light" href="<?php echo url_for('/staff/teams/index.php')?>">&laquo; Back to list </a>
  </div>
  <div class="team new">
    <?php echo display_errors($errors); ?>
    <h1>Create Team</h1>

    <form action="<?php echo url_for('/staff/teams/new.php'); ?>" method="post">
      Team Name:<br />
      <input type="text" name="team_name" value=""  > <br />
      Private:
      <input type="hidden" name="visible" value="1" >
      <input type="checkbox" name="visible" value="0" ><br /><br />

      <div id="operations">
        <input class="btn btn-success" type="submit" value="Create Team">
      </div>
    </form>


  </div>

</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>
