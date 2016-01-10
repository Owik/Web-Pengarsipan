<?php
	include "arsip.php";
if($_GET['page'] == 'edit_dokumen'){
    $data = $srtdok->getEditDokumen($_GET['id']);
} else {
    $data = array('nama'=>'', 'tanggal'=>'', 'keterangan'=>'');
}
?>
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                    <strong>Upload Dokumen</strong>
                    </h2>
                    <hr>
		<div class="col-sm-6 col-sm-offset-3">
		
		<!-- Form Upload-->
        <div class="form-horizontal">
			<form method="post" enctype="multipart/form-data" action="aksi_dok.php">
			<div class="form-group">
			<label for="inputnama" class="col-sm-2 control-label">Nama File</label>
			<div class="col-sm-10">
			<input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>" placeholder="Nama"></div>
			</div>
			<div class="form-group">
			<label for="inputtanggal" class="col-sm-2 control-label">Tanggal</label>
			<div class="col-sm-10">
			<input type="text" class="form-control" name="tanggal" value="<?php echo $data['tanggal'] ?>" placeholder="Tanggal"></div>
			</div>
			<div class="form-group">
			<label for="inputketerangan" class="col-sm-2 control-label">Keterangan</label>
			<div class="col-sm-10">
			<input type="text" class="form-control" name="keterangan" value="<?php echo $data['keterangan'] ?>" placeholder="Keterangan"></div>
			</div>
			<div class="form-group">
			<label for="inputfile" class="col-sm-2 control-label">Pilih File</label>
			<div class="col-sm-10">
			<input type="file" name="file"/></div>
			</div>
			
			<?php
			if ($_GET['page'] == 'up_dokumen')
				echo '<input type="hidden" name="action" value="input">';
			else{
				echo '<input type="hidden" name="action" value="edit">';
				echo '<input type="hidden" name="id" value="'.$data['id'].'">';
			}
			?>
			
			<button type="submit" name="?" value="?" class="btn btn-default">Submit</button>
			
		</form>
        </div>
		</div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
