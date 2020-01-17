<?php

  try {
    require "../config.php";
    require "../common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM users";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();

  } catch (PDOException $error) {

      echo $sql . "<br>" . $error->getMessage();
    }
?>

  <?php include "templates/header.php"; ?>
<main>
  <h2>Update Users</h2>
  <table>
    <thead>
      <tr>
        <th>&nbsp;</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Age</th>
        <th>Location</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $row) :  ?>
        <tr>
          <td><?php echo escape($row["id"]); ?></td>
          <td><?php echo escape($row["firstname"]); ?></td>
          <td><?php echo escape($row["lastname"]); ?></td>
          <td><?php echo escape($row["email"]); ?></td>
          <td><?php echo escape($row["age"]); ?></td>
          <td><?php echo escape($row["location"]); ?></td>
          <td><?php echo escape($row["date"]); ?></td>
          <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
          <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="backToHome">
    <a href="index.php">Back to home</a>
  </div>
</main>
  <?php require "templates/footer.php"; ?>
