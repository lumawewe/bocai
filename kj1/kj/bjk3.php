<?php
require_once 'apikj.php';
$data = apikj('bjk3');
$data = $data['result']['data']['0'];
//var_dump($data);
//$api = "http://api.api68.com/lotteryJSFastThree/getBaseJSFastThree.do?issue=&lotCode=10033";
//$data = file_get_contents($api);
//$data = json_decode($data,1);
//$qh = $data['result']['data']['preDrawIssue'];
////$qh = str_split($qh);
////$qh1 = $qh[0].$qh[1].$qh[2].$qh[3].$qh[4].$qh[5].$qh[6].$qh[7].'0'.$qh[8].$qh[9];
////var_dump($qh);
////echo $qh1;
//$hm = $data['result']['data']['preDrawCode'];
//
//$rq = $data['result']['data']['preDrawTime'];
//$opentimestmp = strtotime($rq);
//$hm = $data['award'];
echo '{"sign":true,"message":"获取成功","data":[{"title":"北京快3","name":"bjk3","expect":"'.$data['gid'].'","opencode":"'.$data['award'].'","opentime":"'.$data['time'].'","source":"开彩采集","sourcecode":""}]}';
?>