
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- <title><?= $judulhlm ?></title> -->
</head>
<body>
<div class="container my-3">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Daftar Pasien
				</div>
				<div class="card-body">
                    <!-- menambah tombol tambah buku -->
                    <strong>Pasien</strong><br>
					<div class="input-group mb-3">
						<!-- <form action="" method="GET">
							<div class="input-group">
								<input type="text" class="form-control" aria-label="Keyword" name="keyword" placeholder="Masukkan nama buku" aria-describedby="button-addon2">
								<button class="btn btn-outline-secondary" type="submit">Cari</button>
							</div>
						</form> -->
					</div>
					<!-- Membuat tabel buku -->
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="table_id">
							<thead>
							<tr>
								<th>ID Pasien</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Tanggal lahir</th>
								<th>No Telepon</th>
							</tr>
							</thead>
							<tbody>
							<!-- Jika ada keyword -->
							<?php if (isset($_GET['keyword'])) { ?>
								<p>Menampilkan data dengan kata kunci <strong><?php echo $_GET['keyword'] ?></strong></p>
								<?php foreach ($listkeyword as $b) { ?>
                                    <tr>
                                        <td><?php echo $b->idpasien; ?></td>
                                        <td><?php echo $b->nama; ?></td>
                                        <td><?php echo $b->alamat; ?></td>
                                        <td><?php echo $b->tgllahir; ?></td>
                                        <td><?php echo $b->notelp; ?></td>
									<?php } ?>
									</tbody>
						</table>
					</div>
				<?php } else { ?>
					<!-- Menampilkan array $listpasien -->
					<?php
								foreach ($listpasien as $b) { ?>
						<tr>
							<td><?php echo $b->idpasien; ?></td>
							<td><?php echo $b->nama; ?></td>
							<td><?php echo $b->alamat; ?></td>
							<td><?php echo $b->tgllahir; ?></td>
							<td><?php echo $b->notelp; ?></td>
                            <!-- Admin/edit_pasien?id=<?php echo $b->id_pasien; ?> -->
                            <!-- Admin/delete_pasien?id=<?php echo $b->id_pasien; ?> -->
						<?php } ?>
						</table>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</body>
</html>


