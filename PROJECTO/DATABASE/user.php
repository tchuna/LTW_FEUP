<?php
    include_once('connection.php');

	//creates a new user from an associative array and an unprocessed password
    function createUser($user, $password)
    {
        global $dbh;

        $options = ['cost' => 12];
        $hash = password_hash($password, PASSWORD_DEFAULT, $options);

        $stmt = $dbh->prepare('INSERT INTO USER VALUES (NULL, ?, ?, ?, ?, ?, ?)');
        $success = $stmt->execute(array($user['username'],
                                        $user['email'],
                                        $user['name'],
                                        $user['birthdate'],
                                        $user['location'],
                                        $hash));
        return $success;
    }

	//verifies if the user with the given name and password exists
    function verifyUser($username, $password)
    {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM USER WHERE username = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();
        if ($user !== false && password_verify($password, $user['password']))
            return $user['userID'];
        else {
            return -1;
        }
    }

    //gets a user by its id
    function getUserById($userID)
    {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM USER WHERE userID = ?');
        $stmt->execute(array($userID));
        return $stmt->fetch();
    }

	//gets a user by its username
    function getUserByUsername($username)
    {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM USER WHERE username = ?');
        $stmt->execute(array($username));
        return $stmt->fetch();
    }

    //gets a user by its username
    function getIdByUsername($username)
    {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM USER WHERE username = ?');
        $stmt->execute(array($username));
        return $stmt->fetch()['userID'];
    }

    //gets all usernames
    function getAllUsernames()
    {
        global $dbh;
        $stmt = $dbh->prepare('SELECT username FROM USER');
        $stmt->execute();
        return $stmt->fetchAll();
    }

	//updates an user with values from an associative array
    function updateUser($user)
    {
        global $dbh;

        $options = ['cost' => 12];
        $hash = password_hash($user['password'], PASSWORD_DEFAULT, $options);

        $stmt = $dbh->prepare('UPDATE USER SET email = ?,
                                                name = ?,
                                                birthdate = ?,
                                                location = ?,
                                                password = ?
                                 WHERE username = ?');
        $success = $stmt->execute(array($user['email'],
                                        $user['name'],
                                        $user['birthdate'],
                                        $user['location'],
                                        $hash,
                                        $user['username']));
        return $success;
    }
