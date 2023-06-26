<?php  
if (isset($_POST['username']) && isset($_POST['fname']) && isset($_POST['email'])) {
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

	$username = trim($_POST['username']);
	$fname = trim($_POST['fname']);
	$email = trim($_POST['email']);

	if (empty($username) || empty($fname) || empty($email)) {
    	echo '<script>alert("Παρακαλώ συμπληρώστε όλα τα πεδία.")</script>';
		echo "Παρακαλώ συμπληρώστε όλα τα πεδία.";
	} else {
		$stmt = $db_conn->prepare("INSERT INTO subscribers(username, name, email) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $username, $fname, $email);
		$result = $stmt->execute();

		if ($result) {
			echo '<script>alert("Εγγραφήκατε στο Newsletter.")</script>';
			echo "Εγγραφήκατε στο Newsletter.";
		} else {
			echo '<script>alert("Υπήρξε πρόβλημα με την εγγραφή σας στο Newsletter.")</script>';
			echo "Υπήρξε πρόβλημα με την εγγραφή σας στο Newsletter.";
		}
		$stmt->close();
	}

	mysqli_close($db_conn);

} else {
  echo '<script>alert("Παρακαλώ συμπληρώστε όλα τα πεδία.")</script>';
  echo "Παρακαλώ συμπληρώστε όλα τα πεδία.";
}

?>