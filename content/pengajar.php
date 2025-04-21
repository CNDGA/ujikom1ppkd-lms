<?php
$query = mysqli_query($koneksi, "SELECT * FROM instructors ORDER BY id DESC ");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);


if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = mysqli_query($koneksi, "DELETE FROM instructors WHERE id='$id'");
  header("Location:?page=pengajar&notif=success");
}
?>


<form method="POST">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3>Data</h3>
        </div>
        <div class="card-body">
          <div class="mb-3 mt-3">
            <a href="?page=tambah-pengajar" class="btn btn-primary">Create New </a>
          </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>majors id</th>
                <th>user_id</th>
                <th>title</th>
                <th>gender</th>
                <th>address</th>
                <th>phone</th>
                <th>photo</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($row as $rows) : ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $rows['majors_id'] ?></td>
                  <td><?php echo $rows['user_id'] ?></td>
                  <td><?php echo $rows['title'] ?></td>
                  <td><?php echo $rows['gender'] ?></td>
                  <td><?php echo $rows['address'] ?></td>
                  <td><?php echo $rows['phone'] ?></td>
                  <td><?php echo $rows['photo'] ?></td>

                  <td>
                    <a href="?page=tambah-roles&edit=<?php echo $rows['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="?page=roles&delete=<?php echo $rows['id'] ?>" onclick="return confirm('Gueeee apushhh nichhh ngabbbss')" class="btn btn-danger btn-sm">Deleted</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>