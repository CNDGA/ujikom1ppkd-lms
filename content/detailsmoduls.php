<?php
$query = mysqli_query($koneksi, "SELECT * FROM learning_modul_details ORDER BY id DESC ");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM learning_modul_details WHERE id='$id'");
    header("Location:?page=detailsmoduls&notif=success");
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
                        <a href="?page=tambah-detailsmoduls" class="btn btn-primary">Create New </a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>learning_modul_id </th>
                                <th>file_name</th>
                                <th>file</th>
                                <th>reference_link</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row as $rows) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rows['learning_modul_id'] ?></td>
                                    <td><?php echo $rows['file_name'] ?></td>
                                    <td><?php echo $rows['file'] ?></td>
                                    <td><?php echo $rows['reference_link'] ?></td>


                                    <td>
                                        <a href="?page=tambah-detailsmoduls&edit=<?php echo $rows['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="?page=detailsmoduls&delete=<?php echo $rows['id'] ?>" onclick="return confirm('Gueeee apushhh nichhh ngabbbss')" class="btn btn-danger btn-sm">Deleted</a>
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