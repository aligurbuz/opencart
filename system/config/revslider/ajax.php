<?php
  include_once('../../../admin/config.php');
  include_once('../../../admin/index.php');
  include_once('includes/revslider_globals.class.php');
  include_once('revslider-loader.class.php');
  include_once('revslider-admin.class.php');
$productAdmin = new RevSliderAdmin(DIR_CONFIG.'revslider');
$action = isset($_GET['action'])?$_GET['action']:isset($_POST['action'])?$_POST['action']:'';
switch($action){
    case 'revsliderprestashop_show_image':
        $imgsrc = isset($_GET['img'])?$_GET['img']:isset($_POST['img'])?$_POST['img']:'';
        if($imgsrc){
            $imgsrc = str_replace('../','',  urldecode($imgsrc));
            if(strpos($imgsrc,'uploads') !== FALSE){
                $file = @getimagesize($imgsrc);
                if(!empty($file) && isset($file['mime'])){
                    $size = GlobalsRevSlider::IMAGE_SIZE_MEDIUM;
                    $filename = basename($imgsrc);
                    $filetitle = substr($filename,0,strrpos($filename,'.'));
                    $fileext = substr($filename,strrpos($filename,'.'));
                    $newfile = "uploads/{$filetitle}-{$size}x{$size}{$fileext}";
                    if($newfilesize = @getimagesize($newfile)){
                        $file = $newfilesize;
                        $imgsrc = $newfile;
                    }
                    header('Content-Type:'.$file['mime']);
                    echo file_get_contents($imgsrc);
                }
            }
        }
  break;
}

die();