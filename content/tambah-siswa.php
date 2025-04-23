<?php
if (isset($_POST['simpan'])) {
    $majors_id = $_POST['majors_id'];
    $user_id = $_POST['user_id'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $place_of_birth = $_POST['place_of_birth'];

    $photo = $_FILES['photo'];


    if ($photo['error'] == 0) {
        $fileName = uniqid() . '_' . basename($photo['name']);
        $filePath = "uploads/" . $fileName;
        move_uploaded_file($photo['tmp_name'], $filePath);

        $insert = mysqli_query($koneksi, "INSERT INTO students (majors_id, user_id, gender, date_of_birth, place_of_birth, photo) 
    VALUES ('$majors_id','$user_id','$gender','$date_of_birth','$place_of_birth','$fileName')");

        if ($insert) {
            header("location:?page=siswa&add=success");
        }
    }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM students WHERE id=  '$id' ");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $majors_id = $_POST['majors_id'];
    $user_id = $_POST['user_id'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $place_of_birth = $_POST['place_of_birth'];

    $photo = $_FILES['photo'];

    if ($photo['error'] == 0) {
        // If a new file is uploaded, process it
        $fileName = uniqid() . '_' . basename($photo['name']);
        $filePath = "uploads/" . $fileName;
        move_uploaded_file($photo['tmp_name'], $filePath);
    } else {
        // If no new file is uploaded, use the old file
        $fileName = $rowEdit['photo'];
    }

    $update = mysqli_query($koneksi, "UPDATE students SET 
majors_id='$majors_id', user_id='$user_id', gender='$gender', date_of_birth='$date_of_birth', place_of_birth='$place_of_birth' ,photo='$fileName' WHERE id=$id");

    if ($update) {
        header("location:?page=siswa&update=success");
    }
}

$select1 = mysqli_query($koneksi, "SELECT * FROM majors");
$select2 = mysqli_query($koneksi, "SELECT * FROM users WHERE id =4");
$data = mysqli_fetch_assoc($select2);

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Users</h3>

                    <div class="card-body">

                        <div class="mb-3">
                            <select name="majors_id" id="" class="form-control">
                                <option value="">Choose Majors</option>
                                <?php foreach ($select1 as $rowCS) : ?>
                                    <option value="<?php echo $rowCS['id'] ?>"><?php echo $rowCS['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="hidden" name="user_id" value="<?php echo $data['id'] ?>">
                            <input type="text" class="form-control" value="<?php echo $data['name'] ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label><input type="radio" name="gender" value="1" <?php echo (isset($_GET['edit']) && $rowEdit['gender'] == '1') ? 'checked' : ''; ?>> Laki-laki </label>
                            <label><input type="radio" name="gender" value="0" <?php echo (isset($_GET['edit']) && $rowEdit['gender'] == '0') ? 'checked' : ''; ?>> Perempuan </label>

                        </div>

                        <div class="mb-3">
                            <input value="<?php echo isset($_GET['edit']) ? $rowEdit['date_of_birth'] : '' ?>" type="date" name="date_of_birth" class="form-control" require>
                        </div>

                        <div class="mb-3">
                            <input value="<?php echo isset($_GET['edit']) ? $rowEdit['place_of_birth'] : '' ?>" type="text" name="place_of_birth" class="form-control" require placeholder="Silahkan masukan tempat lahir">
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="">Foto</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="file" name="photo">
                                <img src="uploads/<?php echo isset($_GET['edit']) ? $rowEdit['photo'] : '' ?>" alt="" width="100">
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">Simpan</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</form>