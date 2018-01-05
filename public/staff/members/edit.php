<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
  redirect_to(url_for('/staff/members/index.php'));
}

$id = $_GET['id'];
$member = find_member_by_id($id);

if(request_is_post()) {
  $member = [];
  $member['id'] = $id;
  $member['first_name'] = $_POST['first_name'] ?? '';
  $member['last_name'] = $_POST['last_name'] ?? '';
  $member['email'] = $_POST['email'] ?? '';

  $result = update_member($member);
  if($result === true){
    redirect_to(url_for('/staff/members/index.php'));
  } else {
    $member = find_member_by_id($id);
  }
}


?>
<?php $page_title = 'Edit member'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">
  <div>
    <a class="back-link" href="<?php echo url_for('/staff/members/index.php')?>">&laquo; Back to list </a>
  </div>
  <div class="subject new">
    <h1>Edit Member</h1>

    <form action="<?php echo url_for('/staff/members/edit.php?id=' . h(u($member['id']))); ?>" method="post">
      First Name:<br />
      <input type="text" name="first_name" value="<?php echo h($member['first_name']); ?>"  > <br />
      Last Name:<br />
      <input type="text" name="last_name" value="<?php echo h($member['last_name']); ?>"  > <br />
      Email:<br />
      <input type="email" name="email" value="<?php echo h($member['email']); ?>"  > <br />


      <div id="operations">
        <input type="submit" value="Edit member">
      </div>
    </form>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
