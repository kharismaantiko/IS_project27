<?php

if($jenis_layar !== '' && $ukuran_layar !== '' && $resolusi_layar !== ''){
$simple_1 = '<li><span class="icon ka ka-Display"></span><b>Layar:</b> '.$jenis_layar.' <a href="/search/label/'.rawurlencode('Layar '.floor(str_replace(' inci','',$ukuran_layar)).'"').'">'.$ukuran_layar.'</a>; '.$resolusi_layar.'</li>';
}else if($jenis_layar === '' && $ukuran_layar !== '' && $resolusi_layar !== ''){
$simple_1 = '<li><span class="icon ka ka-Display"></span><b>Layar:</b> <a href="/search/label/'.rawurlencode('Layar '.floor(str_replace(' inci','',$ukuran_layar)).'"').'">'.$ukuran_layar.'</a>; '.$resolusi_layar.'</li>';
}else if($jenis_layar === '' && $ukuran_layar === '' && $resolusi_layar !== ''){
$simple_1 = '<li><span class="icon ka ka-Display"></span><b>Layar:</b> '.$resolusi_layar.'</li>';
}else{
$simple_1 = '';
}

if($this_chipset !== ''){
$simple_2 = '<li><span class="icon ka ka-Chipset"></span><b>Chipset:</b> '.$this_chipset.'</li>';
}else{
$simple_2 = '';
}

if($rams !== ''){
$ramexp = explode('/',$rams);
foreach($ramexp as $ram){if($ram === end($ramexp)){$simple_3 = '<li><span class="icon ka ka-RAM"></span><b>RAM:</b> <a href="/search/label/'.rawurlencode('RAM '.$ram).'">'.$ram.'</a></li>';}}
}else{$simple_3 = '';}

if($penyim_internal !== ''){
$romexp = explode('/',$penyim_internal);
foreach($romexp as $rom){if($rom === end($romexp)){$simple_4 = '<li><span class="icon ka ka-ROM"></span><b>Penyimpanan internal:</b> <a href="/search/label/'.rawurlencode('Internal '.$rom).'">'.$rom.'</a></li>';}}
}else{$simple_4 = '';}

if($rear_mp[0] !== ''){
$res_rear = '<a href="/search/label/'.rawurlencode('Kamera Belakang '.str_replace('SL3D','SL 3D',$rear_mp[0])).'">'.str_replace('SL3D','SL 3D',$rear_mp[0]).'</a>';
if(count($rear_mp) > 1){
for ($i = 1; $i < count($rear_mp); $i++) {
$res_other_rear = ' + '.str_replace('SL3D','SL 3D',$rear_mp[$i]);
}
}else{$res_other_rear = '';}
$simple_5 = '<li><span class="icon ka ka-RearCamera"></span><b>Kamera Belakang:</b> '.$res_rear.$res_other_rear.'</li>';
}else{$simple_5 = '';}

if($front_mp[0] !== ''){
$res_front = '<a href="/search/label/'.rawurlencode('Kamera Depan '.str_replace('SL3D','SL 3D',$front_mp[0])).'">'.str_replace('SL3D','SL 3D',$front_mp[0]).'</a>';
if(count($front_mp) > 1){
for ($i = 1; $i < count($front_mp); $i++) {
$res_other_front = ' + '.str_replace('SL3D','SL 3D',$front_mp[$i]);
}
}else{$res_other_front = '';}
$simple_6 = '<li><span class="icon ka ka-FrontCamera"></span><b>Kamera Depan:</b> '.$res_front.$res_other_front.'</li>';
}else{$simple_6 = '';}

if($this_batt !== ''){
$simple_7 = '<li><span class="icon ka ka-Battery"></span><b>Baterai:</b> '.$this_batt.'</li>';
}else{
$simple_7 = '';
}

if($OS_now !== ''){
if(strpos($OS_now,',') !== false){
$osexp = explode(', ',$OS_now);
$simple_8 = '<li><span class="icon ka ka-OS"></span><b>Sistem operasi:</b> '.$osexp[0].'</li>';
}else{
$simple_8 = '<li><span class="icon ka ka-OS"></span><b>Sistem operasi:</b> '.$OS_now.'</li>';
}
}else{$simple_8 = '';}

?>