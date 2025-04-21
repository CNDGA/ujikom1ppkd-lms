<?php
if (isset($_POST['simpan'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);



  $insert = mysqli_query($koneksi, "INSERT INTO users (name, email, password, is_active) 
    VALUE ('$name','  $email','$password',1)");
  if ($insert) {
    header("location:?page=users&add=success");
  }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM users WHERE id=  '$id' ");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
  $id = $_GET['edit'];
  $name = $_POST['name'];
  $email = $_POST['email'];


  $update = mysqli_query($koneksi, "UPDATE users SET 
    name='$name' WHERE id= '$id' ");
  if ($update) {
    header("location:?page=users&update=success");
  }
}
?>

<form action="" method="POST">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3>Users</h3>
          <form action="" method="POST">
            <div class="card-body">

              <div class=" mb-3">
                <input value="<?php echo isset($_GET['edit']) ? $rowEdit['name'] : '' ?>" type="text" name="name" class="form-control" require placeholder="masukan nama lengkap anda">
              </div>

              <div class=" mb-3">
                <input value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>" type="email" name="email" class="form-control" require placeholder="masukan email anda">
              </div>

              <div class=" mb-3">
                <input value="" type="password" name="password" class="form-control" require placeholder="masukan password anda">
              </div>

              <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">Simpan</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>