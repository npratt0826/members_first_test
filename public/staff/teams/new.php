<?php

require_once('../../../private/initialize.php');

if(request_is_post()) {
  $team_name = $_POST['team_name'] ?? '';
  $visible = $_POST['visible'] ?? '';

  echo "Form params <br  />";
  echo "Team name: " . $team_name . "<br />";
  echo "visible: " . $visible . "<br />";
}
?>
<?php $page_title = 'Team'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">
  <div>
    <a class="back-link" href="<?php echo url_for('/staff/teams/index.php')?>">&laquo; Back to list </a>
  </div>
  <div class="subject new">
    <h1>Create Team</h1>
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/teams/new.php'); ?>" method="post">
      Team Name:<br />
      <input type="text" name="team_name" value=""  > <br />
      Private:
      <input type="hidden" name="visible" value="0" >
      <input type="checkbox" name="visible" value="1" ><br /><br />

      <div id="operations">
        <input type="submit" value="Create Team">
      </div>
    </form>


  </div>

</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>
