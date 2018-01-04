<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
  redirect_to(url_for('/staff/members/index.php'));
}

if(request_is_post()) {
  $first_name = $_POST['first_name'] ?? '';
  $last_name = $_POST['last_name'] ?? '';
  $email = $_POST['email'] ?? '';

  echo "Form params <br  />";
  echo "First name: " . $first_name . "<br />";
  echo "Last name: " . $last_name . "<br />";
  echo "email: " . $email . "<br />";
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
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/members/edit.php?id=' . h(u('$id'))); ?>" method="post">
      First Name:<br />
      <input type="text" name="first_name" value="<?php echo h($first_name); ?>"  > <br />
      Last Name:<br />
      <input type="text" name="last_name" value="<?php echo h($last_name); ?>"  > <br />
      Email:<br />
      <input type="email" name="email" value="<?php echo h($email); ?>"  > <br />


      <div id="operations">
        <input type="submit" value="Edit member">
      </div>
    </form>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
