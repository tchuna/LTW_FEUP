<div id="list">
    <h1 class="title"> <?= $list['name'] ?> </h1>
    <h2 class="title"> Category: <?= $list['category'] ?> </h2>
    <h2 class="title"> Due <?= $list['date_due'] ?></h2>

    <table id="items">
        <?php foreach ($items as $item) {
                    $disabled = "";
                    if ($item['checked'] == 1)
                        $disabled = "disabled> Finished!";
                    else
                        $disabled = $disabled . "> Set item as finished";
        ?>
        <tr class="item">
            <!--image here-->
            <td class="title"> <?= $item['content'] ?> </td>
            <td class="check">
                <form class="checkItem" method="post">
                    <input type="hidden" name="listID" value=<?= $list['listID'] ?>>
                    <input type="hidden" name="itemID" value=<?= $item['itemID'] ?>>
                    <input type="hidden" name="checked" value=<?= $item['checked'] ?>>
                    <button type="submit" <?= $disabled ?></button>
                </form>
            </td>
            <td class="delete">
                <form action="actions_deleteItem.php" method="post">
                    <input type="hidden" name="listID" value=<?= $list['listID'] ?>>
                    <button type="submit" name="itemID" value=<?= $item['itemID'] ?>>Delete</button>
                </form>
            </td>
        </tr>
        <?php }
        if (sizeof($items) == 0)
            echo "<p>Looks like you don't have any items on this list yet!</p>"
        ?>
    </table>
    <form id="newItem" action="actions_addItem.php" method="post">
      <h2 class="title"> Add a new item: </h2>
        <input type="text" name="content" placeholder="e.g. Family Lunch on Sunday at 11am.">
        <button type="submit" name="listID" value=<?= $list['listID'] ?>>Add item</button>
    </form>

    <form id="deleteList" action="actions_deleteList.php" method="post">
        <button type="submit" name="listID" value=<?= $list['listID'] ?>>Delete list</button>
    </form>
</div>
<script src="javascript/setItemChecked.js" defer></script>
