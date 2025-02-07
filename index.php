<?php

include($_SERVER['DOCUMENT_ROOT'].'/api/inc/simple_html_dom.php');

$rootname='indukseluler';

function _checkFileExists($url){
$headers = @get_headers($url);
if($headers[0] == 'HTTP/1.1 404 Not Found') {
return false;
}else{
return true;
}
}

function rep_kurung($text){
$re = '/ \([^)]*\)+/';
$subst = '';
$result = preg_replace($re, $subst, $text, 1);
return $result;
}

function trim_char($text){
return str_replace(' &nbsp;&nbsp; ','',preg_replace('/\s+/',' ', $text));
}

function trim_char2($text){
return preg_replace('/\s+/',' ',rtrim(ltrim($text)));
}

function strip_tags_content($string) {
$string = preg_replace ('/<[^>]*>/', '', $string);
$string = str_replace("\r", ' ', $string);
$string = str_replace("\n", ' ', $string);
$string = str_replace("\t", ' ', $string);
$string = trim(preg_replace('/ {2,}/', ' ', $string));
return $string;
}

function replace_moon($text){
$search = array('January','February','March','April','May','June','July','August','September','October','November','December','Q1','Q2','Q3','Q4');
$replace = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember','Kuartal-1','Kuartal-2','Kuartal-3','Kuartal-4');
return str_replace($search,$replace,$text);
}

function replace_num_moon($text){
$search = array('January','February','March','April','May','June','July','August','September','October','November','December','Q1','Q2','Q3','Q4');
$replace = array('01','02','03','04','05','06','07','08','09','10','11','12','04','06','09','12');
return str_replace($search,$replace,$text);
}

function func_date($fulldate){
return preg_replace('/([0-9]{2})/', '$1', $fulldate);
}

function func_month($fulldate){
return replace_moon(preg_replace('/(January|February|March|April|May|June|July|August|September|October|November|December|Q1|Q2|Q3|Q4)/', '$1', $fulldate));
}

function num_month($fulldate){
return replace_num_moon(preg_replace('/(January|February|March|April|May|June|July|August|September|October|November|December|Q1|Q2|Q3|Q4)/', '$1', $fulldate));
}

function func_year($fulldate){
return preg_replace('/([0-9]{4})/', '$1', $fulldate);
}

$this_page='KharisPati';
include $_SERVER['DOCUMENT_ROOT'].'/api/inc/header.php';
?>
<div id="HPContainer">
<?php
if(isset($_GET['uri'])){
$page = base64_decode($_GET['uri']);
$getbrand = base64_decode($_GET['brand']);

function listcheck($brandname,$postname){ $burl = file_get_contents('https://indukseluler.blogspot.com/feeds/posts/summary/-/'.rawurlencode($brandname).'?alt=json&max-results=999999'); $bjson = json_decode($burl, true); $bentry = $bjson['feed']['entry']; foreach($bentry as $ent){if($ent['title']['$t'] == $brandname.' '.$postname){ $return = '(KharisPati)<br/>';}} return $return; }

include $_SERVER['DOCUMENT_ROOT'].'/api/indukseluler/list.php';

}else if(isset($_GET['data'])){

$detail = base64_decode($_GET['data']);
$brand = base64_decode($_GET['data2']);

function insertAfter($input, $index, $newKey, $element) {if (!array_key_exists($index, $input)){throw new Exception("Index not found");}
$tmpArray = array();foreach ($input as $key => $value) { $tmpArray[$key] = $value;if ($key === $index) {$tmpArray[$newKey] = $element;}} return $tmpArray;}

$blogger1jsonurl = file_get_contents('https://indukseluler.blogspot.com/feeds/posts/summary/-/'.$brand.'?alt=json&max-results=999999');
$blogger1jsondecode = json_decode($blogger1jsonurl, true);
$blogger1entry = $blogger1jsondecode['feed']['entry'];

include $_SERVER['DOCUMENT_ROOT'].'/api/indukseluler/detail.php';

}else{

if(_checkFileExists('https://carisinyal.com/hp/')){
$html = new simple_html_dom();
$html->load_file('https://carisinyal.com/hp/', false, $context);
$grabcontainer = $html->find('main',0);
$titlecontent = 'Brand Smartphone';
$grablist = $grabcontainer->find('.cities',0);
$grabcontent = $grablist->find('.city');
?>
<table style="max-width:100%;border-color:#000000" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<th style="background:#000000"><h4 style="padding:0;margin:0"><?php echo $titlecontent; ?></h4></th>
</tr>
<tr>
<td>
<div class="HPGallery">
<?php
foreach($grabcontent as $project){
$branduri = $project->find('a',0)->getAttribute('href',0);
$brandname = $project->find('a',0)->innertext;

?>
<div id="<?php echo $brandname; ?>" onclick="location.href='indukseluler.php?uri=<?php echo base64_encode($branduri).'&brand=<?php echo base64_encode($brandname); ?>'" class="HPList" style="background-color:#CCCCCC;border-color:#000000;background-image: url(<?php echo $favicon; ?>);background-size:90% auto;background-position: center center;"><span class="HPName"><?php echo $brandname; ?></span></div>
<?php
}
?>
</div>
</td>
</tr>
</tbody>
</table>
<?php
$html->clear();
unset($html);
}else{echo '';}

}
?>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/api/inc/footer.php';
?>
