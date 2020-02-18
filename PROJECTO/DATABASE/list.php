<?php
	include_once('connection.php');

	//gets the list of id listID
	function getListById($listID) {
		global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM LIST WHERE listID = ?');
        $stmt->execute(array($listID));
        return $stmt->fetch();
	}

	//creates a new list with values from an associative array
	function createList($list) {
		global $dbh;
        if ($list['projID'] == null) {
    		$stmt = $dbh->prepare('INSERT INTO LIST VALUES (NULL, ?, ?, ?, ?, ?, NULL)');
    		$success = $stmt->execute(array($list['name'],
    										$list['public'],
    										$list['category'],
    										$list['date_due'],
    										$list['userID']));
            return $success;
        } else {
            $stmt = $dbh->prepare('INSERT INTO LIST VALUES (NULL, ?, ?, ?, ?, ?, ?)');
    		$success = $stmt->execute(array($list['name'],
    										$list['public'],
    										$list['category'],
    										$list['date_due'],
    										$list['userID'],
                                            $list['projID']));
            return $success;
        }
	}

	//deletes the list of id $listID
	function deleteList($listID) {
		global $dbh;
		$stmt = $dbh->prepare('DELETE FROM LIST WHERE listID = ?');
		$success = $stmt->execute(array($listID));
		return $success;
	}

	//updates a list with values from an associative array
	function updateList($list) {
		global $dbh;
		$stmt = $dbh->prepare('UPDATE LIST SET (NULL, ?, ?, ?, ?, ?, ?) WHERE listID = ?');
		$success = $stmt->execute(array($list['name'],
										$list['public'],
										$list['category'],
										$list['date_due'],
										$list['userID'],
										$list['projID'],
										$list['listID']));
		return $success;
	}

	//gets all the public lists
	function getAllPublicLists() {
		global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM LIST WHERE public = 1');
        $stmt->execute();
        return $stmt->fetchAll();
	}

	//gets all lists of user of id userID
	function getAllListsOfUser($username) {
		global $dbh;
        $stmt = $dbh->prepare('SELECT listID, LIST.name, public, category, date_due, LIST.userID, projID FROM LIST, USER WHERE USER.userID = LIST.userID and username = ?');
        $stmt->execute(array($username));
        return $stmt->fetchAll();
	}

    function removeListFromProj($listID, $projID) {
        global $dbh;
		$stmt = $dbh->prepare('UPDATE LIST SET projID = NULL WHERE listID = ? and projID = ?');
		$success = $stmt->execute(array($listID, $projID));
		return $success;
    }

    function getAllCategoriesOfUser($userID) {
        global $dbh;
		$stmt = $dbh->prepare('SELECT DISTINCT category FROM LIST WHERE userID = ?');
		$stmt->execute(array($userID));
		return $stmt->fetchAll();
    }
?>
