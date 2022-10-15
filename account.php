<?php
session_start();

if (isset($_SESSION['loggedin'])) {


    $link = mysqli_connect('localhost', 'root', '', 'art_gallery') or die('Unable to connect the server. ');

    $name = $_SESSION['username'];
    $sql = "SELECT username ,dob,gender,email from newcustomer where newcustomer.username='$name'";
    $res = mysqli_query($link, $sql);
    echo '<table border="1"><tr><th>CUSTOMER NAME</th><th>CUSTOMER dob</th><th>gender</th><th>
email </th></tr>';
    while ($result = mysqli_fetch_assoc($res)) {
        echo '<tr><td>' . $result['username'] . '</td>
           <td>' .
            $result['dob'] . '</td><td>' . $result['gender'] . '</td><td>' . $result['email'] . '</td>
                </tr>';
    }
    echo '</table>';

    
} else {
    header('location:login.php');
}
