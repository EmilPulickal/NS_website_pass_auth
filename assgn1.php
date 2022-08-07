<?php
    // phpcs:ignoreFile
    // Write PHP code to update the data of a given table

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nslab";

    $username1=$_REQUEST['username'];
    $name=$_REQUEST['name'];
    $number=$_REQUEST['number'];
    $password1=$_REQUEST['password'];
    $projects=$_REQUEST['projects'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password1);
    $lowercase = preg_match('@[a-z]@', $password1);
    $number    = preg_match('@[0-9]@', $password1);
    $specialChars = preg_match('@[^\w]@', $password1);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password1) < 10) {
        echo 'Password should be at least 10 characters in length and should include at least one upper case letter, one number, and one special character.';
        $conn->close();
    }else{
        echo 'Strong password.';

    $password2=hash('md5',$password1);

    // Update data of John Doe in the table
    $sql = "INSERT INTO users  VALUES('$username1','$name','$number','$password2','$projects')";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        echo "<form action='/nsstuff/login.html' class='inline'>
        <button class='float-left submit-button' >Login</button>
        </form>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    }
?>
