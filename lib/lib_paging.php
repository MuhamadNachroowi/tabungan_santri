<?php

class Paging{
// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas){
	if(empty($_GET['page'])){
	$posisi=0;
	$_GET['page']=1;
	}
	else{
	$posisi = ($_GET['page']-1) * $batas;
	}
	return $posisi;
	}

	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas){
	$jmlhalaman = ceil($jmldata/$batas);
	return $jmlhalaman;
	}

	// Fungsi untuk link halaman 1,2,3
	function navHalaman($halaman_aktif, $jmlhalaman){
	$link_halaman = "";

	// Link ke halaman pertama (first) dan sebelumnya (prev)
	if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li class='page-item'><a href=index.php?p=welcome&page=1 class='page-link'>First</a></li>
	                  <li class='page-item'><a href=index.php?p=welcome&page=$prev class='page-link'>&laquo;</a></li>";
	}
	else{
	$link_halaman .= "<li class='page-item disabled'><a class='page-link' href='#'>First</a></li>
	                <li class='page-item disabled'><a class='page-link' href='#'>&laquo;</a></li>";
	}

	// Link halaman 1,2,3, …
	$angka = ($halaman_aktif > 3 ? "<li class='page-item'><span class='page-link'>...</span></li>" : " ");
	for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
	if ($i < 1)
	continue;
	$angka .= "<li class='page-item'><a class='page-link' href=index.php?p=welcome&page=$i>$i</a></li>  ";
	}
	$angka .= " <li class='page-item active'><span class='page-link'><b>$halaman_aktif</b></span></li>";

	for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
	if($i > $jmlhalaman)
	break;
	$angka .= "<li class='page-item'><a class='page-link' href=index.php?p=welcome&page=$i>$i</a></li>  ";
	}
	$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='page-item'><span class='page-link'>...</span></li><li class='page-item'><a class='page-link' href=index.php?p=welcome&page=$jmlhalaman>$jmlhalaman</a></li> " : " ");

	$link_halaman .= "$angka";

	// Link ke halaman berikutnya (Next) dan terakhir (Last)
	if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li class='page-item'><a href=index.php?p=welcome&page=$next class='page-link'>&raquo;</a></li>
	<li class='page-item'><a class='page-link' href=index.php?p=welcome&page=$jmlhalaman>Last</a></li> ";
	}
	else{
	$link_halaman .= " <li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li> <li class='page-item disabled'><a href='#' class='page-link'> Last</a></li>";
	}
	return $link_halaman;
	}
}

?>
