<?php
$powerpnt = new COM("powerpoint.application") or die("Unable to instantiate Powerpoint");
$file='/Users/liuzuobin/Desktop/健康科普资源库网站二级页面设计20171117.pptx';
$presentation = $powerpnt->Presentations->Open(realpath($file), false, false, false) or die("Unable to open presentation");
foreach($presentation->Slides as $slide)
{
$slideName = "Slide_" . $slide->SlideNumber;
$uploadsFolder = 'iii';
$exportFolder = realpath($uploadsFolder);
$slide->Export($exportFolder."//".$slideName.".jpg", "jpg", "600", "400");
}
$presentation->Close();
$powerpnt->Quit();
$powerpnt = null;
?>