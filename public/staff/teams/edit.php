<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
  redirect_to(url_for('/staff/teams/index.php'));
}

$id = $_GET['id'];
$team = find_team_by_id($id);

if(request_is_post()) {
  $team = [];
  $team['id'] = $id;
  $team['team_name'] = $_POST['team_name'] ?? '';
  $team['visible'] = $_POST['visible'] ?? '';

  $result = update_team($team);
  if($result === true) {
    redirect_to(url_for('/staff/teams/index.php'));
  } else {
    $errors = $result;
    // var_dump($errors);
  }


}

?>
<?php $page_title = 'Edit Team'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div>
    <a class="btn btn-light" class="back-link" href="<?php echo url_for('/staff/teams/index.php')?>">&laquo; Back to list </a>
  </div>
  <div class="team edit">
    <?php echo display_errors($errors); ?>
    
    <h1>Edit Team</h1>
    <form action="<?php echo url_for('/staff/teams/edit.php?id=' . h(u($id))); ?>" method="post">
      Team Name:<br />
      <input type="text" name="team_name" value="<?php echo h($team['team_name']); ?>"  > <br />
      Private:
      <input type="hidden" name="visible" value="1" >
      <input type="checkbox" name="visible" value="0" ><br /><br />

      <div id="operations">
        <input class="btn btn-success" type="submit" value="Edit Team">
      </div>
    </form>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
