<div class="panel">
	<div class="panel-heading">
		<div class="col-md-12">
			<div class="col-md-6">
				<h3>Data Wilayah</h3>
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
			</thead>
			<tbody>
				<?php $no = 0; foreach ($tampil_wilayah as $wil): $no++ ?>
					<tr>
						<td><?=$no?> </td>
						<td><?=$wil->nama_wilayah?> </td>
						<td>
							<a href="#edit" onclick="edit(<?=$wil->id_wilayah?>)" class="btn btn-info" data-toggle="modal">Ubah</a>
							<a href="<?=base_url('index.php/wilayah/hapus/'.$wil->id_wilayah)?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
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
				<form action="<?=base_url('index.php/wilayah/tambah_wilayah')?>" method="POST">
					<table class="table">
						<tr>
							<td>nama wilayah</td>
							<td><input type="text" name="nama_wilayah" class="form-control"><br>
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
				<form action="<?=base_url('index.php/wilayah/ubah')?>" method="POST">
					<table class="table">
						<tr>
							<td>nama wilayah</td>
							<td>
							<input type="hidden" name="id_wilayah" id="id_wilayah">
							<input type="text" id="nama_wilayah" name="nama_wilayah" class="form-control"><br>
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
			url:"<?=base_url()?>index.php/wilayah/detail_wilayah/"+a,
			dataType:"json",
			success:function(data){
				$("#id_wilayah").val(data.id_wilayah);
				$("#nama_wilayah").val(data.nama_wilayah);
			}
		});
	}
</script>