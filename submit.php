<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName = "pollsdb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbName);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error . "<br />");
  }
  echo "Connected successfully" . "<br />";

  $choice = $_POST["choice"];

  $sql = "UPDATE pollresults
    SET votes = votes + 1
    WHERE choice = '$choice'";

  if ($conn->query($sql)) {
    echo "Poll recorded" . "<br />";
  } else {
    echo "Unsuccessful: " . $conn->error;
  }

$sql = "SELECT choice, votes FROM pollresults";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "choice: " . $row["choice"] . " votes: " . $row["votes"] . "<br>";
  }
} else {
  echo "0 results";
}

  $conn->close();

  ?>

  <h1>Poll Results</h1>
  <canvas id="polling_chart" height="400" weigth="400"></canvas>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
  <script src="samplechart.js"></script>
</body>
</html>