<div class="panel">
	<div class="panel-heading">
		<div class="col-md-12">
			<div class="col-md-6">
				<h3>Tindakan dan Obat</h3>
			</div>
			<div class="col-md-6" >
					<a href="#modalTambah" data-toggle="modal" class="btn btn-success" style="float: right">Tambah</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<?php if ($this->session->flashdata('pesan')!=null): ?>
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<i class="fa fa-times-circle"></i>
				<?=$this->session->flashdata('pesan')?>
			</div>
		<?php endif ?>
		
		<table class="table">
			<thead>
				<th>No</th>
				<th>Nama</th>
				<th>alamat</th>
				<th>jenis_kelamin</th>
				<th>telepon</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php $no = 0; foreach ($tampil_pendaftaran as $pas): $no++ ?>
					<tr>
						<td><?=$no?> </td>
						<td><?=$pas->nama_pasien?> </td>
						<td><?=$pas->alamat?> </td>
						<td><?=$pas->jenis_kelamin?> </td>
						<td><?=$pas->telepon?> </td>
						<td>
							<a href="#edit" onclick="edit(<?=$pas->id_pasien?>)" class="btn btn-info" data-toggle="modal">Verifikasi</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<div class="modal fade" id="modalTambah">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('index.php/pasien/tambah_pasien_pendaftaran')?>" method="POST">
					<table class="table">
						<tr>
							<td>nama pasien</td>
							<td><input type="text" name="nama_pasien" class="form-control"><br>
							</td>
						</tr>
						<tr>
							<td>alamat</td>
							<td><input type="text" name="alamat" class="form-control"><br>
							</td>
						</tr>
						<tr>
							<td>jenis kelamin</td>
							<td>
							<select name="jenis_kelamin" class="form-control">
								  <option value="LAKI-LAKI">LAKI-LAKI</option>
								  <option value="PEREMPUAN">PEREMPUAN</option>
							</select><br>
						</tr>
						<tr>
							<td>telepon</td>
							<td><input type="number" name="telepon" class="form-control"><br>
							</td>
						</tr>
						<tr>
							<td>jenis obat</td>
							<td>
							<select name="jenis_obat" class="form-control">
								  <option value="OBAT-BATUK">OBAT-BATUK</option>
								  <option value="OBAT-PILEK">OBAT-PILEK</option>
								  <option value="OBAT-KERAS">OBAT-KERAS</option>
								  <option value="OBAT-GILA">OBAT-GILA</option>
							</select><br>
						</tr>
						<tr>
							<td>jenis tindakan</td>
							<td>
							<select name="jenis_tindakan" class="form-control">
								  <option value="PENGOBATAN">PENGOBATAN</option>
								  <option value="RAWAT-PENGINAPAN">RAWAT-PENGINAPAN</option>
							</select><br>
						</tr>
						<tr>
							<td>harga total</td>
							<td><input type="number" name="total_harga" class="form-control"><br>
							<input type="submit" name="simpan" value="simpan" class="btn btn-success">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>	
		</div>	
		</div>
		<div class="modal fade" id="edit">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					<!-- <h4 class="modal-title">Edit Artikel</h4> -->
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('index.php/pasien/veri_tindakan')?>" method="POST">
					<table class="table">
						<tr>
							<!-- <td>nama pasien</td> -->
							<td>
							<input type="hidden" name="id_pasien" id="id_pasien">
							<!-- <input type="text" id="nama_pasien" name="nama_pasien" class="form-control"><br> -->
							</td>
						</tr>
						
						<tr>
							<td>jenis obat</td>
							<td>
							<select name="jenis_obat" class="form-control" id="jenis_obat">
								  <option value="OBAT-BATUK">OBAT-BATUK</option>
								  <option value="OBAT-PILEK">OBAT-PILEK</option>
								  <option value="OBAT-KERAS">OBAT-KERAS</option>
								  <option value="OBAT-GILA">OBAT-GILA</option>
							</select><br>
						</tr>
						<tr>
							<td>jenis tindakan</td>
							<td>
							<select name="jenis_tindakan" class="form-control" id="jenis_tindakan">
								  <option value="PENGOBATAN">PENGOBATAN</option>
								  <option value="RAWAT-PENGINAPAN">RAWAT-PENGINAPAN</option>
							</select><br>
						</tr>
						<tr>
							<td>harga total</td>
							<td><input type="number" name="total_harga" id="total_harga" class="form-control"><br>
							<input type="submit" name="simpan" value="simpan" class="btn btn-success">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>	
		</div>	
		</div>
	</div>
</div>
<script type="text/javascript">
	function edit(a) {
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/pasien/detail_pasien/"+a,
			dataType:"json",
			success:function(data){
				$("#id_pasien").val(data.id_pasien);
				$("#nama_pasien").val(data.nama_pasien);
				$("#alamat").val(data.alamat);
				$("#jenis_kelamin").val(data.jenis_kelamin);
				$("#telepon").val(data.telepon);
				$("#jenis_obat").val(data.jenis_obat);
				$("#jenis_tindakan").val(data.jenis_tindakan);
				$("#total_harga").val(data.total_harga);
			}
		});
	}
</script>