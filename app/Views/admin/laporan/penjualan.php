<?=$this->include('admin/header.php')?>
<style type="text/css">
	@media print{
		.print{
			display: none;
		}
	}
</style>
<div class="container">
	<h2 style=" width: 100%; border-bottom: 4px solid gray; padding-bottom: 5px;"><b>Laporan Penjualan</b></h2>
	<div class="row print">
		<div class="col-md-9">
			<form action="<?= base_url('admin/laporan/penjualan') ?>" method="POST">
				<table>
					<tr>
						<td><input type="date" name="date1" class="form-control" value="<?= $date1; ?>"></td>
						<td>&nbsp; - &nbsp;</td>
						<td><input type="date" name="date2" class="form-control" value="<?= $date2; ?>"></td>
						<td> &nbsp;</td>
						<td><input type="submit" name="submit" class="btn btn-primary" value="Tampilkan"></td>
					</tr>
				</table>
			</form>
			
		</div>
		<div class="col-md-3">
			<form action="<?= base_url('admin/laporan/penjualan/export') ?>" method="POST">
				<table>
					<tr>
						<td><input type="hidden" name="date1" class="form-control" value="<?= $date1; ?>"></td>
						<td><input type="hidden" name="date2" class="form-control" value="<?= $date2; ?>"></td>
						<td><button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save-file"></i> Export to Excel</button></td>
						<td> &nbsp;</td>
						<td><a href="" onclick="window.print()" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Cetak</a></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<br>
	<br>
	<table class="table table-striped">
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>tanggal</th>
			<th>qty</th>
		</tr>
		<?php 
		// dd($result);
		$no=1;
		$total = 0;
		foreach ($result as $row){
			?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $row['nama_produk']; ?></td>
				<td><?= $row['tanggal']; ?></td>
				<td><?= $row['qty']; ?></td>
			</tr>
			<?php 
			$total += $row['qty'];
			$no++;
		

		?>
		<tr>
			<td colspan="4" class="text-right"><b>Total Jumlah terjual = <?= $total; ?></b></td>
		</tr>
<?php 	} ?>
	</table>
</div>

<?=$this->include('admin/footer.php') ?>