<div class="panel">
	<div class="panel-heading">
		<div class="col-md-12">
			<div class="col-md-6">
				<h3>History Pembayaran</h3>
			</div>
			<div class="col-md-6" >
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
				<?php $no = 0; foreach ($tampil_histori as $pas): $no++ ?>
					<tr>
						<td><?=$no?> </td>
						<td><?=$pas->nama_pasien?> </td>
						<td><?=$pas->alamat?> </td>
						<td><?=$pas->jenis_kelamin?> </td>
						<td><?=$pas->telepon?> </td>
						<td>
							<a href="#edit" onclick="edit(<?=$pas->id_pasien?>)" class="btn btn-info" data-toggle="modal">Detail</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<div class="modal fade" id="edit">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
					<h4 class="modal-title">Detail Pembayaran</h4>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('index.php/pasien/veri_tindakan')?>" method="POST">
					<table class="table">
						<tr>
							<td>Tanggal Pembayaran</td>
							<input type="hidden" name="id_pasien" id="id_pasien">
							<td><input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control"><br>
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
							</td>
						</tr>
						<tr>
							<td>harga bayar</td>
							<td><input type="number" name="total_bayar" id="total_bayar" class="form-control"><br>
							</td>
						</tr>
						<tr>
							<td>Kembali</td>
							<td><input type="text" name="kembali" id="kembali" class="form-control"><br>
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
				$("#jenis_obat").val(data.jenis_obat);
				$("#jenis_tindakan").val(data.jenis_tindakan);
				$("#total_harga").val(data.total_harga);
				$("#total_bayar").val(data.total_bayar);
				$("#kembali").val(data.total_bayar-data.total_harga);
				$("#tanggal_bayar").val(data.tanggal_bayar);
			}
		});
	}
</script>