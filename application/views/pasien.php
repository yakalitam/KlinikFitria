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
             <a class="btn btn-success" href="<?php echo base_url('Pasien/addT') ?>">
                    <i class="fa fa-plus"></i>&nbsp Tambah Data Pasien
                </a>
                <hr>
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
                                    <a class="btn btn-warning" href="Pasien/edit/<?php echo $d['idpasien'] ?>"><i class="fa fa-edit"></i>&nbsp Edit</a>
                                   <hr> <a class="btn btn-danger"   href="Pasien/delete/<?php echo $d['idpasien'] ?>"  title="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa fa-trash"></i>&nbsp Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
      </div>
    </div>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if ($this->session->flashdata('pesan') !=''){ ?>
    <script> Swal.fire({
        icon  : 'success',
        title : 'SUKSES',
        text  : 'Data Berhasil Diupdate',
        confirmButtonText: 'Update'
    })</script>
<?php } elseif ($this->session->flashdata('gagal') !=''){ ?>
    <script>Swal.fire({
        icon  : 'error',
        title : 'FAIL',
        text  : 'Gagal : what's problem?',
        confirmButton : 'santuy'
    })</script>
<?php } ?>


  </div>

</div>


</div>
</div>


</div>
</div>
</div>


</div>
    <script>
        function fungsiDelete(){
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                denyButtonText: `Jangan Hapus `,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Hapus!', '', 'success');
                    location.href = "Pasien/delete/<?php echo $d['idpasien']; ?>"

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
        })
        }
        function fungsiEdit(){
            location.href = "Pasien/edit/<?php echo $d['idpasien'] ?>";
        }
</script>
<script>
        // script untuk menampilkan table dengan library datatables
        $(document).ready(function() {
            $('#Tpasien').DataTable({
            responsive: true,
            processing: true,
            ajax:"<?= base_url('Pasien/data')?>",
            columnDefs: [{
                defaultContent: klikTombol(),
                targets: [5]
            }]
            })
        });

        function klikTombol(){
            return `<button class="btn btn-sm btn-warning" onclick="return fungsiEdit()"><i class="icon-pencil"></i> EDIT</button>
                                    <button class="btn btn-sm btn-danger"  onclick="return fungsiDelete()">DELETE</button>`;
        }
    </script> -->
