<?php  
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['dep']) && isset($_POST['email']) && isset($_POST['topic']) && isset($_POST['message'])) {
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

	$name = trim($_POST['name']);
	$phone = trim($_POST['phone']);
  	$dept = trim($_POST['dep']);
  	$email = trim($_POST['email']);
	$subj = trim($_POST['topic']);
	$mess = trim($_POST['message']);

	if (empty($name) || empty($phone) || empty($dept) || empty($email) || empty($subj) || empty($mess)) {
		echo '<script>alert("Παρακαλώ συμπληρώστε όλα τα πεδία.")</script>';
		echo "Παρακαλώ συμπληρώστε όλα τα πεδία.";
	} else {
		$stmt = $db_conn->prepare("INSERT INTO requests(name, phone_number, department, email, subject, message) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $name, $phone, $dept, $email, $subj, $mess);
		$result = $stmt->execute();

		if ($result) {
			echo '<script>alert("Το αίτημα καταχωρήθηκε.")</script>';
			echo "Το αίτημα καταχωρήθηκε.";
		} else {
			echo '<script>alert("Υπήρξε πρόβλημα με την καταχώρηση του αιτήματός σας.")</script>';
			echo "Υπήρξε πρόβλημα με την καταχώρηση του αιτήματός σας.";
		}
		$stmt->close();
	}

	mysqli_close($db_conn);

} else {
  echo '<script>alert("Παρακαλώ συμπληρώστε όλα τα πεδία.")</script>';
  echo "Παρακαλώ συμπληρώστε όλα τα πεδία.";
}

?>