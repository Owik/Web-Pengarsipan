<?php
include "arsip.php";

if ($_POST['action'] == 'input'){

	$allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
	$file_name		= $_FILES['file']['name'];
	$file_ext		= strtolower(end(explode('.', $file_name)));
				
	$file_tmp		= $_FILES['file']['tmp_name'];
			
				
	if(in_array($file_ext, $allowed_ext) === true){
					
		$lokasi = 'files/'.$_POST['nama'].'.'.$file_ext;
		move_uploaded_file($file_tmp, $lokasi);

   $srtdok->insertDokumen($_POST['nama'], $_POST['tanggal'], $_POST['keterangan'], $lokasi);
   // echo "data berhasil diinputkan";
   
	}
	else{
		?>
		<script>
		alert('Data Tidak Boleh Kosong');
        window.location.href='upload.php?page=up_dokumen';
        </script>
		<?php
	}
	
} elseif($_POST['action'] == 'edit'){
	$allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
	$file_name		= $_FILES['file']['name'];
	$file_ext		= strtolower(end(explode('.', $file_name)));
				
	$file_tmp		= $_FILES['file']['tmp_name'];
			
				
	if(in_array($file_ext, $allowed_ext) === true){
					
		$lokasi = 'files/'.$_POST['nama'].'.'.$file_ext;
		move_uploaded_file($file_tmp, $lokasi);
    $srtdok->updateDokumen($_POST['id'], $_POST['nama'],
                          $_POST['tanggal'], $_POST['keterangan'], $lokasi);
	}
	else{
		echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
	}
} elseif ($_GET['action'] == 'delete'){
    $srtdok->delDokumen($_GET['id']);
	// $res = $srtdok->getSurat();
	// foreach($res as $data){
	// unlink($data['unduh']);
	// }
}

// redirect
header('location:admin.php?page=dokumen');
