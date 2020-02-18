<h1 class="title"> Your to-do lists: </h1>
<table id="lists">
    <?php foreach ($lists as $list) { ?>
        <tr>
            <td> <?= $list['name']?></td>
            <td>
                <a href="<?= 'fullList.php?listID=' . $list['listID'] ?>"> View </a>
            </td>
        </tr>
    <?php }
    if (sizeof($lists) == 0)
        echo "<p>Looks like you have no lists yet!<p>"
    ?>
</table>

<h3 class="title"> Add a new list: </h2>
<form id="newList" action="actions_addList.php" method="post">
    Name of list: <input type="text" name="name"><br>
    Category: <input id="cats" list="categories" name="category" placeholder="ex. Personal, FEUP, ..." autocomplete="off"><br>
    <input id="userID" type="hidden" name="userID" value=<?= $_SESSION['userID'] ?>>
    <datalist id="categories">
        <script src="javascript/getCategories.js" defer></script>
    </datalist>
    Date due: <input type="text" name="date_due" placeholder="YYYY-MM-DD"><br>
    <button type="submit" name="listID">Create new list</button>
</form>
