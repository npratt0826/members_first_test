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

  function insert_team($team){
    global $db;

    $errors = validate_team($team);
    if(!empty($errors)){
      return $errors;
    }

    $sql = "INSERT INTO teams ";
    $sql .= "(team_name, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . $team['team_name'] . "',";
    $sql .= "'" . $team['visible'] . "'";
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

    $errors = validate_member($member);
    if(!empty($errors)){
      return $errors;
    }


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

    $errors = validate_team($team);
    if(!empty($errors)){
      return $errors;
    }

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

    $errors = validate_member($member);
    if(!empty($errors)){
      return $errors;
    }

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

  function validate_member($member){
      $errors = [];

      if(is_blank($member['first_name'])){
        $errors[] = "first name cannot be blank";
      }
      if(is_blank($member['last_name'])){
        $errors[] = "last name cannot be blank";
      }
      if(is_blank($member['email'])){
        $errors[] = "email cannot be blank";
      } elseif(!has_valid_email_format($member['email'])){
        $errors[] = "invalid email format";
      }

      return $errors;
    }

  function validate_team($team){
    $errors = [];

    if(is_blank($team['team_name'])){
      $errors[] = "name cannot be blank";
    }

    return $errors;
  }


 ?>
