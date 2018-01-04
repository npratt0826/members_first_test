<?php

require_once('../../../private/initialize.php');

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
<?php $page_title = 'New member'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">
  <div>
    <a class="back-link" href="<?php echo url_for('/staff/teams/index.php')?>">&laquo; Back to list </a>
  </div>
  <div class="subject new">
    <h1>Add a Team Member</h1>
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/members/new.php'); ?>" method="post">
      First Name:<br />
      <input type="text" name="first_name" value=""  > <br />
      Last Name:<br />
      <input type="text" name="last_name" value=""  > <br />
      Email:<br />
      <input type="email" name="email" value=""  > <br />


      <div id="operations">
        <input type="submit" value="Add member">
      </div>
    </form>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
