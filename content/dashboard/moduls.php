<?php
$query = mysqli_query($koneksi, "SELECT * FROM `learning_modul_details` LEFT JOIN learning_moduls ON instructor_id =learning_moduls.id");
?>


<form method="POST">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">

        <div class="card-body">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>no</th>
                <th>instruktur</th>
                <th>file</th>
                <th>materi</th>
                <th>link</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($query as $rows) : ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $rows['learning_modul_id'] ?></td>
                  <td><?php echo $rows['file'] ?></td>
                  <td><?php echo $rows['file_name'] ?></td>
                  <td><?php echo $rows['reference_link'] ?></td>
                  <td></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>