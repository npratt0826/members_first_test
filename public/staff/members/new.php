<?php

require_once('../../../private/initialize.php');

if(request_is_post()) {
  $member = [];
  $member['team_id'] = $_POST['team_id'] ?? '';
  $member['first_name'] = $_POST['first_name'] ?? '';
  $member['last_name'] = $_POST['last_name'] ?? '';
  $member['email'] = $_POST['email'] ?? '';


  $result = insert_member($member);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $team = find_team_by_id($member['team_id']);
    redirect_to(url_for('/staff/teams/show.php?id=' . $team['id'] ));
  } else {

  $member = [];
  $member['team_id'] = '';
  $member['first_name'] = '';
  $member['last_name'] = '';
  $member['email'] = '';

}

$member_set = find_all_members();
$member_count = mysqli_num_rows($member_set) + 1;
mysqli_free_result($member_set);
}
?>
<?php $member_title = 'New member'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">
  <div>
    <a class="btn btn-light" href="<?php echo url_for('/staff/teams/index.php')?>">&laquo; Back to list </a>
  </div>
  <div class="subject new">
    <h1>Add a Team Member</h1>

    <form action="<?php echo url_for('/staff/members/new.php'); ?>" method="post">
      First Name:<br />
      <input type="text" name="first_name" value=""  > <br />
      Last Name:<br />
      <input type="text" name="last_name" value=""  > <br />
      Email:<br />
      <input type="email" name="email" value=""  > <br />
      Team: <br />
      <select name="team_id">
            <?php
              $team_set = find_all_teams();
              while($team = mysqli_fetch_assoc($team_set)) {
                echo "<option value=\"" . h($team['id']) . "\"";
                // // if($member["team_id"] == $team['id']) {
                // //   echo " selected";
                // }
                echo ">" . h($team['team_name']) . "</option>";
              }
              mysqli_free_result($subject_set);
            ?>
            </select>


      <div id="operations">
        <input class='btn btn-success' type="submit" value="Add member">
      </div>
    </form>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
