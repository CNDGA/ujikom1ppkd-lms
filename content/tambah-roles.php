<?php
if (isset($_POST['simpan'])) {
  $name = $_POST['name'];




  $insert = mysqli_query($koneksi, "INSERT INTO roles (name, is_active) 
    VALUE ('$name',1)");
  if ($insert) {
    header("location:?page=roles&add=success");
  }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM roles WHERE id=  '$id' ");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
  $id = $_GET['edit'];
  $name = $_POST['name'];


  $update = mysqli_query($koneksi, "UPDATE roles SET 
    name='$name' WHERE id= '$id' ");
  if ($update) {
    header("location:?page=roles&update=success");
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

                <input value="<?php echo isset($_GET['edit']) ? $rowEdit['name'] : '' ?>" type="text" name="name" class="form-control" require placeholder="silahkan di isi">
              </div>

              <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">Simpan</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>