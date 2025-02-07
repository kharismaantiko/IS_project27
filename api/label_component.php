<?php

echo $brand;

if($tahunrilis !== ''){
echo ',Rilis '.$tahunrilis;
}else{echo '';}

if($ukuran_layar !== ''){echo ',Layar '.floor(str_replace(' inci','',$ukuran_layar)).'"';}else{echo '';}

if($rear_mp[0] !== ''){
echo ',Kamera Belakang '.str_replace(array(' ','SL3D'),array('','SL 3D'),$rear_mp[0]);}else{echo '';}

if($front_mp[0] !== ''){echo ',Kamera Depan '.str_replace(array(' ','SL3D'),array('','SL 3D'),$front_mp[0]);}else{echo '';}

if($this_chipset !== ''){echo ','.$this_chipset;}else{echo '';}

if($rams !== ''){echo ',RAM '.str_replace('/',',RAM ',$rams);}else{echo '';}

if($penyim_internal !== ''){echo ',Internal '.str_replace('/',',Internal ',$penyim_internal);}else{echo '';}

if($this_device !== ''){echo ','.$this_device;}else{echo '';}

?>