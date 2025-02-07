<?php

if(_checkFileExists($page)){
$htmlCS = new simple_html_dom();
$htmlCS->load_file($page);
$grabcontainerCS = $htmlCS->find('.oxygen-body',0);
$titlecontentCS = trim_char($grabcontainerCS->find('h1.ct-headline',0)->find('.ct-span',0)->plaintext);
$grablistCS = $grabcontainerCS->find('div.oxy-dynamic-list',0);
$grabcontentCS = $grablistCS->children();
$navicontainerCS = ($htmlCS->find('.ct-section-inner-wrap',0)->find('.oxy-repeater-pages-wrap',0)) ? $htmlCS->find('.ct-section-inner-wrap',0)->find('.oxy-repeater-pages-wrap',0) : '';

if($navicontainerCS != ''){
$currentpageCS = ($navicontainerCS->find('.current',0)) ? $navicontainerCS->find('.current',0)->plaintext : '';
$prevpageCS = ($navicontainerCS->find('.prev',0)) ? $navicontainerCS->find('.prev',0)->getAttribute('href',0) : '#';
$nextpageCS = ($navicontainerCS->find('.next',0)) ? $navicontainerCS->find('.next',0)->getAttribute('href',0) : '#';
}
?>
<table style="max-width:100%;border-color:#000000" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<th style="background:#000000"><h4 style="padding:0;margin:0"><a href="/" class="image-mini-icon icon-closemenu"></a> <?php echo $titlecontentCS; ?></h4></th>
</tr>
<tr>
<td>
<div class="HPGallery">
<?php
foreach($grabcontentCS as $project2){
$productnameCS = str_replace('Luna','Evercoss Luna',trim_char($project2->find('.ct-headline',0)->plaintext));
$producturiCS = $project2->find('.ct-link-button',0)->href;
$productimgCS = ($project2->find('.ct-image',1)->src) ? $project2->find('.ct-image',1)->src : '';

if($productimgCS != ''){
?>
<div id="<?php echo $productnameCS; ?>" onclick="location.href='/?data=<?php echo base64_encode($productnameCS); ?>&data2=<?php echo base64_encode($getbrand); ?>'" class="HPList" style="background-color:#CCCCCC;border-color:#000000;background-image: url(<?php echo $productimgCS; ?>);background-size:auto 85%;background-position: center center;"><span class="HPName"><?php echo listcheck($getbrand,$productnameCS).$productnameCS; ?></span></div>
<?php
}else{
echo '';
}

}
?>
</div>
</td>
</tr>
<tr>
<td>
<div style="display:block;margin:10px auto 0;width:50%;text-align:center;">Page: <?php echo $currentpageCS; ?></div>
<hr/>
<?php
if($prevpageCS == '#'){
?>
<button style="display:inline-block;margin:20px 15px;width:35%;float:right" onclick="location.href='/?uri=<?php echo base64_encode($nextpageCS); ?>'">Next</button>
<?php
}else if($nextpageCS == '#'){
?>
<button style="display:inline-block;margin:20px 15px;width:35%;float:left" onclick="location.href='/?&uri=<?php echo base64_encode($prevpageCS); ?>'">Prev</button>
<?php
}else{
?>
<button style="display:inline-block;margin:20px 15px;width:35%;float:left" onclick="location.href='/?uri=<?php echo base64_encode($prevpageCS); ?>'">Prev</button>
<button style="display:inline-block;margin:20px 15px;width:35%;float:right" onclick="location.href='/?uri=<?php echo base64_encode($nextpageCS); ?>'">Next</button>
<?php
}
?>
</td>
</tr>
</tbody>
</table>
<?php
$htmlCS->clear();
unset($htmlCS);
}else{echo '';}

?>
