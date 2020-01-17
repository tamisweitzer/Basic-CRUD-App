<?php

  if (isset($_POST['submit'])) {
    require "../common.php";
    require "../config.php";

    try {
      $connection = new PDO($dsn, $username, $password, $options);

      $new_user = array(
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "email" => $_POST['email'],
        "age" => $_POST['age'],
        "location" => $_POST['location']
      );

      $sql = sprintf(
        "INSERT INTO %s (%s) values (%s)",
        "users",
        implode(", ", array_keys($new_user)),
        ":" . implode(", :", array_keys($new_user))
      );

      $statement = $connection->prepare($sql);
      $statement->execute($new_user);
    } catch (PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
  }
?>

<?php
  include "templates/header.php";

  if (isset($_POST['submit']) && $statement) {
    echo $_POST['firstname']; ?> successfully added.
<?php
  }
?>
<main>
<h2>Add a user</h2>

  <form class="" method="post">
    <div class="">
      <label for="firstname">First Name</label>
      <input type="text" name="firstname" id="firstname">
    </div>

    <div class="">
      <label for="lastname">Last Name</label>
      <input type="text" name="lastname" id="lastname">
    </div>

    <div class="">
      <label for="email">Email</label>
      <input type="email" name="email" id="email">
    </div>

    <div class="">
      <label for="age">Age</label>
      <input type="text" name="age" id="age">
    </div>

    <div class="">
      <label for="location">Location</label>
      <input type="text" name="location" id="location">
    </div>

    <div class="">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>

  <div class="backToHome">
    <a href="index.php">Back to home</a>
  </div>
</main>
<?php include "templates/footer.php"; ?>
