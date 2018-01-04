<?php

  function find_all_teams() {
    global $db;

    $sql = "SELECT * FROM teams ";
    $result = mysqli_query($db, $sql);
    return $result;

  }

  function find_staff() {
    global $db;
    $sql = "SELECT * FROM members ";
    $result = mysqli_query($db, $sql);
    return $result;
  }

 ?>
