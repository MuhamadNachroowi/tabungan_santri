<?php
	date_default_timezone_set('Asia/Jakarta');

	function tgl_indonesia($tanggal){
		$tgl=date('d',strtotime($tanggal)); 
		$bln=date('m',strtotime($tanggal));
		$thn=date('Y',strtotime($tanggal));  
		$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
	                    "Juni", "Juli", "Agustus", "September", 
	                    "Oktober", "November", "Desember");
		$bln_indo=$nama_bln[$bln-0];
		$hasil=$tgl." ".$bln_indo." ".$thn;
		return $hasil;

    }
	function tgl_id($tgl){
		$hasil=date('d-m-Y',strtotime($tgl));
	    return $hasil;		 
	}
	function tgl_en($tgl){
	    $hasil=date('Y-m-d',strtotime($tgl));
	    return $hasil;
	}
	function tgl_indo($tgl){
		$hasil=date('d F Y',strtotime($tgl));
	    return $hasil;		 
	}
	function tgl_eng($tgl){
		$hasil=date('Y F d',strtotime($tgl));
	    return $hasil;		 
	}

	function datetime_indo($tgl){
		$hasil=date('d F Y H:i:s',strtotime($tgl));
	    return $hasil;		 
	}
	function datetime_eng($tgl){
		$hasil=date('Y F d H:i:s',strtotime($tgl));
	    return $hasil;		 
	}
	function nm_hari($tanggal){
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
		$hari = date("w",strtotime($tanggal));
		$hasil = $seminggu[$hari-0];
		return $hasil;

    }


?>
