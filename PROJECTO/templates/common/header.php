<!DOCTYPE html>
<html lang="en-US">
    <head>
        <link href="css/style.css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="images/logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>To-Do Lists</title>
    </head>
    <body>
        <header>
            <div>
                <?php
                    include_once('includes/init.php');
                    $user = null;
                    if (isset($_SESSION['username'])) {
                        include_once('userInfo.php');
                        $user = getUserByUsername($_SESSION['username']);
                    } else {
                      $user['name'] = 'Profile'; 
                    }

                    if (isset($_SESSION['error_message'])) {
                        echo '<p id="error">' . $_SESSION['error_message'] . '</p>';
                        unset($_SESSION['error_message']);
                    }
                ?>
                <img id="logoCorner" src="images/logo.png" width="45" height="45" alt="logo">
                <div id="profile">
                    <div id="templatemo_menu" class="ddsmoothmenu">
                    <ul>
                      <li class="user">
                        <a href="userMainPage.php" class="selected">
                          <?= $user['name']; ?>
                        </a>
                      </li>
                      <li class="first_element">
                        <a href="userLists.php">My Lists</a>
                      </li>
                      <li class="projects">
                        <a href="userProjects.php">My Projects</a>
                      </li>
                      <li class="logout">
                        <a href="actions_userLogout.php">Logout</a>
                      </li>
                    </ul>
                    <br style="clear: left" />
                    </div>
                </div>
            </div>
        </header>
