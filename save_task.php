<?php

include("db.php");

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $query = "INSERT INTO tasks(title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Qwery Failed");
    }

    $_SESSION['message'] = '¡Tarea Guardada!';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}
?>