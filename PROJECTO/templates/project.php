<div id="project">
    <h1 class="title"> <?= $project['description'] ?> </h1>

    <h2 class="title"> Users participating in this project: </h2>
    <table id="users">
        <?php foreach ($users as $user) { ?>
            <tr class="user">
                <td>
                    <p><?= $user['username'] ?> </p>
                </td>
                <td>
                    <p><?= $user['name'] ?> </p>
                </td>
            </tr>
        <?php }?>
    </table>

    <h2 class="title"> To-Do lists of this project:</h2>
    <?php
        if (sizeof($lists) == 0)
            echo "<p>Looks like there aren't any lists on this project yet!</p>";
    ?>
    <table id="lists">
        <?php foreach ($lists as $list) {
            $owner = getUserById($list['userID']);?>
            <tr class="list">
                <!--image here-->
                <td>
                    <?= $list['name'] ?>
                </td>
                <td>
                    <p> Owner: <?= $owner['username'] . "(" . $owner['name'] . ")" ?> </p>
                </td>
                <td>
                    <a href=<?= 'fullList.php?listID=' . $list['listID'] ?>> View </a>
                </td>
                <td>
                    <form action="actions_removeListFromProj.php" method="post">
                        <input type="hidden" name="projID" value=<?= $project['projID'] ?>>
                        <button type="submit" name="listID" value=<?= $list['listID'] ?>>Remove from project</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h2 class="title"> Add a new list: </h2>
    <form id="newList" action="actions_addList.php" method="post">
        Name of list: <input type="text" name="name"><br>
        Category: <input id="cats" list="categories" name="category" placeholder="ex. Personal, FEUP" autocomplete="off"><br>
        <input id="userID" type="hidden" name="userID" value=<?= $_SESSION['userID'] ?>>
        <datalist id="categories">
            <script src="javascript/getCategories.js" defer></script>
        </datalist>
        Date due: <input type="text" name="date_due" placeholder="YYYY-MM-DD"><br>
        <input type="hidden" name="projID" value=<?=$project['projID']?>>
        <button type="submit" name="listID">Create new list</button>
    </form>

    <h2 class="title"> Add a user to this project: </h2>
    <form id="newuser" action="actions_addUserToProj.php" method="post">
        Username of the user:
        <input id="searchUser" list="suggestions" name="username" autocomplete="off">
        <datalist id="suggestions">
            <script src="javascript/getUsers.js" defer></script>
        </datalist>
        <button type="submit" name="projID" value=<?= $project['projID'] ?>>Add User</button>
    </form>

    <form id="quitFromProject" action="actions_quitFromProject.php" method="post">
        <button type="submit" name="projID" value=<?= $project['projID'] ?>>Abandon project</button>
    </form>
</div>
