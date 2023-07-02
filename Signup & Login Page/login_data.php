<?php
$uname = $_POST['username'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if (!empty($uname) || !empty($email) || !empty($pass1) || !empty($pass2)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "login";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
    } else {
        $SELECT_USERNAME = "SELECT username FROM register WHERE username = ? LIMIT 1";
        $SELECT_EMAIL = "SELECT email FROM register WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO register (username, email, pass1, pass2) VALUES (?, ?, ?, ?)";

        // Prepare statement for username check
        $stmt = $conn->prepare($SELECT_USERNAME);
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $stmt->bind_result($username);
        $stmt->store_result();
        $usernameExists = $stmt->num_rows > 0;
        $stmt->close();

        // Prepare statement for email check
        $stmt = $conn->prepare($SELECT_EMAIL);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $emailExists = $stmt->num_rows > 0;
        $stmt->close();

        // Check if username or email already exists
        if ($emailExists) {
            echo "Email already exists";
        } elseif ($usernameExists) {
            echo "Username already exists";
        } else {

            $hashedPassword1 = password_hash($pass1, PASSWORD_DEFAULT);
            $hashedPassword2 = password_hash($pass2, PASSWORD_DEFAULT);
            // Insert new record into register table
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssss", $uname, $email, $hashedPassword1, $hashedPassword2);
            $stmt->execute();
            echo "New record inserted successfully... '<a href='login.php'>Go to Login Page</a>'";
            $stmt->close();

            /*// Insert username and pass1 into user table
            $targetTable = "users";
            $insertSql = "INSERT INTO $targetTable (username, pass1) VALUES (?, ?)";
            $stmt = $conn->prepare($insertSql);
            $stmt->bind_param("ss", $uname, $pass1);
            $stmt->execute();
            $stmt->close();*/
        }

        $conn->close();
    }
} else {
    echo "All fields are required";
    die();
}
?>
