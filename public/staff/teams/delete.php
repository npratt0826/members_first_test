<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
  redirect_to(url_for('/staff/teams/index.php'));
}

$id = $_GET['id'];
$team = find_team_by_id($id);

if(request_is_post()) {
  delete_team($id);
  redirect_to(url_for('/staff/teams/index.php'));

} else {
  $team = find_team_by_id($id);
}

?>
<?php $page_title = 'Delete Team'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div>
    <a class="btn btn-lg btn-light" href="<?php echo url_for('/staff/teams/index.php')?>">&laquo; Back to list </a>
  </div>
  <div class="team delete">
    <h1>Delete Team</h1>
    <p>
      Are you sure you want to delete this team?
    </p>
    <p class="item">
      <?php echo h($team['team_name']); ?>
    </p>

    <form action="<?php echo url_for('/staff/teams/delete.php?id=' . h(u($team['id']))); ?>" method="post">
      <div id="operations">
        <input class="btn btn-danger" type="submit" name="commit" value="Delete Team" />
      </div>
    </form>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
