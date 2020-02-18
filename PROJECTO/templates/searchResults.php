<h1 class="title"> Search results for <?= $query ?>: </h1>
<div id="search">
<h2 class="title"> Lists: </h2>
<ul>
    <?php
        if (sizeof($foundLists) == 0)
            echo '<li class="result"> No lists containing "' . $query . '" were found!</li>';
        foreach ($foundLists as $listID) {
            $list = getListById($listID);
            $listText = $list['name'];
    ?>
    <li class="result">
        <?= $listText ?>
        <a class="resultLink" href="<?= "fullList.php?listID=" . $listID ?>"> View </a>
    </li>
    <?php } ?>
</ul>
</div>

<div id="search">
<h2 class="title"> Items: </h2>
<ul>
    <?php
        if (sizeof($foundItems) == 0)
            echo '<li class="result"> No items containing "' . $query . '" were found!</li>';
        foreach ($foundItems as $itemID) {
            $item = getItemById($itemID);
            $itemText = $item['content'];
            $listID = $item['listID'];
            $list = getListById($listID);
            $listText = $list['name'];
    ?>
    <li class="result">
        <?= $itemText ?> (on list <?= $listText ?>)
        <a class="resultLink" href="<?= "fullList.php?listID=" . $listID ?>"> View </a>
    </li>
    <?php } ?>
</ul>
</div>


<div id="search">
<h2 class="title"> Projects: </h2>
<ul>
    <?php
        if (sizeof($foundProjects) == 0)
            echo '<li class="result"> No projects containing "' . $query . '" were found!</li>';
        foreach ($foundProjects as $projID) {
            $proj = getProjectById($projID);
            $projText = $proj['description'];
    ?>
    <li class="result">
        <?= $projText ?>
        <a class="resultLink" href="<?= "fullProj.php?projID=" . $projID ?>"> View </a>
    </li>
    <?php } ?>
</ul>
</div>
