<?php require_once('../../../private/initialize.php') ?>

<?php
$id = $_GET['id'];
$member = find_member_by_id($id);
?>

<?php $page_title = 'Staff List'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div>
    <a class="btn btn-light" href="<?php echo url_for('/staff/members/index.php')?>">&laquo; Back to list </a>
  </div>

  <h1>> Profile page coming soon </h1>
  <h4>Member Info</h4>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
