<?php
  try {
     $dbh = new PDO('sqlite:blog.db');
     $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
     die($e->getMessage());
  }

  try {
    $stmt = $dbh->prepare('SELECT * FROM post');
    $stmt->execute();
    $posts = $stmt->fetchAll();
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
<?php foreach ($posts as $post) { ?>
      <article>
        <h2><?=$post['title']?></h2>
        <p><?=$post['introduction']?></p>
      	<a href="view_post.php?id=<?=$post['id']?>">Read more...</a>
      </article>
<?php } ?>
    </section>
  </body>
</html>
