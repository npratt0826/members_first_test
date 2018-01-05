<?php require_once('../../../private/initialize.php') ?>

<?php
  $member_set = find_all_members();
?>

<?php $page_title = 'Staff List'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <h1>All Members</h1>
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
<?php  mysqli_free_result($member_set); ?>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
