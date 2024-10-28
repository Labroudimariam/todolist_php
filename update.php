<?php
include 'connect.php';

$id = $_GET['id'];

$query = "SELECT * FROM tasks WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->execute([$id]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){
    $name = $_POST['task'];


    $sql = "UPDATE tasks SET task_name=?,date=now() WHERE id=?";
    $stmt = $conn->prepare($sql);

    $stmt->execute([$name,$id]);

    if ($stmt->execute()) { 
        header('Location: todolist.php');
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-5">
        <form method='post'>

            <div class="mb-3">
                <label class="form-label">Task</label>
                <input type="text" class="form-control" placeholder='Enter a new task' value="<?php echo $user['task_name']; ?>"  name='task'>
            </div>
            <button Name='submit' type="submit" class="btn btn-primary">Save</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>