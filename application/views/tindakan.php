<div class="container">
    <h1 class="text-center mt-5">Data Tindakan Klinik Fitria</h1>
    <!-- baris kode dibawah digunakan untuk fitur search -->
    <!-- <div class="row d-flex flex-row-reverse" style="margin-top: 50px">
        <div class="col-4">
            <!-- pada baris dibawah ini form menggunakan metode GET untuk mengambil data yang di ketikkan user -->
    <!-- <form action="<?= base_url('Tindakan/index') ?>" method="GET">
                <h6>Pencarian Data Tindakan:</h6>
                <div class="input-group"> -->
    <!-- pada baris kode dibawah ini digunakan untuk menyimpan hasil inputan(user) sementara di dalam variabel keyword -->
    <!--<input type="text" class="form-control" name="keyword" placeholder="Masukkan Kata Kunci...">-->
    <!-- Pada baris dibawah digunakan untuk button submit -->
    <!-- <span class="input-group-btn" style="margin-left: 2px;">
                        <button class="btn btn-warning" type="submit">Cari...</button>
                    </span>
                </div>
            </form>
        </div>
    </div> -->

    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <a class="btn btn-sm btn-success" href="<?php echo base_url('Tindakan/addT') ?>">
                    <b>+ Tambah Data Tindakan</b>
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-xs-4 col-xs-offset-4 text-center">
                <!-- pada baris ini jika pada variabel keyword tidak kosong maka akan mengeksekusi untuk menampilkan data yang di minta oleh user sesuai dengan yang dicari -->
                <!-- <?php if (!empty($keyword)) { ?>
                    <p style="color:blue">
                        <b>Menampilkan data dengan kata kunci : "<?= $keyword; ?>"</b>
                    </p>
                <?php } ?> -->

                <table id="Ttindakan" class="table table-hover table-bordered rounded-5 text-center">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 20px;">No</th>
                            <th scope="col" style="width: 100px;">ID Tindakan</th>
                            <th scope="col" style="width: 600px;">Nama Tindakan</th>
                            <th scope="col" style="width: 200px;">Biaya</th>
                            <th scope="col" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $d) { ?>
                            <tr>
                                <th><?= $no++; ?></th>
                                <th><?= $d['idtindakan'] ?></th>
                                <th><?= $d['namatindakan'] ?></th>
                                <th>Rp. <?php echo number_format($d['biaya'], 0, ',', '.') ?></th>
                                <th>
                                    <a class="btn btn-sm btn-warning" href="Tindakan/edit/<?php echo $d['idtindakan'] ?>"><i class="icon-pencil"></i> EDIT</a>
                                    <a class="btn btn-sm btn-danger" href="Tindakan/delete/<?php echo $d['idtindakan']; ?>" onclick="return konfirmasi('Data ini akan dihapus, apakah anda yakin?')">DELETE</a>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        // script untuk menampilkan table dengan library datatables
        $(document).ready(function() {
            $('#Ttindakan').DataTable();
        });
    </script>