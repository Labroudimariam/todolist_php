<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task'];

    $stmt = $conn->prepare("INSERT INTO tasks (task_name,date) VALUES (?,now())");
    $stmt->execute([$task_name]);

    header("Location: todolist.php"); 
}
?>