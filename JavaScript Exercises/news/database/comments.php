<?php
  function getCommentsByNewId($id)
  {
      global $db;
      $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
      $stmt->execute(array($id));
      return $stmt->fetchAll();
  }

  function addComment($id, $user, $time, $text)
  {
      global $db;

      try {
          $stmt = $dbh->prepare('INSERT INTO comments (id, user, time, text) VALUES (NULL, ?, ?, ?)');
          $stmt->execute(array($id, $user, $time, $text));
      } catch (PDOException $e) {
          die($e->getMessage());
      }

      return $stmt->fetchAll();
  }
?>
