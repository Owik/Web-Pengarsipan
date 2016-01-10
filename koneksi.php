<?php
	$db = null;
	$config['debug'] = true;
	try{
	$db = new PDO("mysql:host=localhost;dbname=arsip", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
	echo $e->getMessage();
	}
	
	
	/*
	Untuk di-extend oleh semua class yang perlu koneksi database.
	Sudah tersedia attribute $db dan koneksi PDO pada constructor
	*/
	class DBAccess{
	protected $db;
	
	function __construct(){
	try{
	$this->db = new PDO("mysql:host=localhost;dbname=arsip", 'root', '');
	$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
	echo $e->getMessage();
	}
	}
	
	}