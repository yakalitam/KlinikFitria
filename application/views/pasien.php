<div class="container">
    <h1 class="text-center mt-5">Data Pasien Klinik Fitria</h1>
    <!-- baris kode dibawah digunakan untuk fitur search -->
    <div class="row d-flex flex-row-reverse" style="margin-top: 50px">
        <div class="col-4">
            <!-- pada baris dibawah ini form menggunakan metode GET untuk mengambil data yang di ketikkan user -->
            <form action="<?= base_url('Pasien/index') ?>" method="GET">
                <h6>Pencarian Data Pasien:</h6>
                <div class="input-group">
                    <!-- pada baris kode dibawah ini digunakan untuk menyimpan hasil inputan(user) sementara di dalam variabel keyword -->
                    <input type="text" class="form-control" name="keyword" placeholder="Masukkan Kata Kunci...">
                    <!-- Pada baris dibawah digunakan untuk button submit -->
                    <span class="input-group-btn" style="margin-left: 2px;">
                        <button class="btn btn-warning" type="submit">Cari...</button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <a class="btn btn-sm btn-success" href="<?php echo base_url('Pasien/addT') ?>">
                    <b>+ Tambah Data Pasien</b>
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-xs-4 col-xs-offset-4 text-center">
                <!-- pada baris ini jika pada variabel keyword tidak kosong maka akan mengeksekusi untuk menampilkan data yang di minta oleh user sesuai dengan yang dicari -->
                <?php if (!empty($keyword)) { ?>
                    <p style="color:blue">
                        <b>Menampilkan data dengan kata kunci : "<?= $keyword; ?>"</b>
                    </p>
                <?php } ?>

                <table id="Tpasien" class="table table-hover table-bordered rounded-5 text-center">
                    <thead>
                        <tr>
                            <!-- <th scope="col" style="width: 20px;">No</th> -->
                            <th scope="col" style="width: 100px;">ID Pasien</th>
                            <th scope="col" style="width: 500px;">Nama Pasien</th>
                            <th scope="col" style="width: 200px;">Tanggal Lahir</th>
                            <th scope="col" style="width: 200px;">alamat</th>
                            <th scope="col" style="width: 200px;">No Telpon</th>
                            <th scope="col" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>

                    <!-- <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $d) { ?>
                            <tr>
                                <th><?= $no++; ?></th>
                                <th><?= $d['idpasien'] ?></th>
                                <th><?= $d['nama'] ?></th>
                                <th><?= $d['tgllahir'] ?></th>
                                <th><?= $d['alamat'] ?></th>
                                <th><?= $d['notelp'] ?></th>
                                <th>
                                    <a class="btn btn-sm btn-warning" href="Pasien/edit/<?php echo $d['idpasien'] ?>"><i class="icon-pencil"></i> EDIT</a>
                                    <button class="btn btn-sm btn-danger"  onclick="return fungsiDelete()">DELETE</button>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody> -->
                </table>
            </div>

        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if ($this->session->flashdata('pesan') !=''){ ?>
    <script> Swal.fire({
        icon  : 'success',
        title : 'SUKSES',
        text  : 'lancar gaes',
        confirmButtonText: 'sap lur'
    })</script>
<?php } elseif ($this->session->flashdata('gagal') !=''){ ?>
    Swal.fire({
        icon  : 'error',
        title : 'FAIL',
        text  : 'Gagal : what's problem?',
        confirmButton : 'santuy'
    })
<?php } ?>


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
    </script>