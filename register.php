<?php

$servername = "localhost";
$username = "root";
$password = "12345@Qwert";
$dbname = "form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, $_POST["username"]); // To prevent SQL injection
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$encryptedpassword = hash('SHA512', $password);

$sql = "SELECT username, password FROM user where username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Username already exist, Please choose different name";
} else if ($username != $row['username']) {
    $insert = "INSERT INTO user values ('$username','$encryptedpassword')";
    $result = $conn->query($insert);

    echo "Registered successfully";
}
$conn->close();
?>
<script>
    function myFunction() {
        var txt;
        if (confirm('Press a button!')) {
            txt = 'You pressed OK!';
        } else {
            txt = 'You pressed Cancel!';
        }
        document.getElementById('demo').innerHTML = txt;
    }
</script>