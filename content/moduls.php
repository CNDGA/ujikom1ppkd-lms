<?php
$query = mysqli_query($koneksi, "SELECT * FROM learning_moduls ORDER BY id DESC ");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM learning_moduls WHERE id='$id'");
    header("Location:?page=moduls&notif=success");
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
                        <a href="?page=tambah-moduls" class="btn btn-primary">Create New </a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>instructor_id</th>
                                <th>name</th>
                                <th>description</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row as $rows) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rows['instructor_id'] ?></td>
                                    <td><?php echo $rows['name'] ?></td>
                                    <td><?php echo $rows['description'] ?></td>
                                    <td>
                                        <a href="?page=tambah-moduls&edit=<?php echo $rows['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="?page=moduls&delete=<?php echo $rows['id'] ?>" onclick="return confirm('Gueeee apushhh nichhh ngabbbss')" class="btn btn-danger btn-sm">Deleted</a>
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