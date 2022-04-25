<title>Pasien</title>

<style>

</style>

<div class="container mt-5">

  <div class="container-fluid mt-3">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel List Pasien</h6>
      </div>    
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="max-width: 100%;
      overflow-x: hidden;">
                <thead>
                        <tr style="text-align:center;">
                            <th scope="col" style="width: 20px;">No</th>
                            <th scope="col" style="width: 100px;">ID Pasien</th>
                            <th scope="col" style="width: 500px;">Nama Pasien</th>
                            <th scope="col" style="width: 200px;">Tanggal Lahir</th>
                            <th scope="col" style="width: 200px;">alamat</th>
                            <th scope="col" style="width: 200px;">No Telpon</th>
                            <th scope="col" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $d) { ?>
                            <tr style="text-align:center;">
                                <td><?= $no++; ?></td>
                                <td><?= $d['idpasien'] ?></td>
                                <td><?= $d['nama'] ?></td>
                                <td><?= $d['tgllahir'] ?></td>
                                <td><?= $d['alamat'] ?></td>
                                <td><?= $d['notelp'] ?></td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="Pasien/edit/<?php echo $d['idpasien'] ?>"><i class="fa fa-edit"></i>&nbsp Edit</a>
                                  <hr> <a class="btn btn-sm btn-danger" href="Pasien/delete/<?php echo $d['idpasien']; ?>" onclick="return konfirmasi('Data ini akan dihapus, apakah anda yakin?')"><i class="fa fa-trash"></i>&nbsp Delete</a>
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


</div>
</div>


</div>
</div>
</div>


</div>