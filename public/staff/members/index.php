<?php require_once('../../../private/initialize.php') ?>

<?php

  $member_set = find_staff();

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
  <table class="list">
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Team</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>

    <?php while($member = mysqli_fetch_assoc($member_set)) { ?>
      <tr>
      <td><?php echo h($member['id']); ?></td>
      <td><?php echo h($member['first_name']); ?></td>
      <td><?php echo h($member['last_name']); ?></td>
      <td><?php echo h($member['email']); ?></td>
      <td><?php echo h($member['team_id']); ?></td>
      <td><a class="action" href="<?php echo url_for('/staff/members/show.php?id=' . h(u($member['id']))); ?>">View</a></td>
      <td><a class="action" href="<?php echo url_for('/staff/members/edit.php?id=' . h(u($member['id']))); ?>">Edit</a></td>
      <td><a class="action" href="<?php echo url_for('/staff/members/delete.php?id=' . h(u($member['id']))); ?>">Delete</a></td>
    </tr>
  <?php } ?>
</table>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
