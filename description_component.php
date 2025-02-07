<?php

if($konfigurasi_kam1 != '' || strpos($konfigurasi_kam1,'Ada') !== false){
if(strpos($konfigurasi_kam1,'<br/>') !== false){
$des_rear_mp = ' dengan resolusi '.str_replace(array(',','(','SL3D'),array(' + ',' (','SL 3D'),implode(',',$rear_mp));
}else if(strpos($konfigurasi_kam1,'Ada') !== false){
$des_rear_mp = '';
}else{
$des_rear_mp = ' dengan resolusi '.str_replace('SL3D','SL 3D',$rear_mp[0]);
}
}else{$des_rear_mp = '';}

if($konfigurasi_kam2 != '' || strpos($konfigurasi_kam2,'Ada') !== false){
if(strpos($konfigurasi_kam2,'<br/>') !== false){
$des_front_mp = ' dengan resolusi '.str_replace(array(',','(','<i>CoverKamera:</i>','SL3D'),array(' + ',' (','<i>Cover Kamera:</i> ','SL 3D'),implode(',',$front_mp));
}else if(strpos($konfigurasi_kam2,'Ada') !== false){
$des_front_mp = '';
}else{
$des_front_mp = ' dengan resolusi '.str_replace('SL3D','SL 3D',$front_mp[0]);
}
}else{$des_front_mp = '';}



if($tahunrilis !== ''){
$des_release = ' pada <a href="/search/label/'.rawurlencode('Rilis '.$tahunrilis).'">'.$tahunrilis.'</a>.';
}else{$des_release = '';}

if($this_rom !== '' && $this_chipset !== ''){
$des_prossessor = '<br/><br/><b>'.$titlecontent3.'</b> ditenagai dengan chipset '.$this_chipset.' yang didukung '.$this_ram.' dan '.$this_rom.'. Serta menggunakan'.$this_os.' sebagai sistem operasi (OS) bawaannya.';
}else if($this_rom !== '' && $plat_chipset === ''){
$des_prossessor = '<br/><br/><b>'.$titlecontent3.'</b> didukung internal '.$this_rom.'.';
}else{$des_prossessor = '';}

if($this_type_lcd !== ''){
$des_display = '<br/><br/><b>'.$titlecontent3.'</b> memiliki layar dengan panel '.$this_type_lcd.' berukuran '.$ukuran_layar.', dengan resolusi '.$resolusi_layar.'.';
}else{
$des_display = '<br/><br/><b>'.$titlecontent3.'</b> memiliki layar berukuran '.$ukuran_layar.', dengan resolusi '.$resolusi_layar.'.';
}

if($des_rear_mp !== '' && $fitur_kam1 === '' && $des_front_mp === ''){
$des_camera = '<br/><br/><b>'.$titlecontent3.'</b> terpasang '.$this_count_cam1.' kamera belakang'.str_replace('SL3D','SL 3D',$des_rear_mp).'.';}else if($des_rear_mp !== '' && $fitur_kam1 !== '' && $des_front_mp === ''){
$des_camera = '<br/><br/><b>'.$titlecontent3.'</b> terpasang '.$this_count_cam1.' kamera belakang'.str_replace('SL3D','SL 3D',$des_rear_mp).' dengan fitur '.str_ireplace(', Video:',', serta video dengan resolusi ',$fitur_kam1).'.';}else if($des_rear_mp !== '' && $des_front_mp !== '' && $fitur_kam1 !== '' && $fitur_kam2 === ''){
$des_camera = '<br/><br/><b>'.$titlecontent3.'</b> terpasang '.$this_count_cam1.' kamera belakang'.str_replace('SL3D','SL 3D',$des_rear_mp).' dengan fitur '.str_ireplace(', Video:',', serta video dengan resolusi ',$fitur_kam1).'. Serta terpasang '.$this_count_cam2.' kamera depan'.$des_front_mp.'.';
}else if($des_rear_mp !== '' && $des_front_mp !== '' && $fitur_kam1 !== '' && $fitur_kam2 !== ''){
$des_camera = '<br/><br/><b>'.$titlecontent3.'</b> terpasang '.$this_count_cam1.' kamera belakang'.str_replace('SL3D','SL 3D',$des_rear_mp).' dengan fitur '.str_ireplace(', Video:',', serta video dengan resolusi ',$fitur_kam1).'. Serta terpasang '.$this_count_cam2.' kamera depan'.str_replace('SL3D','SL 3D',$des_front_mp).' dengan fitur '.str_ireplace(', Video:',', serta video dengan resolusi ',$fitur_kam2).'.';
}else{$des_camera = '';}

if($feature_batt_size !== ''){
$des_battery = '<br/><br/><b>'.$titlecontent3.'</b> ditopang baterai '.$this_typbatt.' dengan kapasitas '.$this_batt.'.';
}else{$feature_batt_size = '';}

if($jaringan === ''){
$des_SIM = '<br/><br/><b>'.$titlecontent3.'</b> tidak mendukung koneksi seluler.';
}else{
if($info_sim !== '' && $jaringan  !== ''){
$des_SIM = '<br/><br/><b>'.$titlecontent3.'</b> mendukung '.$this_SIM.' dengan dukungan jaringan '.$jaringan.'.';
}else if($info_sim !== '' && $jaringan  === ''){
$des_SIM = '<br/><br/><b>'.$titlecontent3.'</b> mendukung '.$info_sim.'.';
}else if($info_sim === '' && $jaringan  !== ''){
$des_SIM = '<br/><br/><b>'.$titlecontent3.'</b> didukung jaringan '.$jaringan.'.';
}else{$des_SIM = '';}
}

if($dimensi_body  !== '' && $berat_body  !== ''){
$des_body = '<br/><br/><b>'.$titlecontent3.'</b> memiliki body berdimensi '.$dimensi_body.' dan berat '.$berat_body.',';}elseif($dimensi_body  !== '' && $berat_body  === ''){
$des_body = '<br/><br/><b>'.$titlecontent3.'</b> memiliki body berdimensi '.$dimensi_body.',';}elseif($dimensi_body  === '' && $berat_body  !== ''){
$des_body = '<br/><br/><b>'.$titlecontent3.'</b> memiliki body dengan berat '.$berat_body.',';}else{$des_body = '';}

if($warna  !== ''){
$des_color = ' serta pilihan warna '.$warna.'.';}else{$des_color = '';}

include $_SERVER['DOCUMENT_ROOT'].'/api/indukseluler/simple_des_component.php';

$article_simplespec = '<ul class="list_feature">'.$simple_1.$simple_2.$simple_3.$simple_4.$simple_5.$simple_6.$simple_7.$simple_8.'</ul>';

$description = '<a href="/search/label/'.rawurlencode($brand).'"><b>'.$brand.'</b></a> merilis '.strtolower(str_replace(',','',$this_device)).' <b>'.str_replace($brand.' ','',$titlecontent3).'</b>'.$des_release.$des_prossessor.$des_display.$des_camera.$des_battery.$des_SIM.$des_body.$des_color;

?>
