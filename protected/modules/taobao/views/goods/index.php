<?php
header("Content-type:text/html;charset=utf-8");
require("TopSdk.php");

$c = new TopClient;
$c->appkey = '21352824';
$c->secretKey = '6165ac00af5e9fe95150c04f3fd8629b';
$req = new TaobaokeItemsGetRequest;
$req->setFields("num_iid,title,nick,pic_url,price,coupon_price,click_url,commission,commission_rate,commission_num,commission_volume,shop_click_url,seller_credit_score,item_location,volume");
$req->setCid(50011978);
$resp = $c->execute($req);
print_r($resp);
?>

