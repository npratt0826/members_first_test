
<?php require_once('../../../private/initialize.php'); ?>


<?php

  $team_set = find_all_teams();

 ?>

<?php $page_title = 'Team'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="subjects listing">
    <h1>Pick Your Team and Join up</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/teams/new.php'); ?>">Create a new team</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($team = mysqli_fetch_assoc($team_set)) { ?>
        <tr>
        <td><?php echo h($team['id']); ?></td>
        <td><?php echo $team['visible'] == 1 ? 'true' : 'false'; ?></td>
        <td><?php echo h($team['team_name']); ?></td>
        <td><a class="action" href="<?php echo url_for('/staff/teams/show.php?id=' . h(u($team['id']))); ?>">View</a></td>
        <td><a class="action" href="<?php echo url_for('/staff/teams/edit.php?id=' . h(u($team['id']))); ?>">Edit</a></td>
        <td><a class="action" href="<?php echo url_for('/staff/teams/delete.php?id=' . h(u($team['id']))); ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
  <?php
    mysqli_free_result($team_set);
   ?>

</div>
<br />

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
