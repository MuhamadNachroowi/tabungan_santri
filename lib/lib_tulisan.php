<?php

function hk($text){
    $text=strtolower($text);
    return $text;
}
function hb($text){
    $text=strtoupper($text);
    return $text;
}
function hab($text){
    $text=ucfirst($text);
    return $text;
}
function habs($text){
    $text=ucwords($text);
    return $text;

}
function jmlk($text){
    $text=strlen($text);
    return $text;

}

function potong($isi,$panjang){
	$kalimat=strip_tags($isi);
    $isib=explode(" ",$kalimat);
    $hasil=implode(" ",array_splice($isib,0,$panjang)); 
    return $hasil;
}

function clear_all_tags($isi){
  $result = str_replace(array("\r","\n"),"",$isi);
  $result2=preg_replace("/\r|\n/", "", $result);
  $hasil=strip_tags($result2);
  return $hasil;
}

function seo_title($s) {
    $c = array (' ');
    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}

?>