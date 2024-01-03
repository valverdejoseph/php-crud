<?php

include("db.php");
include("includes/header.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }    
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = '¡Tarea Actualizada!';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
}

?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body text-bg-dark border-info mb-3">
                <form action="edit_task.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title ?>" class="form-control" placeholder="Actualizar Título">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Actualizar Descripción"><?php echo $description; ?></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-info" name="update">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>