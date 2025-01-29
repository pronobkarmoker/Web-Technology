<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin.html");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FINAL";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from database
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Me</a>
                    <ul>
                        <li><a href="personal_info.html">Personal Info</a></li>
                        <li><a href="educational_info.html">Educational Info</a></li>
                        <li><a href="work_info.html">Work Info</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact Me</a></li>
                <li><a href="admin.html">Admin</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="contactList">
            <h1>Contact List</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"]. "</td>
                                <td>" . $row["name"]. "</td>
                                <td>" . $row["email"]. "</td>
                                <td>" . $row["subject"]. "</td>
                                <td>" . $row["message"]. "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No contacts found</td></tr>";
                }
                ?>
            </table>
            <br>
            <a href="logout.php">Logout</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Lab Exam Website</p>
    </footer>
</body>
</html>