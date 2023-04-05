<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "db_studentlancer";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

// $sql = "SELECT * FROM users";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while ($row = $result->fetch_assoc()) {
//         echo  $row["id"] . "</td><td>" . $row["firstname"] . " " . $row["lastname"];
//     }
//     echo "</table>";
// } else {
//     echo "0 results";
// }
