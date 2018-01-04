<?php
  if(!isset($page_title)) { $page_title = 'Page title not set'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title><?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/main.css'); ?>" />

  </head>

  <body>
    <header>
      <h1>Team Builder</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/staff/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>
