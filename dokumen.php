<?php
	// session_start();
	include "arsip.php";
	$res = $srtdok->getDokumen();
	?>


<div class="container">

        <div class="row">
            <div >
                <div class="col-lg-8">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Arsip Dokumen</strong>
                    </h2>
                    <hr>
        <div >
			<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<th>No</th>
					<th>Nama Dokumen</th>
					<th>Tanggal</th>
					<th>Keterangan</th>
					<th>Unduh</th>
				</thead>
				
				<tbody>
					<?php
					$no = 1;
					while($res->fetchColumn() > 0){
						foreach($res as $data){
						
						
					?>
					
					<tr>
					
						<td><?php echo $no ?></td>
						<td><?php echo $data['nama'] ?></td>
						<td><?php echo $data['tanggal'] ?></td>
						<td><?php echo $data['keterangan'] ?></td>
						<td><a href="<?php echo $data['unduh'] ?>"><button type="button" class="btn btn-success btn-xs">Unduh</button></a></td>
						<td>
							<a href="upload.php?page=edit_dokumen&id=<?php echo $data['id'] ?>"
								class="btn btn-warning btn-xs">Edit</a>
							<a href="javascript:removedokumen(<?php echo $data['id'] ?>)"
								class="btn btn-danger btn-xs">Hapus</a>
						</td>
					
					</tr>
						
					<?php $no++;
					} } ?>
					
				</tbody>		
			</div> <!-- tabel -->      
		</div>
				
				</div>
            </div>
        </div>

    </div>
    <!-- /.container -->
