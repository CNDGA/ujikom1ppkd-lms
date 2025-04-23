<?php
if (isset($_POST['simpan'])) {
    $learning_modul_id = $_POST['learning_modul_id'];
    $file_name = $_POST['file_name'];
    $reference_link = $_POST['reference_link'];

    $file = $_FILES['file'];


    if ($file['error'] == 0) {
        $fileName = uniqid() . '_' . basename($photo['name']);
        $filePath = "files/" . $fileName;
        move_uploaded_file($file['tmp_name'], $filePath);

        $insert = mysqli_query($koneksi, "INSERT INTO learning_modul_details (learning_modul_id, file_name, file, reference_link) 
    VALUES ('$learning_modul_id','$file_name','$fileName', '$reference_link')");

        if ($insert) {
            header("location:?page=detailsmoduls&add=success");
        }
    }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM learning_modul_details WHERE id=  '$id' ");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $learning_modul_id = $_POST['learning_modul_id'];
    $file_name = $_POST['file_name'];
    $reference_link = $_POST['reference_link'];

    $file = $_FILES['file'];


    if ($file['error'] == 0) {
        // If a new file is uploaded, process it
        $fileName = uniqid() . '_' . basename($file['name']);
        $filePath = "files/" . $fileName;
        move_uploaded_file($file['tmp_name'], $filePath);
    } else {
        // If no new file is uploaded, use the old file
        $fileName = $rowEdit['file'];
    }

    $update = mysqli_query($koneksi, "UPDATE learning_modul_details SET 
learning_modul_id='$learning_modul_id', file_name='$file_name', file='$fileName', reference_link='$reference_link' WHERE id=$id");

    if ($update) {
        header("location:?page=detailsmoduls&update=success");
    }
}

$select1 = mysqli_query($koneksi, "SELECT * FROM learning_moduls");
// $select2 = mysqli_query($koneksi, "SELECT * FROM users WHERE id =3");
// $data = mysqli_fetch_assoc($select2);

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Users</h3>

                    <div class="card-body">

                        <div class="mb-3">
                            <select name="learning_modul_id" id="" class="form-control">
                                <option value="">Choose Majors</option>
                                <?php foreach ($select1 as $rowCS) : ?>
                                    <option value="<?php echo $rowCS['id'] ?>"><?php echo $rowCS['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>


                        <div class="mb-3">
                            <input value="<?php echo isset($_GET['edit']) ? $rowEdit['file_name'] : '' ?>" type="text" name="file_name" class="form-control" require placeholder="masukan nama file name">
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="">File</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="file" name="file" placeholder="silahkan uploads file materi">
                                <img src="uploads/<?php echo isset($_GET['edit']) ? $rowEdit['file'] : '' ?>" alt="" width="100">
                            </div>
                        </div>


                        <div class="mb-3">
                            <input value="<?php echo isset($_GET['edit']) ? $rowEdit['reference_link'] : '' ?>" type="text" name="reference_link" class="form-control"
                                placeholder="silahkan link pembelajaran">
                        </div>


                        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">Simpan</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</form>