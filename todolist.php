<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>To Do List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="text-center my-5">To Do List</h1>
    <form action="insert.php" method="POST">
        <input class="form-control mt-5 mb-3" type="text" name="task" placeholder="Enter a new task" required>
        <button  class='btn btn-primary' type="submit">Save</button>
    </form>
    <table class="table my-5 text-center">
        <thead>
            <tr>
                <th>Tasks</th>
                <th>Date</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            include 'connect.php';
            $stmt = $conn->query("SELECT * FROM tasks");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['task_name']}</td>";
                echo "<td>".Date("d/M/Y")."</td>";
                echo "<td>";
                echo "<button class='btn btn-success me-3'><a class='text-white link-underline link-underline-opacity-0' href='update.php?id={$row['id']}'>Update</a></button>";
                echo "<button class='btn btn-danger'><a class='text-white link-underline link-underline-opacity-0' href='delete.php?id={$row['id']}'>Delete</a></button>";

                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>