<!-- btn tambah buku baru -->
<?php include '../function.php'; ?>
<a href="?page=transaksi&aksi=tambah" class="btn btn-primary" style="margin-bottom: 10px">Tambah Transaksi</a>
<div class="row">
  <div class="col-md-12">
    <!-- Table data buku -->
  <div class="panel panel-default">
      <div class="panel-heading">
        Data Buku
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Nomor Induk Siswa</th>
                <th>Nama</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Terlambat</th>
                <th>Status</th>
                <th>Aksi </th>
              </tr>
            </thead>
            <!-- fetching item dari database ke form -->
            <tbody>

              <?php
              $no = 1;
              $sql = $koneksi -> query("select*from tb_transaksi where status='pinjam'");
              while ($data= $sql-> fetch_assoc()){

                ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['judul'];?></td>
                  <td><?php echo $data['nis'];?></td>
                  <td><?php echo $data['nama'];?></td>
                  <td><?php echo $data['tgl_pinjam'];?></td>
                  <td><?php echo $data['tgl_kembali'];?></td>
                  <td>
                    <?php
                    $denda = 1000;
                    $tgl_dateline = $data['tgl_kembali'];
                    $tgl_kembali = date('Y-m-d');
                    //   echo $tgl_dateline2;a
                    $lambat = terlambat($tgl_dateline, $tgl_kembali);
                    //echo $lambat;
                    $denda_a = $lambat * $denda;
                    //atur keterlambatan pengembalian denda
                    if($lambat>0){
                      echo "
                      <font color='red'>$lambat hari<br>(Rp $denda_a)</font>


                      ";
                    }else{
                      echo $lambat . "Hari";
                    }
                    ?>
                  </td>
                  <td><?php echo $data['status'];?></td>
                  <td>
                    <!-- <a href="?page=anggota&aksi=edit&id=<?php echo $data['nim'];?>" class="btn btn-info">Edit</a>
                    <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Buku Berikut?')" href="?page=buku&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger">Delete</a> -->
                  </td>
                </tr>


              <?php } ?>
            </tbody>
          </table>
          </div>
        </div>

    </div>
  </div>
</div>
