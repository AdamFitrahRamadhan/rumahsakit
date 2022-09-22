<div class="panel">
	<div class="panel-heading">
		<div class="col-md-12">
			<div class="col-md-6">
				<h3>Data Pegawai</h3>
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
				<th>Level</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php $no = 0; foreach ($tampil_pegawai as $peg): $no++ ?>
					<tr>
						<td><?=$no?> </td>
						<td><?=$peg->nama_user?> </td>
						<td><?=$peg->level?> </td>
						<td>
							<a href="#edit" onclick="edit(<?=$peg->id_user?>)" class="btn btn-info" data-toggle="modal">Ubah</a>
							<a href="<?=base_url('index.php/pegawai/hapus/'.$peg->id_user)?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
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
				<form action="<?=base_url('index.php/pegawai/tambah_pegawai')?>" method="POST">
					<table class="table">
						<tr>
							<td>nama pegawai</td>
							<td><input type="text" name="nama_user" class="form-control"><br>
							</td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password" class="form-control"><br>
							</td>
						</tr>
						<tr>
							<td>Level</td>
							<td><select name="level" class="form-control">
								  <option value=""></option>
								  <option value="ADMIN">ADMIN</option>
								  <option value="RESEPSIONIS">RESEPSIONIS</option>
								</select><br>
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
				<form action="<?=base_url('index.php/pegawai/ubah')?>" method="POST">
					<table class="table">
						<tr>
							<td>nama pegawai</td>
							<td>
							<input type="hidden" name="id_user" id="id_user">
							<input type="text" id="nama_user" name="nama_user" class="form-control"><br>
						<tr>
							<td>password</td>
							<td>
							<input type="password" id="password" name="password" class="form-control"><br>
							</td>
						</tr>
						<tr>
							<td>nama pegawai</td>
							<td>
							<select name="level" class="form-control" id="level">
								  <option value="ADMIN">ADMIN</option>
								  <option value="PASIEN">PASIEN</option>
							</select><br>
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
			url:"<?=base_url()?>index.php/pegawai/detail_pegawai/"+a,
			dataType:"json",
			success:function(data){
				$("#id_user").val(data.id_user);
				$("#nama_user").val(data.nama_user);
				$("#password").val(data.password);
				$("#level").val(data.level);
			}
		});
	}
</script>