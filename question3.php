<!doctype html>
<html lang="en">

<head>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.95">
</head>

<!-- Navbar -->
<?php
include_once('navbar.php');
?>

<div>
  <h1>Question 3</h1>
  <div class="container">

    <?php
    session_start();
    if (isset($_SESSION['message'])) {
    ?>

      <div class="alert alert-info text-center" style="margin-top:20px;">
        <?php echo $_SESSION['message']; ?>
      </div>

    <?php
      unset($_SESSION['message']);
    }
    ?>

    <div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Question</th>
            <th scope="col">Definition</th>
            <th scope="col">Answer</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include_once('connection.php');
          $database = new Connection();
          $db = $database->open();
          try {
            $sql = 'SELECT * FROM content WHERE id = 3';
            foreach ($db->query($sql) as $row) {
          ?>

              <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td><?php echo $row['question']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['answer']; ?></td>
              </tr>

          <?php
            }
          } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
          $database->close();
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

<footer>
  <p class="copyright">© 2022 Kyle Watson - All Rights Reserved.</p>
</footer>

</body>

</html>