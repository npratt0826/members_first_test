<?php

  function find_all_teams() {
    global $db;

    $sql = "SELECT * FROM teams ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;

  }

  function find_all_members() {
    global $db;
    $sql = "SELECT * FROM members ";
    $sql .= "ORDER BY team_id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_team_by_id($id) {
    global $db;
    $sql = "SELECT * FROM teams ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $team = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $team;
  }

  function find_member_by_id($id) {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $member = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $member;
  }

  function find_members_by_team($id){
    global $db;
    $sql = "SELECT * FROM members ";
    $sql .= "WHERE team_id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function insert_team($team_name, $visible){
    global $db;
    $sql = "INSERT INTO teams ";
    $sql .= "(team_name, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . $team_name . "',";
    $sql .= "'" . $visible . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function insert_member($member) {
    global $db;

    $sql = "INSERT INTO members ";
    $sql .= "(team_id, first_name, last_name, email) ";
    $sql .= "VALUES (";
    $sql .= "'" . $member['team_id'] . "',";
    $sql .= "'" . $member['first_name'] . "',";
    $sql .= "'" . $member['last_name'] . "',";
    $sql .= "'" . $member['email'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_team($team){
    global $db;
    $sql = "UPDATE teams SET ";
    $sql .= "team_name='" . $team['team_name'] . "',";
    $sql .= "visible='" . $team['visible'] . "' ";
    $sql .= "WHERE id='" . $team['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result){
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_team($id) {
    global $db;
    $sql = "DELETE FROM teams ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result){
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_member($id) {
    global $db;
    $sql = "DELETE FROM members ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result){
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_member($member) {
    global $db;

    $sql = "UPDATE members SET ";
    $sql .= "first_name='" . $member['first_name'] . "', ";
    $sql .= "last_name='" . $member['last_name'] . "', ";
    $sql .= "email='" . $member['email'] . "' ";
    $sql .= "WHERE id='" . $member['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    } else
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }


 ?>
