<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
  redirect_to(url_for('/staff/teams/index.php'));
}

$id = $_GET['id'];
$team_name = '';
$visible = '';

if(request_is_post()) {
  $team_name = $_POST['team_name'] ?? '';
  $visible = $_POST['visible'] ?? '';

  echo "Form params <br  />";
  echo "Team name: " . $team_name . "<br />";
  echo "visible: " . $visible . "<br />";
}

?>
<?php $page_title = 'Edit Team'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div>
    <a class="back-link" href="<?php echo url_for('/staff/teams/index.php')?>">&laquo; Back to list </a>
  </div>
  <div class="subject edit">
    <h1>Edit Team</h1>
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/teams/edit.php?id=' . h(u($id))); ?>" method="post">
      Team Name:<br />
      <input type="text" name="team_name" value="<?php echo h($team_name); ?>"  > <br />
      Private:
      <input type="hidden" name="visible" value="0" >
      <input type="checkbox" name="visible" value="1" ><br /><br />

      <div id="operations">
        <input type="submit" value="Edit Team">
      </div>
    </form>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
