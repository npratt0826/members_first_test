<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
  redirect_to(url_for('/staff/teams/index.php'));
}

$id = $_GET['id'];
$member = find_member_by_id($id);

if(request_is_post()) {
  $result = delete_member($id);
  redirect_to(url_for('/staff/teams/index.php'));

} else {
  $member = find_member_by_id($id);
}

?>
<?php $page_title = 'Delete Member'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div>
  <a class="btn btn-light" href="<?php echo url_for('/staff/members/index.php')?>">&laquo; Back to list </a></button>
  </div>
  <div class="Delete them">
    <h1>Delete</h1>
    <p>
      Are you sure you want to delete this person?
    </p>

    <form action="<?php echo url_for('/staff/members/delete.php?id=' . h(u($member['id']))); ?>" method="post">
      <div id="operations">
        <input class="btn btn-danger" type="submit" name="commit" value="Delete Person" />
      </div>
    </form>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
