<?php
  if (!isset($_POST['id'])) die('No id');

  try {
     $dbh = new PDO('sqlite:blog.db');
     $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
     die($e->getMessage());
  }

  try {
    $stmt = $dbh->prepare('UPDATE post SET title = ?, introduction = ?, fulltext = ? WHERE id = ?');
    $stmt->execute(array($_POST['title'], $_POST['introduction'], $_POST['fulltext'], $_POST['id']));
  } catch (PDOException $e) {
     die($e->getMessage());
  }

  header ('Location: view_post.php?id=' . $_POST['id']);
?>
