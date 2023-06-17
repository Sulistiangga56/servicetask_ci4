<?php 
include 'header.php';

// generate kode material
$db = \Config\Database::connect();
$kode = $db->query("SELECT kode_bk FROM inventory ORDER BY kode_bk DESC LIMIT 1");
$data = $kode->getRowArray();

if ($data) {
    $num = (int) substr($data['kode_bk'], 1, 3);
    $add = $num + 1;
    $format = "M" . str_pad($add, 3, '0', STR_PAD_LEFT);
} else {
    $format = "M001";
}
?>



<div class="container">
	<h2 style=" width: 100%; border-bottom: 4px solid gray"><b>Edit Inventory</b></h2>

	<form action="<?= base_url('/admin/inventory/'. $result['kode_bk']. '/edit') ?>" method="POST">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Kode Material</label>
					<input type="text" class="form-control" id="exampleInputEmail1" disabled value="<?= $result['kode_bk']; ?>">
					<input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Contoh : Kg atau gram" name="kode_bk" value="<?= $result['kode_bk']; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Material</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Material" name="nama" value="<?= $result['nama']; ?>">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Stok</label>
					<input type="number" class="form-control" id="exampleInputEmail1"  name="qty" value="<?= $result['qty']; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Satuan</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Contoh : set" name="satuan" value="<?= $result['satuan']; ?>">
					<p class="help-block">Hanya Masukkan Satuan saja : set atau buah</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Harga</label>
					<input type="number" class="form-control" id="exampleInputEmail1"  name="harga" placeholder="Contoh : 1000" value="<?= $result['harga']; ?>">
					<p class="help-block">Harga termasuk harga per set atau per 	buah</p>
				</div>
			</div>
		</div>
		<button type="submit"  class="btn btn-warning" ><i class="glyphicon glyphicon-edit"></i> Edit</button>
		<a href="inventory.php" class="btn btn-danger">Cancel</a>
	</form>
</div>

<br>

</div>
</form>

</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php 
include 'footer.php';
?>