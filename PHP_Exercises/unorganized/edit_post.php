<?php
  if (!isset($_GET['id'])) die('No id');

  try {
     $dbh = new PDO('sqlite:blog.db');
     $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
     die($e->getMessage());
  }

  try {
    $stmt = $dbh->prepare('SELECT * FROM post WHERE id = ?');
    $stmt->execute(array($_GET['id']));
    $post = $stmt->fetch();
  } catch (PDOException $e) {
     die($e->getMessage());
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>My Blog</title>
    <meta charset="utf-8">
  </head>
  <body>
    <header>
      <h1><a href="index.php">My Blog</a></h1>
    </header>
    <section id="posts">
      <form action="action_edit_post.php" method="post">
        <input type="hidden" name="id" value="<?=$post['id']?>">
        <label> Title:
          <input type="text" name="title" value="<?=$post['title']?>">
        </label><br>
        <label> Introduction:
          <textarea name="introduction"><?=$post['introduction']?></textarea>
        </label><br>
        <label> Full Text:
          <textarea name="fulltext"><?=$post['fulltext']?></textarea>
        </label><br>
        <input type="submit" value="Save">
      </form>
    </section>
  </body>
</html>
