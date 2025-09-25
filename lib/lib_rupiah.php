<?php   

// covert rupiah
   function c_rupiah($angka)
	{
		return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));
	}
	
	function c_number($rupiah)
	{
		return intval(preg_replace('/,.*|[^0-9]/', '', $rupiah));
	}

// baca angka berkoma

	function baca($number)
	{
		$before_comma = trim(to_word($number));
		$after_comma = trim(comma($number));
		return ucwords($results = $before_comma.' koma '.$after_comma);
	}

	function to_word($number)
	{
		$words = "";
		$arr_number = array(
		"",
		"satu",
		"dua",
		"tiga",
		"empat",
		"lima",
		"enam",
		"tujuh",
		"delapan",
		"sembilan",
		"sepuluh",
		"sebelas");

		if($number<12)
		{
			$words = " ".$arr_number[$number];
		}
		else if($number<20)
		{
			$words = to_word($number-10)." belas";
		}
		else if($number<100)
		{
			$words = to_word($number/10)." puluh ".to_word($number%10);
		}
		else if($number<200)
		{
			$words = "seratus ".to_word($number-100);
		}
		else if($number<1000)
		{
			$words = to_word($number/100)." ratus ".to_word($number%100);
		}
		else if($number<2000)
		{
			$words = "seribu ".to_word($number-1000);
		}
		else if($number<1000000)
		{
			$words = to_word($number/1000)." ribu ".to_word($number%1000);
		}
		else if($number<1000000000)
		{
			$words = to_word($number/1000000)." juta ".to_word($number%1000000);
		}
		else
		{
			$words = "undefined";
		}
		return $words;
	}

	function comma($number)
	{
		$after_comma = stristr($number,',');
		$arr_number = array(
		"nol",
		"satu",
		"dua",
		"tiga",
		"empat",
		"lima",
		"enam",
		"tujuh",
		"delapan",
		"sembilan");

		$results = "";
		$length = strlen($after_comma);
		$i = 1;
		while($i<$length)
		{
			$get = substr($after_comma,$i,1);
			$results .= " ".$arr_number[$get];
			$i++;
		}
		return $results;
	}


// Penyebutan Rupiah

	function penyebut($nilai) {

			$nilai = abs($nilai);
			$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
			$temp = "";
			if ($nilai < 12) {
				$temp = " ". $huruf[$nilai];
			} else if ($nilai <20) {
				$temp = penyebut($nilai - 10). " Belas";
			} else if ($nilai < 100) {
				$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
			} else if ($nilai < 200) {
				$temp = " Seratus" . penyebut($nilai - 100);
			} else if ($nilai < 1000) {
				$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
			} else if ($nilai < 2000) {
				$temp = " Seribu" . penyebut($nilai - 1000);
			} else if ($nilai < 1000000) {
				$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
			} else if ($nilai < 1000000000) {
				$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
			} else if ($nilai < 1000000000000) {
				$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
			} else if ($nilai < 1000000000000000) {
				$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
			}     
			return $temp;
		}
	 
		function bilang($nilai) {

			if($nilai<0) {
				$hasil = "Minus ". trim(penyebut($nilai));
			} else {
				$hasil = trim(penyebut($nilai));
			}     		
			return $hasil;
		}

?>