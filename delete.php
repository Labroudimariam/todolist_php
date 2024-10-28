<?php

include 'connect.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id =?");

    $stmt->execute([$id]);

    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
        header('Location: todolist.php');
    } else {
        echo "No record found with id $id";
    }
}


?>