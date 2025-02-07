<?php

if(_checkFileExists($detail)){
$htmlCS2 = new simple_html_dom();
$htmlCS2->load_file($detail);
$body = $htmlCS2->find('.oxygen-body',0);
$mainreview = $body->find('main',0);
$articleinfo = $mainreview->find('article',0);
$titlecontent3 = str_replace('Luna','Evercoss Luna',$articleinfo->find('.ct-headline span',0)->plaintext);
$slugpost = preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(array('+',' '),array(' plus','-'),strtolower($titlecontent3)));

$phonepicture = $articleinfo->find('.ct-image',0)->getAttribute('data-src',0);

$adsense = '<div class="div_ad_inpost"></div>';

include $_SERVER['DOCUMENT_ROOT'].'/api/indukseluler/table_component.php';

include $_SERVER['DOCUMENT_ROOT'].'/api/indukseluler/description_component.php';

if($blogger1entry != null){
foreach ($blogger1entry as $entry) {
if($entry['title']['$t'] == $titlecontent3) {
$check_1blogger = '<span title="'.$entry['title']['$t'].'" style="display:block;position:absolute;top:0;right:0;width:30px;height:30px;background-image: url(https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://indukseluler.blogspot.com&size=96);background-repeat: no-repeat; background-position:center center;background-size:90% 90%;background-color:transparent"></span>';
$media1thumbnail = str_replace('/s72-c','/s1600',$entry['media$thumbnail']['url']);
$linkpost = $entry['link'][2]['href'];
}
}
}else{$check_1blogger='';}

$metades = strip_tags_content(str_replace('</li>','; ',$article_simplespec));
?>
<span style="float:right;margin-right:10px"><?php echo $this_year; ?></span>
<table style="max-width:100%;background:transparent;line-height:1.5em;overflow:hidden;font-weight:300;font-size:100%;margin:0 auto 30px;padding:10px" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<th style="background:#f00;color:#fff;padding:12px 10px;text-align:center;vertical-align:top;font-size:110%;font-weight:500"><h4 style="padding:0;margin:0"><a href="indukseluler.php" class="image-mini-icon icon-closemenu"></a> <?php echo $check_1blogger.$check_2blogger.$titlecontent3;
if($linkpost !== null){ echo '<button style="display:block;position:absolute;top:35px;right:0;font-size:100%;font-weight:normal" data-toggle="modal" data-target="#fbpost">Post to FB</button>'; } ?></h4></th>
</tr>
<tr>
<td style="padding:12px 10px;text-align:left;vertical-align:top;font-size:100%;border:1px solid rgba(0,0,0,0.6)"><div class="con_area_int"><textarea id="post_title" class="no_height" readonly>
<?php echo $titlecontent3; ?>
</textarea><button class="btn_copy icon-copy" type="button" data-clipboard-target="#post_title"></button></div>
</td>
</tr>
<tr>
<td style="padding:12px 10px;text-align:left;vertical-align:top;font-size:100%;border:1px solid rgba(0,0,0,0.6)"><div class="con_area_int"><textarea id="post_label" class="no_height" readonly>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/api/indukseluler/label_component.php';
?>
</textarea><button class="btn_copy icon-copy" type="button" data-clipboard-target="#post_label"></button></div>
</td>
</tr>
<tr>
<td style="padding:12px 10px;text-align:left;vertical-align:top;font-size:100%;border:1px solid rgba(0,0,0,0.6)"><div class="con_area_int"><textarea id="post_slug" class="no_height" readonly>
<?php echo $slugpost; ?>
</textarea><button class="btn_copy icon-copy" type="button" data-clipboard-target="#post_slug"></button></div>
</td>
</tr>
<tr>
<td style="padding:12px 10px;text-align:left;vertical-align:top;font-size:100%;border:1px solid rgba(0,0,0,0.6)"><div class="con_area_int"><textarea id="post_desc" class="no_height" readonly>
<?php echo strlen($metades) > 147 ? substr($metades,0,147).'...' : $metades; ?>
</textarea><button class="btn_copy icon-copy" type="button" data-clipboard-target="#post_desc"></button></div>
</td>
</tr>
<tr>
<td style="padding:12px 10px;text-align:left;vertical-align:top;font-size:100%;border:1px solid rgba(0,0,0,0.6)"><div class="con_area_int"><textarea class="no_height" readonly><?php echo $phonepicture; ?></textarea><button class="btn_copy icon-down" type="button" onclick="window.open('/download.php?data=<?php echo base64_encode($phonepicture); ?>', '_blank');return false;"></button></div> </td>
</tr>
<tr>
<td style="padding:12px 10px;text-align:left;vertical-align:top;font-size:100%;border:1px solid rgba(0,0,0,0.6)"><div class="con_area_int"><textarea id="post_body" class="full_height" readonly>
<?php
if($media1thumbnail === null){
echo '
';
}else{
echo '<div class="separator" style="clear: both;"><a href="'.$media1thumbnail.'" style="display: block; padding: 1em 0; text-align: center; "><img alt="" border="0" data-original-height="212" data-original-width="160" src="'.$media1thumbnail.'"/></a></div>';
}
?>
<div id="dataPhone">
<table class="table_feature">
<tr>
<td class="bigpict_container">
<div class="bigpict"></div>
<div class="clear"></div>
</td>
<td class="simple_feature">
<?php echo $article_simplespec; ?>
</td>
</tr>
</table>
<div class="description">
<?php echo $description; ?>
</div>
<div id="phone_table">
<?php
echo $adsense;

echo '<table class="table_spec"><tbody><tr><th colspan="100%">Jaringan dan SIM</th></tr>';
if($jaringan !== ''){echo '<tr><td class="spec_title">Teknologi</td><td class="spec_data">'.$jaringan.'</td></tr>';}else{echo '';}
if($info_sim !== ''){echo '<tr><td class="spec_title">SIM</td><td class="spec_data">'.$info_sim.'</td></tr>';}else{echo '';}
echo '</tbody></table>';

echo '<table class="table_spec"><tbody><tr><th colspan="100%">Fisik</th></tr>';
if($dimensi_body !== ''){echo '<tr><td class="spec_title">Dimensi</td><td class="spec_data">'.$dimensi_body.'</td></tr>';}else{echo '';}
if($berat_body !== ''){echo '<tr><td class="spec_title">Berat</td><td class="spec_data">'.$berat_body.'</td></tr>';}else{echo '';}
if($warna !== ''){echo '<tr><td class="spec_title">Warna</td><td class="spec_data">'.$warna.'</td></tr>';}else{echo '';}
echo '</tbody></table>';

echo '<table class="table_spec"><tbody><tr><th colspan="100%">Layar</th></tr>';
if($jenis_layar !== ''){echo '<tr><td class="spec_title">Jenis</td><td class="spec_data">'.$jenis_layar.'</td></tr>';}else{echo '';}
if($ukuran_layar !== ''){echo '<tr><td class="spec_title">Ukuran</td><td class="spec_data">'.$ukuran_layar.'</td></tr>';}else{echo '';}
if($refreshrate_layar !== ''){echo '<tr><td class="spec_title">Refresh Rate</td><td class="spec_data">'.$refreshrate_layar.'</td></tr>';}else{echo '';}
if($resolusi_layar !== ''){echo '<tr><td class="spec_title">Resolusi</td><td class="spec_data">'.$resolusi_layar.'</td></tr>';}else{echo '';}
if($rasio_layar !== ''){echo '<tr><td class="spec_title">Rasio</td><td class="spec_data">'.$rasio_layar.'</td></tr>';}else{echo '';}
if($kerapatan_layar !== ''){echo '<tr><td class="spec_title">Kerapatan</td><td class="spec_data">'.$kerapatan_layar.'</td></tr>';}else{echo '';}
if($proteksi_layar !== ''){echo '<tr><td class="spec_title">Pelindung</td><td class="spec_data">'.$proteksi_layar.'</td></tr>';}else{echo '';}
if($fitur_layar !== ''){echo '<tr><td class="spec_title">Fitur</td><td class="spec_data">'.$fitur_layar.'</td></tr>';}else{echo '';}
echo '</tbody></table>';

echo '<table class="table_spec"><tbody><tr><th colspan="100%">Dapur Pacu</th></tr>';
if($OS_now !== ''){echo '<tr><td class="spec_title">Sistem Operasi</td><td class="spec_data">'.$OS_now.'</td></tr>';}else{echo '';}
if($chipset !== ''){echo '<tr><td class="spec_title">Chipset</td><td class="spec_data">'.$chipset.'</td></tr>';}else{echo '';}
if($cpu !== ''){echo '<tr><td class="spec_title">CPU</td><td class="spec_data">'.htmlentities(str_ireplace(array('-core','single','dual','triple','quad','penta','hexa','hepta','octa','nona','deca'),array(' Core','1','2','3','4','5','6','7','8','9','10'),$cpu)).'</td></tr>';}else{echo '';}
if($gpu !== ''){echo '<tr><td class="spec_title">GPU</td><td class="spec_data">'.$gpu.'</td></tr>';}else{echo '';}
echo '</tbody></table>';

echo '<table class="table_spec"><tbody><tr><th colspan="100%">RAM dan Penyimpanan</th></tr>';
if($rams !== ''){echo '<tr><td class="spec_title">Varian RAM</td><td class="spec_data">'.$rams.'</td></tr>';}else{echo '';}
if($penyim_internal !== ''){echo '<tr><td class="spec_title">Varian Internal</td><td class="spec_data">'.$penyim_internal.'</td></tr>';}else{echo '';}
if($slot_eksternal !== ''){echo '<tr><td class="spec_title">Slot Eksternal</td><td class="spec_data">'.$slot_eksternal.'</td></tr>';}else{echo '';}
echo '</tbody></table>';

echo '<table class="table_spec"><tbody><tr><th colspan="100%">Kamera Belakang</th></tr>';
if($this_count_cam1 !== ''){echo '<tr><td class="spec_title">Jumlah Kamera</td><td class="spec_data">'.$this_count_cam1.' kamera ('.str_replace(array('1','2','3','4','5','6'),array('Single','Dual','Triple','Quad','Penta','Hexa'),$this_count_cam1).')</td></tr>';}else{echo '';}
if($this_rear_mp !== ''){
echo '<tr><td class="spec_title">Resolusi</td><td class="spec_data">'.$this_rear_mp.'</td></tr>';}else{echo '';}
if($rear_mp_type2[0] !== ''){
foreach ($rear_mp_type2 as $lens1) {echo $lens1;}
}else{echo '';}
if($fitur_kam1 !== ''){echo '<tr><td class="spec_title">Fitur</td><td class="spec_data">'.$fitur_kam1.'</td></tr>';}else{echo '';}
echo '</tbody></table>';

echo '<table class="table_spec"><tbody><tr><th colspan="100%">Kamera Depan</th></tr>';
if($this_count_cam2 !== ''){echo '<tr><td class="spec_title">Jumlah Kamera</td><td class="spec_data">'.$this_count_cam2.' kamera ('.str_replace(array('1','2','3','4','5','6'),array('Single','Dual','Triple','Quad','Penta','Hexa'),$this_count_cam2).')</td></tr>';}else{echo '';}
if($this_front_mp !== ''){
echo '<tr><td class="spec_title">Resolusi</td><td class="spec_data">'.$this_front_mp.'</td></tr>';}else{echo '';}
if($front_mp_type2[0] !== ''){
foreach ($front_mp_type2 as $lens2) {echo $lens2;}
}else{echo '';}
if($fitur_kam2 !== ''){echo '<tr><td class="spec_title">Fitur</td><td class="spec_data">'.$fitur_kam2.'</td></tr>';}else{echo '';}
echo '</tbody></table>';

echo '<table class="table_spec"><tbody><tr><th colspan="100%">Sensor dan Konektivitas</th></tr>';
if($sensor !== ''){echo '<tr><td class="spec_title">Sensor</td><td class="spec_data">'.$sensor.'</td></tr>';}else{echo '';}
if($wlan !== ''){echo '<tr><td class="spec_title">WLAN</td><td class="spec_data">'.$wlan.'</td></tr>';}else{echo '';}
if($bluetooth !== ''){echo '<tr><td class="spec_title">Bluetooth</td><td class="spec_data">'.$bluetooth.'</td></tr>';}else{echo '';}
if($gps !== ''){echo '<tr><td class="spec_title">Lokasi</td><td class="spec_data">'.$gps.'</td></tr>';}else{echo '';}
if($nfc !== ''){echo '<tr><td class="spec_title">NFC</td><td class="spec_data">'.$nfc.'</td></tr>';}else{echo '';}
if($infrared !== ''){echo '<tr><td class="spec_title">Infrared</td><td class="spec_data">'.$infrared.'</td></tr>';}else{echo '';}
if($usb !== ''){echo '<tr><td class="spec_title">USB</td><td class="spec_data">'.$usb.'</td></tr>';}else{echo '';}
echo '</tbody></table>';

echo '<table class="table_spec"><tbody><tr><th colspan="100%">Baterai</th></tr>';
if($jenis_batt !== ''){echo '<tr><td class="spec_title">Jenis</td><td class="spec_data">'.$jenis_batt.'</td></tr>';}else{echo '';}
if($kap_batt !== ''){echo '<tr><td class="spec_title">Kapasitas</td><td class="spec_data">'.$kap_batt.'</td></tr>';}else{echo '';}
if($fitur_batt !== ''){echo '<tr><td class="spec_title">Fitur</td><td class="spec_data">'.$fitur_batt.'</td></tr>';}else{echo '';}
echo '</tbody></table>';

echo '<table class="table_spec"><tbody><tr><th colspan="100%">Fitur Tambahan</th></tr>';
if($jack35mm !== ''){echo '<tr><td class="spec_title">Jack 35mm</td><td class="spec_data">'.$jack35mm.'</td></tr>';}else{echo '';}
if($fiturlainnya !== ''){echo '<tr><td class="spec_title">Lainnya</td><td class="spec_data">'.$fiturlainnya.'</td></tr>';}else{echo '';}
echo '</tbody></table>';

?>
</div>
</div>
</textarea><button class="btn_copy icon-copy" type="button" data-clipboard-target="#post_body"></button></div>
</td>
</tr>
</tbody>
</table>
<div id="fbpost" class="modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<div class="modal-title text-center">FB Post</div>
</div>
<div class="modal-body">
<table style="max-width:100%;background:transparent;line-height:1.5em;overflow:hidden;font-weight:300;font-size:100%;margin:0 auto 30px;padding:10px" cellpadding="0" cellspacing="0">
<tr>
<td style="padding:12px 10px;text-align:left;vertical-align:top;font-size:100%;border:1px solid rgba(0,0,0,0.6)"><div class="con_area_int"><textarea id="fb_post" style="width:100%;height:50vh" readonly>
<?php
if($linkpost !== null){
$fixdescription = explode('<br/><br/>',$description);
foreach($fixdescription as $posttext){
if($posttext === reset($fixdescription)){
echo '';
}else{
echo strip_tags_content($posttext).'

';
}
}
echo '
Selengkapnya : '.$linkpost.'
';
}
?>
</textarea><button class="btn_copy icon-copy" type="button" data-clipboard-target="#fb_post"></button></div>
</td>
</tr>
</table>
</div>
</div>
</div>
</div>
<?php
$htmlCS2->clear();
unset($htmlCS2);
}else{echo '';}

?>