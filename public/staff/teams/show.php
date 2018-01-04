<?php require_once('../../../private/initialize.php') ?>

 <?php $page_title = 'Team'; ?>
 <?php include(SHARED_PATH . '/staff_header.php'); ?>

 <div id="content">
   <a class="back-link" href="<?php echo url_for('/staff/teams/index.php')?>">&laquo; Back to list </a>

   <div class="team show">
     Team ID: <?php echo h($id); ?>
   </div>
   <div class="members new">
     Add member to team:
     <div class="actions">
       <a class="action" href="<?php echo url_for('/staff/members/new.php'); ?>">Add Member</a>
     </div>
   </div>
 </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
