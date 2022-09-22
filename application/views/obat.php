<div class="panel">
	<div class="panel-heading">
		<div class="col-md-12">
			<div class="col-md-6">
				<h3>Data Obat</h3>
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
				<th>Harga</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php $no = 0; foreach ($tampil_obat as $ob): $no++ ?>
					<tr>
						<td><?=$no?> </td>
						<td><?=$ob->nama_obat?> </td>
						<td><?=$ob->harga?> </td>
						<td>
							<a href="#edit" onclick="edit(<?=$ob->id_obat?>)" class="btn btn-info" data-toggle="modal">Ubah</a>
							<a href="<?=base_url('index.php/obat/hapus/'.$ob->id_obat)?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
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
				<form action="<?=base_url('index.php/obat/tambah_obat')?>" method="POST">
					<table class="table">
						<tr>
							<td>nama obat</td>
							<td><input type="text" name="nama_obat" class="form-control"><br>
							</td>
						</tr>
						<tr>
							<td>harga</td>
							<td><input type="number" name="harga" class="form-control"><br>
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
				<form action="<?=base_url('index.php/obat/ubah')?>" method="POST">
					<table class="table">
						<tr>
							<td>nama obat</td>
							<td>
							<input type="hidden" name="id_obat" id="id_obat">
							<input type="text" id="nama_obat" name="nama_obat" class="form-control"><br>
						<tr>
							<td>harga</td>
							<td>
							<input type="number" id="harga" name="harga" class="form-control"><br>
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
			url:"<?=base_url()?>index.php/obat/detail_obat/"+a,
			dataType:"json",
			success:function(data){
				$("#id_obat").val(data.id_obat);
				$("#nama_obat").val(data.nama_obat);
				$("#harga").val(data.harga);
			}
		});
	}
</script>