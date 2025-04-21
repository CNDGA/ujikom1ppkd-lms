<?php
if (isset($_POST['simpan'])) {
  $majors_id = $_POST['majors_id'];
  $user_id = $_POST['user_id'];
  $title = $_POST['title'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  $photo = $_FILES['photo'];


  if ($foto['error'] == 0) {
    $fileName = uniqid() . '_' . basename($foto['name']);
    $filePath = "uploads/" . $fileName;
    move_uploaded_file($foto['tmp_name'], $filePath);

    $insert = mysqli_query($koneksi, "INSERT INTO instructors (majors_id,user_id,title,gender,address,phone);
    VALUES ('$majors_id','$user_id','$title','$gender','$address','$phone','$fileName')");
    if ($insert) {
      header("location:?page=pengajar&add=success");
    }
  }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM instructors WHERE id=  '$id' ");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
  $id = $_GET['edit'];
  $majors_id = $_POST['majors_id'];
  $user_id = $_POST['user_id'];
  $title = $_POST['title'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  $photo = $_FILES['photo'];

  if ($photo['error'] == 0) {
    // If a new file is uploaded, process it
    $fileName = uniqid() . '_' . basename($photo['name']);
    $filePath = "uploads/" . $fileName;
    move_uploaded_file($foto['tmp_name'], $filePath);
  } else {
    // If no new file is uploaded, use the old file
    $fileName = $rowEdit['foto'];
  }

  $update = mysqli_query($koneksi, "UPDATE instructors SET 
majors_id='$majors_id', user_id='$user_id', title='$title', gender='$gender',address='$address', phone='$phone' ,foto='$fileName' WHERE id=$id");

  if ($update) {
    header("location:?page=pengajar&update=success");
  }
}

$select1 = mysqli_query($koneksi, "SELECT * FROM majors");
$select2 = mysqli_query($koneksi, "SELECT * FROM users WHERE id =3");

?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3>Users</h3>
          <form action="" method="POST">
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
                <input type=""> <?php echo $select2['id'] ?>

              </div>

              <!-- <div class="row mb-3">
                <div class="col-sm-2">
                  <label for="">Foto</label>
                </div>
                <div class="col-sm-10">
                  <input type="file" name="foto">
                  <img src="uploads/<?php echo $rowEdit['foto'] ?>" alt="" width="100">
                </div>
              </div> -->

              <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">Simpan</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>