<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>To-Do Lista</h1>
        <form method="POST" action="">
            <input type="text" name="task" placeholder="Dodaj nowe zadanie" required>
            <button type="submit" name="add_task">Dodaj zadanie</button>
        </form>
        <ul>
            <?php
            include 'db.php';

            // Dodawanie nowego zadania do listy
            if (isset($_POST['add_task'])) {
                $task = $_POST['task'];
                $sql = "INSERT INTO tasks (task) VALUES ('$task')";
                if ($conn->query($sql) === TRUE) {
                    header("Location: index.php"); 
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Usuwanie zadania z listy
            if (isset($_GET['del_task'])) {
                $id = $_GET['del_task'];
                $sql = "DELETE FROM tasks WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    header("Location: index.php"); 
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Aktualizacja stanu ukończenia zadania
            if (isset($_POST['update_task'])) {
                $id = $_POST['task_id'];
                $completed = isset($_POST['completed']) ? 1 : 0;
                $sql = "UPDATE tasks SET completed=$completed WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    header("Location: index.php"); 
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Wyświetlanie listy zadań
            $sql = "SELECT * FROM tasks";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $completed = $row['completed'] ? 'checked' : '';
                    $taskClass = $row['completed'] ? 'completed' : '';
                    echo "<li class='$taskClass'>
                            <form method='POST' action=''>
                                <input type='hidden' name='task_id' value='" . $row['id'] . "'>
                                <input type='checkbox' name='completed' $completed onchange='this.form.submit()'>
                                " . $row['task'] . "
                                <input type='hidden' name='update_task' value='1'>
                                <a href='index.php?del_task=" . $row['id'] . "' class='delete-btn'>Delete</a>
                            </form>
                          </li>";
                }
            } else {
                echo "<li>Brak zadań na liście</li>";
            }

            $conn->close();
            ?>
        </ul>
    </div>
</body>
</html>