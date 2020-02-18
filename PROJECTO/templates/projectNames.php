<h1 class="title">Your current projects:</h1>
<table id="projects">
    <?php foreach ($projects as $proj) { ?>
        <tr>
            <td> <?= $proj['description']?></td>
            <td> <?= $proj['date_due'] ?></td>
            <td>
                <a href="<?= 'fullProj.php?projID=' . $proj['projID'] ?>"> View </a>
            </td>
        </tr>
    <?php }
    if (sizeof($projects) == 0)
        echo "<p>Looks like you have no ongoing projects!</p>";?>
</table>
<h3 class="title"> Add a new project: </h2>
<form id="newList" action="actions_addProject.php" method="post">
    Name of project: <input type="text" name="description"><br>
    Date due: <input type="text" name="date_due" placeholder="YYYY-MM-DD"><br>
    <button type="submit" name="projID">Create new project</button>
</form>
