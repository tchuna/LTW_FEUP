<form action="actions_userUpdateProfile.php"
      method="post" >

    <label>Username:</label>
    <input type="text"
     required readonly
     autocomplete="off"
     value=<?= $user['username'] ?>
     name="username" /><br>

    <label>Name:</label>
    <input type="text"
         required
         autocomplete="off"
         value="<?= $user['name'] ?>"
         name="name" /><br>

    <label>Email Address:</label>
    <input type="email"
       required
       autocomplete="off"
       value=<?= $user['email'] ?>
       name="email" /><br>

    <label>Birthday:</label>
    <input type="date"
       required
       autocomplete="off"
       value=<?= $user['birthdate'] ?>
       name="birthdate"/><br>

    <label>Location/address:</label>
    <input type="text"
       required
       autocomplete="off"
       value=<?= $user['location'] ?>
       name="address" /><br>

    <label>New password:</label>
    <input type="password"
       required
       autocomplete="off"
       name="password" /><br>

    <label>Confirm new password:</label>
    <input type="password"
       required
       autocomplete="off"
       name="confirmPassword" /><br>

    <button type="submit" class="button">Update profile</button>

</form>
