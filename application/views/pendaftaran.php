<div class="panel">
	<div class="panel-heading">
		<div class="col-md-12">
				<h3>Pendaftaran Pasien</h3>
					<a href="#modalTambah" data-toggle="modal" class="btn btn-success">Pendaftaran</a>
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
								  <option value=""></option>
								  <option value="LAKI-LAKI">LAKI-LAKI</option>
								  <option value="PEREMPUAN">PEREMPUAN</option>
							</select><br>
						</tr>
						<tr>
							<td>telepon</td>
							<td><input type="number" name="telepon" class="form-control"><br>
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
				<form action="<?=base_url('index.php/pasien/ubah')?>" method="POST">
					<table class="table">
						<tr>
							<td>nama pasien</td>
							<td>
							<input type="hidden" name="id_pasien" id="id_pasien">
							<input type="text" id="nama_pasien" name="nama_pasien" class="form-control" readonly><br>
						<tr>
							<td>alamat</td>
							<td>
							<input type="text" id="alamat" name="alamat" class="form-control" readonly><br>
							</td>
						</tr>
						<tr>
							<td>telepon</td>
							<td>
							<input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" readonly><br>
							</td>
						</tr>
						<tr>
							<td>telepon</td>
							<td>
							<input type="number" id="telepon" name="telepon" class="form-control" readonly><br>
							<!-- <input type="submit" name="simpan" value="simpan" class="btn btn-success"> -->
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
			}
		});
	}
</script>