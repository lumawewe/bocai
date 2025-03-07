<?php 
//验证码类
class ValidateCode {
 private $charset = '0123456789';//随机因子
 private $code;//验证码
 private $codelen = 40;//验证码长度
 private $width = 70;//宽度
 private $height = 30;//高度
 private $img;//图形资源句柄
 private $font;//指定的字体
 private $fontsize = 16;//指定字体大小
 private $fontcolor;//指定字体颜色
 //构造方法初始化
 public function __construct() {
  $this->font = dirname(__FILE__).'/ttf/simhei.ttf';//注意字体路径要写对，否则显示不了图片
 }
 //生成随机码
 private function createCode() {
  $_len = strlen($this->charset)-1;
  for ($i=0;$i<$this->codelen;$i++) {
   $this->code .= $this->charset[mt_rand(0,$_len)];
  }
 }
 //生成背景
 private function createBg() {
  $bj=mt_rand(231,255);
  $this->img = imagecreatetruecolor($this->width, $this->height);
  $color = imagecolorallocate($this->img, $bj, $bj, $bj);
  imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
 }
 //生成文字
 private function createFont() {
  $_x = $this->width / $this->codelen;
  for ($i=0;$i<$this->codelen;$i++) {
   $this->fontcolor = imagecolorallocate($this->img,mt_rand(0,60),mt_rand(0,10),mt_rand(0,100));
   imagettftext($this->img,$this->fontsize,mt_rand(0,10),$_x*$i+mt_rand(1,2),$this->height / 1.4,$this->fontcolor,$this->font,$this->code[$i]);
  }
 }
 //生成线条、雪花
 private function createLine() {
  //线条
  for ($i=0;$i<3;$i++) {
   $color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
   imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
  }
  //雪花
  for ($i=0;$i<10;$i++) {
   $color = imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
   imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$color);
  }
  //边框
  imagerectangle($this->img, 0, 0, $this->width-1, $this->height-1, imagecolorallocate($this->img, 0, 0, 0));  
 }
 
 //输出
 private function outPut() {
  header('Content-type:image/png');
  imagepng($this->img);
  imagedestroy($this->img);
 }
 //对外生成
 public function doimg() {
  $this->createBg();
  $this->createCode();
  $this->createLine();
  $this->createFont();
  $this->outPut();
 }
 //获取验证码
 public function getCode() {
  return strtolower($this->code);
 }
}
session_start();
$_vc = new ValidateCode();  //实例化一个对象
$_vc->doimg();  
$_SESSION['randcode'] = $_vc->getCode();//验证码保存到SESSION中
?>