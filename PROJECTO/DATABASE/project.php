<?php
	include_once('connection.php');

	//returns all the full projects (everything) of a user
	function getProjectsOfUser($userID) {
		global $dbh;
		$stmt = $dbh->prepare('SELECT projID, description, date_due FROM PROJECT, PROJECT_USER WHERE PROJECT.projID = PROJECT_USER.idProj and PROJECT_USER.idUser = ?');
        $stmt->execute(array($userID));
        return $stmt->fetchAll();
	}

	//returns all the full users (everything) of a project
	function getUsersOfProject($projID) {
		global $dbh;
		$stmt = $dbh->prepare('SELECT userID, username, email, name, birthdate, location FROM PROJECT_USER, USER WHERE USER.userID = PROJECT_USER.idUser and PROJECT_USER.idProj = ?');
        $stmt->execute(array($projID));
        return $stmt->fetchAll();
	}

	//returns the full project of id projID
	function getProjectById($projID) {
		global $dbh;
		$stmt = $dbh->prepare('SELECT projID, description, date_due FROM PROJECT WHERE projID = ?');
        $stmt->execute(array($projID));
        return $stmt->fetch();
	}

	//returns all lists associated with project of id projID
	function getListsOfProject($projID) {
		global $dbh;
		$stmt = $dbh->prepare('SELECT listID, name, public, category, date_due, userID, projID FROM LIST WHERE projID = ?');
        $stmt->execute(array($projID));
        return $stmt->fetchAll();
	}

	//creates a new project from the arguments
	function createProject($description, $date_due) {
		global $dbh;
		$stmt = $dbh->prepare('INSERT INTO PROJECT VALUES (NULL, ?, ?)');
        $success = $stmt->execute(array($description, $date_due));
        if ($success) {
            $stmt = $dbh->prepare('SELECT max(projID) FROM PROJECT');
            $stmt->execute(array());
            return $stmt->fetch();
        }
	}

	//updates a project from the arguments
	function updateProject($projID, $description, $date_due) {
		global $dbh;
		$stmt = $dbh->prepare('UPDATE PROJECT VALUES (?, ?) WHERE projID = ?');
        $success = $stmt->execute(array($description, $date_due, $projID));
		return $success;
	}

	//deletes the project of id projID
	function deleteProject($projID) {
		global $dbh;
		$stmt = $dbh->prepare('DELETE FROM PROJECT WHERE projID = ?');
        $success = $stmt->execute(array($projID));
		return $success;
	}

    function addUserToProject($userID, $projID) {
        global $dbh;
		$stmt = $dbh->prepare('INSERT INTO PROJECT_USER VALUES (?, ?)');
        $success = $stmt->execute(array($userID, $projID));
		return $success;
    }

    function removeFromProject($userID, $projID) {
        global $dbh;
		$stmt = $dbh->prepare('DELETE FROM PROJECT_USER WHERE idUser = ? and idProj = ?');
        return $success = $stmt->execute(array($userID, $projID));
    }

    function addToProject($userID, $projID) {
        global $dbh;
		$stmt = $dbh->prepare('INSERT INTO PROJECT_USER VALUES (?, ?)');
        $success = $stmt->execute(array(intval($userID), intval($projID)));
    }

    function userInProject($userID, $projID) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM PROJECT_USER WHERE idUser = ? and idProj = ?');
        $stmt->execute(array(intval($userID), intval($projID)));
        return sizeof($stmt->fetchAll()) == 0 ? false : true;
    }
?>
