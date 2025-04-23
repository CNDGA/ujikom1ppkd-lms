<?php
if (isset($_POST['simpan'])) {
  $user_id = $_POST['user_id'];
  $instructor_id = $_POST['instructor_id'];



  $insert = mysqli_query($koneksi, "INSERT INTO majors_detail (user_id, instructor_id) 
    VALUE ('$user_id','$instructor_id')");
  if ($insert) {
    header("location:?page=detailjurusan&add=success");
  }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM majors_detail WHERE id=  '$id' ");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
  $user_id = $_POST['user_id'];
  $instructor_id = $_POST['instructor_id'];

  $update = mysqli_query($koneksi, "UPDATE users SET 
    name='$name' WHERE id= '$id' ");
  if ($update) {
    header("location:?page=detailjurusan&update=success");
  }
}

$select1 = mysqli_query($koneksi, "SELECT * FROM users");
$select2 = mysqli_query($koneksi, "SELECT * FROM instructors");

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
                <select name="user_id" id="" class="form-control">
                  <option value="">Choose Users</option>
                  <?php foreach ($select1 as $rowCS) : ?>
                    <option value="<?php echo $rowCS['id'] ?>"><?php echo $rowCS['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="mb-3">
                <select name="instructor_id" id="" class="form-control">
                  <option value="">Choose instructors</option>
                  <?php foreach ($select2 as $rowCS) : ?>
                    <option value="<?php echo $rowCS['id'] ?>"><?php echo $rowCS['id'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">Simpan</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>