<?php
if (isset($_POST['simpan'])) {
    $instructor_id = $_POST['instructor_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $insert = mysqli_query($koneksi, "INSERT INTO learning_moduls (instructor_id, name,description) 
    VALUE ('$instructor_id','$name','$description')");
    if ($insert) {
        header("location:?page=moduls&add=success");
    }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM learning_moduls WHERE id=  '$id' ");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $instructor_id = $_POST['instructor_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];



    $update = mysqli_query($koneksi, "UPDATE learning_moduls SET 
    name='$name' WHERE id= '$id' ");
    if ($update) {
        header("location:?page=moduls&update=success");
    }
}

$select1 = mysqli_query($koneksi, "SELECT * FROM instructors");
?>

<form action="" method="POST">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Users</h3>
                    <form action="" method="POST">
                        <div class="card-body">

                            <div class="mb-3">
                                <select name="instructor_id" id="" class="form-control">
                                    <option value="">Choose Majors</option>
                                    <?php foreach ($select1 as $rowCS) : ?>
                                        <option value="<?php echo $rowCS['id'] ?>"><?php echo $rowCS['id'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>


                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" value="<?php echo isset($_GET['edit']) ? $rowEdit['name'] : '' ?>" require placeholder="silahkan masukan moduls">
                            </div>

                            <div class="mb-3">
                                <textarea name="description" id="" class="form-control"><?php echo isset($_GET['edit']) ? $rowEdit['description'] : '' ?></textarea>
                            </div>

                            <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">Simpan</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>