<!DOCTYPE html>
<html>
<head>
	<title>Show Requests</title>
	<link rel="stylesheet" href="style.css">
</head>

<body style="background-color: grey;">
	<?php
  
  if (isset($_POST['uname']) && isset($_POST['pass'])) {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'gasdb');

    $host_name = DB_SERVER;
    $user_name = DB_USERNAME;
    $password = DB_PASSWORD;
    $db_name = DB_DATABASE;

    $db_conn = mysqli_connect($host_name, $user_name, $password, $db_name);

    if (!$db_conn) {
      echo '<script>alert("Failure: Could not connect to database!")</script>';
      exit();
    }
  
    $username = trim($_POST['uname']);
    $password = trim($_POST['pass']);
  
    if (empty($username) || empty($password)) {
      echo '<script>alert("Παρακαλώ συμπληρώστε όλα τα πεδία.")</script>';
      echo "Παρακαλώ συμπληρώστε όλα τα πεδία.";
    } else {
      if (($username == "admin") || ($password == "Root123")) {
        $result = mysqli_query($db_conn,"SELECT * FROM requests");

        echo "<h2 style='text-decoration: underline;'>Αιτήματα:</h2>
        
        <table style='border: 1; border-color:black;'>
        <tr style='background-color: white; border: 1; border-color:black;'>
        <th>Όνομα</th>
        <th>Τηλέφωνο</th>
        <th>Τμήμα</th>
        <th>E-mail</th>
        <th>Θέμα</th>
        <th>Μήνυμα</th>
        </tr>";
  
        while($row = mysqli_fetch_array($result)) {
          echo "<tr style='background-color: lightblue; border: 1; border-color:black;'>";
          echo "<td>" . $row['name'] . "</td>";	
          echo "<td>" . $row['phone_number'] . "</td>";
          echo "<td>" . $row['department'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['subject'] . "</td>";
          echo "<td>" . $row['message'] . "</td>";
          echo "</tr>";
        }
  
        echo "</table>";
      } else {
        echo '<script>alert("Λυπούμαστε δεν είστε διαχειριστής της διαδικτυακής 
        εφαρμογής.")</script>';
        echo "Λυπούμαστε δεν είστε διαχειριστής της διαδικτυακής εφαρμογής.";
      }
    }

    mysqli_close($db_conn);

	} else {
    echo '<script>alert("Παρακαλώ συμπληρώστε όλα τα πεδία.")</script>';
    echo "Παρακαλώ συμπληρώστε όλα τα πεδία.";
  }

	?>
</body>
</html>