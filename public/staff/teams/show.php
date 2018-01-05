<?php require_once('../../../private/initialize.php') ?>

<?php
  $id = $_GET['id'] ?? '1';

  $team_members = find_members_by_team($id);

  $team = find_team_by_id($id);

 ?>

 <?php $page_title = 'Show team'; ?>
 <?php include(SHARED_PATH . '/staff_header.php'); ?>

 <div id="content">
   <a class="btn btn-light" href="<?php echo url_for('/staff/teams/index.php')?>">&laquo; Back to list </a>

   <div class="team show">
     <h1>Team: <?php echo h($team['team_name']); ?> </h1>
   </div>
   <div>
     <table class="list">
       <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Email</th>
         <th>&nbsp;</th>
         <th>&nbsp;</th>
         <th>&nbsp;</th>
       </tr>

       <?php while($member = mysqli_fetch_assoc($team_members)) { ?>
         <tr>
         <td><?php echo h($member['id']); ?></td>
         <td><?php echo h($member['first_name']) . " " . h($member['last_name']) ; ?></td>
         <td><?php echo h($member['email']); ?></td>
         <td><a class="action" href="<?php echo url_for('/staff/members/show.php?id=' . h(u($member['id']))); ?>">View</a></td>
         <td><a class="action" href="<?php echo url_for('/staff/members/edit.php?id=' . h(u($member['id']))); ?>">Edit</a></td>
         <td><a class="action" href="<?php echo url_for('/staff/members/delete.php?id=' . h(u($member['id']))); ?>">Delete</a></td>
       </tr>
     <?php } ?>
   </table>
 </div><br />
   <div class="members new">
     <div class="actions">
       <a class="action btn btn-secondary" href="<?php echo url_for('/staff/members/new.php'); ?>">Add Member</a></button>
     </div>
   </div>
 </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
