<?php
include("db.php");
include("includes/header.php");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
            <?php session_unset();} ?>

            <div class="card card-body text-bg-dark border-info mb-3">
                <form action="save_task.php" method="post">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" 
                        placeholder="Título de la Tarea" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"
                        placeholder="Descripción de la Tarea"></textarea>
                    </div>
                    <div class="d-grid gap-2 mx-auto">
                        <input type="submit" name="save_task" class="btn btn-info" 
                        value="Guardar"> 
                    </div>                                 
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-dark table-bordered border-info table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha de Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                        $query = "SELECT * FROM tasks";
                        $result_tasks = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                                <td> <?php echo $row['title'] ?> </td>
                                <td> <?php echo $row['description'] ?> </td>
                                <td> <?php echo $row['created_at'] ?> </td>
                                <td> 
                                    <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fa-solid fa-marker"></i>
                                    </a> 
                                    <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a> 
                                </td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>