<?php

$tableumum=$articleinfo->find('table.box-info',0);
foreach($tableumum->find('tr.box-baris') as $tr){
$td1 = preg_replace('/[^A-Za-z0-9\-]/', '',$tr->find('td.kolom-satu',0)->plaintext);
$td2 = trim_char2($tr->find('td.kolom-dua',0)->innertext);
$table_umum[] = array('title' => $td1,'info' => $td2);
}

$tablebody=$articleinfo->find('table.box-info',1);
foreach($tablebody->find('tr.box-baris') as $tr){
$td1 = preg_replace('/[^A-Za-z0-9\-]/', '',$tr->find('td.kolom-satu',0)->plaintext);
$td2 = trim_char2($tr->find('td.kolom-dua',0)->innertext);
$table_body[] = array('title' => $td1,'info' => $td2);
}

$tablelayar=$articleinfo->find('table.box-info',2);
foreach($tablelayar->find('tr.box-baris') as $tr){
$td1 = preg_replace('/[^A-Za-z0-9\-]/', '',$tr->find('td.kolom-satu',0)->plaintext);
$td2 = trim_char2($tr->find('td.kolom-dua',0)->innertext);
$table_layar[] = array('title' => $td1,'info' => $td2);
}

$tablehardware=$articleinfo->find('table.box-info',3);
foreach($tablehardware->find('tr.box-baris') as $tr){
$td1 = preg_replace('/[^A-Za-z0-9\-]/', '',$tr->find('td.kolom-satu',0)->plaintext);
$td2 = trim_char2($tr->find('td.kolom-dua',0)->innertext);
$table_hardware[] = array('title' => $td1,'info' => $td2);
}

$tablememori=$articleinfo->find('table.box-info',4);
foreach($tablememori->find('tr.box-baris') as $tr){
$td1 = preg_replace('/[^A-Za-z0-9\-]/', '',$tr->find('td.kolom-satu',0)->plaintext);
$td2 = trim_char2($tr->find('td.kolom-dua',0)->innertext);
$table_memori[] = array('title' => $td1,'info' => $td2);
}

$tablekamerabelakang=$articleinfo->find('table.box-info',5);
foreach($tablekamerabelakang->find('tr.box-baris') as $tr){
$td1 = preg_replace('/[^A-Za-z0-9\-]/', '',$tr->find('td.kolom-satu',0)->plaintext);
$td2 = rtrim(str_replace(array('<div> ',' </div>'),array('','<br/>'),trim_char2($tr->find('td.kolom-dua',0)->innertext)),'<br/>');
$table_kamerabelakang[] = array('title' => $td1,'info' => $td2);
}

$tablekameradepan=$articleinfo->find('table.box-info',6);
foreach($tablekameradepan->find('tr.box-baris') as $tr){
$td1 = preg_replace('/[^A-Za-z0-9\-]/', '',$tr->find('td.kolom-satu',0)->plaintext);
$td2 = rtrim(str_replace(array('<div> ',' </div>'),array('','<br/>'),trim_char2($tr->find('td.kolom-dua',0)->innertext)),'<br/>');
$table_kameradepan[] = array('title' => $td1,'info' => $td2);
}

$tablekonektivitas=$articleinfo->find('table.box-info',7);
foreach($tablekonektivitas->find('tr.box-baris') as $tr){
$td1 = preg_replace('/[^A-Za-z0-9\-]/', '',$tr->find('td.kolom-satu',0)->plaintext);
$td2 = trim_char2($tr->find('td.kolom-dua',0)->innertext);
$table_konektivitas[] = array('title' => $td1,'info' => $td2);
}

$tablebaterai=$articleinfo->find('table.box-info',8);
foreach($tablebaterai->find('tr.box-baris') as $tr){
$td1 = preg_replace('/[^A-Za-z0-9\-]/', '',$tr->find('td.kolom-satu',0)->plaintext);
$td2 = trim_char2($tr->find('td.kolom-dua',0)->innertext);
$table_baterai[] = array('title' => $td1,'info' => $td2);
}

$tablefitur=$articleinfo->find('table.box-info',9);
foreach($tablefitur->find('tr.box-baris') as $tr){
$td1 = preg_replace('/[^A-Za-z0-9\-]/', '',$tr->find('td.kolom-satu',0)->plaintext);
$td2 = trim_char2($tr->find('td.kolom-dua',0)->innertext);
$table_fitur[] = array('title' => $td1,'info' => $td2);
}

$resulttable=array(
'umum' => $table_umum,
'body' => $table_body,
'layar' => $table_layar,
'hardware' => $table_hardware,
'memori' => $table_memori,
'kamerabelakang' => $table_kamerabelakang,
'kameradepan' => $table_kameradepan,
'konektivitas' => $table_konektivitas,
'baterai' => $table_baterai,
'fitur' => $table_fitur
);

foreach($resulttable as $key => $val){
if($key == 'umum'){
foreach($val as $k => $v){
if($v['title'] == 'TahunRilis'){
if($v['info'] !== '-'){
$tahunrilis=$v['info'];
}else{
$tahunrilis='';
}
}
if($v['title'] == 'Jaringan'){
if($v['info'] !== '-'){
$jaringan=str_replace(',',' /',$v['info']);
}else{
$jaringan='';
}
}
if($v['title'] == 'SIMCard'){
if($v['info'] !== '-'){
$info_sim=str_ireplace(array('Dual SIM','Single SIM','Ada','(Slot Khusus)','(Slot Hybrid)'),array('SIM Ganda','SIM Satu','ada','',''),$v['info']);
}else{
$info_sim='';
}
}
}
}
if($key == 'body'){
foreach($val as $k => $v){
if($v['title'] == 'Dimensi'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$dimensi_body=$v['info'];
}else{
$dimensi_body='';
}
}
if($v['title'] == 'Berat'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$berat_body=$v['info'];
}else{
$berat_body='';
}
}
if($v['title'] == 'Ketahanan'){
if($v['info'] !== '-'){
$ketahanan_body=$v['info'];
}else{
$ketahanan_body='';
}
}
if($v['title'] == 'FiturLainnya'){
if($v['info'] !== '-'){
$fitur_body=$v['info'];
}else{
$fitur_body='';
}
}
}
}
if($key == 'layar'){
foreach($val as $k => $v){
if($v['title'] == 'Jenis'){
if($v['info'] !== '-'){
$jenis_layar=$v['info'];
}else{
$jenis_layar='';
}
}
if($v['title'] == 'Ukuran'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$ukuran_layar=$v['info'];
}else{
$ukuran_layar='';
}
}
if($v['title'] == 'RefreshRate'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$refreshrate_layar=$v['info'];
}else{
$refreshrate_layar='';
}
}
if($v['title'] == 'Resolusi'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$resolusi_layar=str_ireplace(' x ','x',$v['info']);
}else{
$resolusi_layar='';
}
}
if($v['title'] == 'Rasio'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$rasio_layar=$v['info'];
}else{
$rasio_layar='';
}
}
if($v['title'] == 'Kerapatan'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$kerapatan_layar=$v['info'];
}else{
$kerapatan_layar='';
}
}
if($v['title'] == 'Proteksi'){
if($v['info'] !== '-'){
$proteksi_layar=$v['info'];
}else{
$proteksi_layar='';
}
}
if($v['title'] == 'FiturLainnya'){
if($v['info'] !== '-'){
$fitur_layar=str_replace(array('TIngkat','khas'),array('Tingkat','maks'),$v['info']);
}else{
$fitur_layar='';
}
}
}
}
if($key == 'hardware'){
foreach($val as $k => $v){
if($v['title'] == 'Chipset'){
if($v['info'] !== '-'){
$chipset=$v['info'];
}else{
$chipset='';
}
}
if($v['title'] == 'CPU'){
if($v['info'] !== '-'){
$cpu=htmlentities($v['info'],ENT_NOQUOTES);
}else{
$cpu='';
}
}
if($v['title'] == 'GPU'){
if($v['info'] !== '-'){
$gpu=$v['info'];
}else{
$gpu='';
}
}
}
}
if($key == 'memori'){
foreach($val as $k => $v){
if($v['title'] == 'RAM'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$rams=str_replace(array(' GB',','),array('GB',' /'),$v['info']);
}else{
$rams='';
}
}
if($v['title'] == 'MemoriInternal'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$penyim_internal=str_replace(array(' GB',','),array('GB',' /'),$v['info']);
}else{
$penyim_internal='';
}
}
if($v['title'] == 'MemoriEksternal'){
if($v['info'] !== '-'){
$slot_eksternal=str_ireplace(array('Slot Khusus','Slot Hybrid'),array('slot khusus','slot bergantian dengan SIM'),$v['info']);
}else{
$slot_eksternal='';
}
}
}
}
if($key == 'kamerabelakang'){
foreach($val as $k => $v){
if($v['title'] == 'JumlahKamera'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$jumlah_kam1=$v['info'];
}else{
$jumlah_kam1='';
}
}
if($v['title'] == 'Konfigurasi'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$konfigurasi_kam1=$v['info'];
}else{
$konfigurasi_kam1='';
}
}
if($v['title'] == 'Fitur'){
if($v['info'] !== '-'){
$fitur_kam1=$v['info'];
}else{
$fitur_kam1='';
}
}
}
}
if($key == 'kameradepan'){
foreach($val as $k => $v){
if($v['title'] == 'JumlahKamera'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$jumlah_kam2=$v['info'];
}else{
$jumlah_kam2='';
}
}
if($v['title'] == 'Konfigurasi'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$konfigurasi_kam2=$v['info'];
}else{
$konfigurasi_kam2='';
}
}
if($v['title'] == 'Fitur'){
if($v['info'] !== '-'){
$fitur_kam2=$v['info'];
}else{
$fitur_kam2='';
}
}
}
}
if($key == 'konektivitas'){
foreach($val as $k => $v){
if($v['title'] == 'WLan'){
if($v['info'] !== '-'){
$wlan=$v['info'];
}else{
$wlan='';
}
}
if($v['title'] == 'Bluetooth'){
if($v['info'] !== '-'){
$bluetooth=$v['info'];
}else{
$bluetooth='';
}
}
if($v['title'] == 'Infrared'){
if($v['info'] !== '-'){
$infrared=$v['info'];
}else{
$infrared='';
}
}
if($v['title'] == 'NFC'){
if($v['info'] !== '-'){
$nfc=$v['info'];
}else{
$nfc='';
}
}
if($v['title'] == 'GPS'){
if($v['info'] !== '-'){
$gps=$v['info'];
}else{
$gps='';
}
}
if($v['title'] == 'USB'){
if($v['info'] !== '-'){
$usb=$v['info'];
}else{
$usb='';
}
}
}
}
if($key == 'baterai'){
foreach($val as $k => $v){
if($v['title'] == 'Jenis'){
if($v['info'] !== '-'){
$jenis_batt=$v['info'];
}else{
$jenis_batt='';
}
}
if($v['title'] == 'Kapasitas'){
if($v['info'] !== '-' && preg_match('~[1-9]+~',$v['info'])){
$kap_batt=str_replace(' mAh','mAh',$v['info']);
}else{
$kap_batt='';
}
}
if($v['title'] == 'Fitur'){
if($v['info'] !== '-'){
$fitur_batt=$v['info'];
}else{
$fitur_batt='';
}
}
}
}
if($key == 'fitur'){
foreach($val as $k => $v){
if($v['title'] == 'OSSaatRilis'){
if($v['info'] !== '-'){
$OS_now=$v['info'];
}else{
$OS_now='';
}
}
if($v['title'] == 'Sensor'){
if($v['info'] !== '-'){
$sensor=str_ireplace(array('Fingerprint','dual gyro','gyro','dual proximitas','proximitas','accelerometer','Face ID'),array('Sidik jari','giroskop ganda','giroskop','proximity ganda','proximity','akselerometer','ID Wajah'),$v['info']);
}else{
$sensor='';
}
}
if($v['title'] == 'Jack35mm'){
if($v['info'] !== '-'){
$jack35mm=$v['info'];
}else{
$jack35mm='';
}
}
if($v['title'] == 'Warna'){
if($v['info'] !== '-'){
$warna=$v['info'];
}else{
$warna='';
}
}
if($v['title'] == 'FiturLainnya'){
if($v['info'] !== '-'){
$fiturlainnya=$v['info'];
}else{
$fiturlainnya='';
}
}
}
}
}




$this_status = 'Rilis '.$tahunrilis;

if($tahunrilis !== ''){
$this_date = ' '.$tahunrilis;
}else{$this_date = '';}

$cam1exp1 = explode('<br/> ',$konfigurasi_kam1);
foreach($cam1exp1 as $multicam1){
$cam1exp2 = explode('MP',$multicam1);
$arraycam1 = $cam1exp2[0].'MP';
$rear_mp[] = $arraycam1;
}
$numbforcam1 = '1';
foreach($cam1exp1 as $multicam1_2){
if(strpos($multicam1_2,'MP') !== false || strpos($multicam1_2,'SL 3D') !== false){
if(preg_match('~[1-9]+~',$multicam1_2)){$result_multicam1_2=str_replace(' ()','',$multicam1_2);}else{$result_multicam1_2=str_replace('MP ','',$multicam1_2);}
$arraycam1_2 = '<tr><td class="spec_title">Kamera '.str_replace('1','Utama',$numbforcam1).'</td><td class="spec_data">'.$result_multicam1_2.'</td></tr>';
}else{
$arraycam1_2 = '';
}
$rear_mp_type2[] = $arraycam1_2;
$numbforcam1++;
}
$this_count_cam1 = count($cam1exp1);
if($konfigurasi_kam1 != ''){
if(strpos($konfigurasi_kam1,'<br/>') !== false){
$this_rear_mp = str_replace(array(',','('),array(' + ',' ('),implode(',',$rear_mp));
}else{
$this_rear_mp = $rear_mp[0];
}
}else{$this_rear_mp = '';}

$cam2exp1 = explode('<br/> ',$konfigurasi_kam2);
foreach($cam2exp1 as $multicam2){
$cam2exp2 = explode('MP',$multicam2);
$arraycam2 = str_replace(array(' ','<i>CoverKamera:</i>'),array('','<i>Cover Kamera:</i> '),$cam2exp2[0]).'MP';
$front_mp[] = $arraycam2;
}
$numbforcam2 = '1';
foreach($cam2exp1 as $multicam2_2){
if(strpos($multicam2_2,'MP') !== false || strpos($multicam2_2,'SL 3D') !== false){
if(preg_match('~[1-9]+~',$multicam2_2)){$result_multicam2_2=str_replace(' ()','',$multicam2_2);}else{$result_multicam2_2=str_replace('MP ','',$multicam2_2);}
if(strpos($result_multicam2_2,'Cover Kamera') !== false){
$arraycam2_2 = '<tr><td class="spec_title"><i>Cover Kamera:</i></td><td class="spec_data">'.str_replace('<i>Cover Kamera:</i> ','',$result_multicam2_2).'</td></tr>';
}else{
$arraycam2_2 = '<tr><td class="spec_title">Kamera '.str_replace('1','Utama',$numbforcam2).'</td><td class="spec_data">'.$result_multicam2_2.'</td></tr>';
}
}else{
$arraycam2_2 = '';
}
$front_mp_type2[] = $arraycam2_2;
$numbforcam2++;
}
$this_count_cam2 = count($cam2exp1);
if($konfigurasi_kam2 != ''){
if(strpos($konfigurasi_kam2,'<br/>') !== false){
$this_front_mp = str_replace(array(',','(','<i>CoverKamera:</i>'),array(' + ',' (','<i>Cover Kamera:</i> '),implode(',',$front_mp));
}else{
$this_front_mp = $front_mp[0];
}
}else{$this_front_mp = '';}

$this_type_lcd = $jenis_layar;

if($ukuran_layar <= 4){$this_device='Mobilephone,';}else if($ukuran_layar <= 5 && $OS_now !== ''){$this_device='Smartphone,';}else if($ukuran_layar > 5 && $ukuran_layar < 7 && $OS_now !== ''){$this_device='Phablet,';}else if($ukuran_layar >= 7 && $OS_now !== ''){$this_device='Tablet,';}

if($ukuran_layar !== ''){$this_display_size = $ukuran_layar;}else{$this_display_size = '';}

if($resolusi_layar !== ''){$this_display_res = $resolusi_layar;}else{$this_display_res = '';}

if($chipset !== ''){$this_chipset = $chipset;}else{$this_chipset = '';}

if($OS_now !== ''){
if(strpos($OS_now,',') !== false){
$osexp = explode(', ',$OS_now);
$this_os = ' '.$osexp[0].' ('.str_replace('up to','hingga',$osexp[1]).')';
}else{
$this_os = ' '.$OS_now;
}
}else{$this_os = '';}

if($rams !== ''){if(strpos($rams,'/') !== false){$this_ram = 'varian RAM '.$rams;}else{$this_ram = 'RAM '.$rams;}}else{$this_ram = '';}

if($penyim_internal !== ''){if(strpos($penyim_internal,'/') !== false){$this_rom = 'varian penyimpanan internal '.$internal.', slot eksternal '.str_ireplace(array('Ada ','(Slot Khusus)','(Slot Hybrid)'),array('','dengan slot khusus','dengan slot bergantian'),$slot_eksternal);}else{$this_rom = 'penyimpanan internal '.$penyim_internal.', slot eksternal '.str_ireplace(array('Ada ','(Slot Khusus)','(Slot Hybrid)'),array('','dengan slot khusus','dengan slot bergantian'),$slot_eksternal);}}else{$this_rom = '';}

if($jenis_batt !== ''){$this_typbatt = $jenis_batt;}else{$this_typbatt = '';}

if($kap_batt !== ''){$this_batt = $kap_batt;}else{$this_batt = '';}

if($jaringan !== ''){$netexp = explode('/',$jaringan); foreach($netexp as $maxnet){if($maxnet === end($netexp)){$this_network = str_replace(' ','',$maxnet);}else{$this_network = '';}}}else{$this_network = '';}

if($this_network == '2G'){$icon_network = '<span class="pk pk-band2g"></span>';}else if($this_network == '3G'){$icon_network = '<span class="pk pk-band3g"></span>';}else if($this_network == '4G'){$icon_network = '<span class="pk pk-band4g"></span>';}else if($this_network == '5G'){$icon_network = '<span class="pk pk-band5g"></span>';}else{$icon_network = '<span class="pk pk-signal"></span>';}

if($info_sim != ''){$this_SIM = $info_sim;}else{$this_SIM = '';}

?>
