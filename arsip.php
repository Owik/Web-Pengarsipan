<?php

include 'koneksi.php';

class arsip extends DBAccess{

	function getEdit($id){
		$stmt = $this->db->prepare('select * from surat where id = ?');
		$stmt->execute(array($id));
		return $stmt->fetch();
	}
	
	function getSurat($where = null){
		if(null == $where)
			$res = $this->db->query('select * from surat');
		else
			$res = $this->db->query('select * from surat where '.$where);

		return $res;
	}
	
	function getDokumen($where = null){
		if(null == $where)
			$res = $this->db->query('select * from dokumen');
		else
			$res = $this->db->query('select * from dokumen where '.$where);

		return $res;
	}
	
	function getEditDokumen($id){
		$stmt = $this->db->prepare('select * from dokumen where id = ?');
		$stmt->execute(array($id));
		return $stmt->fetch();
	}

	function insertSurat($nama, $tanggal, $keterangan, $unduh){
		$stmt = $this->db->prepare('insert into surat values (null, ?, ?, ?, ?)');
		$stmt->execute(array($nama, $tanggal, $keterangan, $unduh));		
	}
	
	function insertDokumen($nama, $tanggal, $keterangan, $unduh){
		$stmt = $this->db->prepare('insert into dokumen values (null, ?, ?, ?, ?)');
		$stmt->execute(array($nama, $tanggal, $keterangan, $unduh));		
	}
	
	function delSurat($id){
		$stmt = $this->db->prepare("delete from surat where id = ?");
		$stmt->execute(array($id));
	}
	
	function delDokumen($id){
		$stmt = $this->db->prepare('delete from dokumen where id = ?');
		$stmt->execute(array($id));
	}
	function updateSurat($id, $nama, $tanggal, $keterangan, $unduh){
        $stmt = $this->db->prepare('update surat set nama=?, tanggal=?, keterangan=?, unduh=?
                            where id=?');
		$stmt->execute(array($nama, $tanggal, $keterangan, $unduh, $id));
    }
	function updateDokumen($id, $nama, $tanggal, $keterangan, $unduh){
        $stmt = $this->db->prepare('update dokumen set nama=?, tanggal=?, keterangan=?, unduh=?
                            where id=?');
		$stmt->execute(array($nama, $tanggal, $keterangan, $unduh, $id));
    }

}

$srtdok = new arsip();