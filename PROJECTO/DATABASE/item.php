<?php
	include_once('connection.php');

	//gets the item of id $itemID
    function getItemById($itemID) {
        global $dbh;
        $stmt = $dbh->prepare("SELECT * FROM ITEM WHERE itemID = ?");
        $stmt->execute(array($itemID));
        return $stmt->fetch();
    }

	//gets all the items of the list with id listID
    function getItemsOfList($listID) {
		global $dbh;
        $stmt = $dbh->prepare('SELECT itemID, content, image, checked
			 					FROM ITEM WHERE listID = ?');
		$stmt->execute(array($listID));
		return $stmt->fetchAll();
	}

	//creates a new item with values from an associative array
	function createItem($item) {
		global $dbh;
		$stmt = $dbh->prepare('INSERT INTO ITEM VALUES (NULL, ?, ?, ?, ?)');
		$success = $stmt->execute(array($item['content'],
										$item['image'],
										$item['checked'],
										$item['listID']));
		return $success;
	}

	//deletes the item of id $itemID
	function deleteItem($itemID) {
		global $dbh;
		$stmt = $dbh->prepare('DELETE FROM ITEM WHERE itemID = ?');
		$success = $stmt->execute(array($itemID));
		return $success;
	}

	//updates an item with values from an associative array
	function updateItem($item) {
		global $dbh;
		$stmt = $dbh->prepare('UPDATE ITEM SET (NULL, ?, ?, ?, ?, ?) WHERE itemID = ?');
		$success = $stmt->execute(array($item['content'],
										$item['image'],
										$item['checked'],
										$item['listID'],
										$list['itemID']));
		return $success;
	}

    //updates the checked value of an item of id $itemID
    function updateChecked($itemID, $checked) {
        global $dbh;
		$stmt = $dbh->prepare('UPDATE ITEM SET checked = ? WHERE itemID = ?');
		$success = $stmt->execute(array($checked, $itemID));
		return $success;
    }
?>
