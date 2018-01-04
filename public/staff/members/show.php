<?php require_once('../../../private/initialize.php') ?>

<?php

$members = [
  ['id' => '1', 'first_name' => 'Mike', 'last_name' => 'mike', 'email' => 'abc@123.com'],
  ['id' => '2', 'first_name' => 'Nick', 'last_name' => 'mike', 'email' => 'abc@123.com'],
  ['id' => '3', 'first_name' => 'Joe', 'last_name' => 'mike', 'email' => 'abc@123.com'],
  ['id' => '4', 'first_name' => 'John', 'last_name' => 'mike', 'email' => 'abc@123.com'],
];
?>

<?php $page_title = 'Staff List'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <h1>> Profile page for: <?php echo "" ?></h1>
  <h4>Member Info</h4>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
