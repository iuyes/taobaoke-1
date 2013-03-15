<?php
require_once('TopClient.php');
$c = new TopClient;
$c->appkey = "21352824";
$c->secretKey ="6165ac00af5e9fe95150c04f3fd8629b";
$req = new TaobaokeItemsGetRequest;
$req->setFields("num_iid,title,nick,pic_url,price,coupon_price,click_url,commission,commission_rate,commission_num,commission_volume,shop_click_url,seller_credit_score,item_location,volume");
$req->setCid(50010788);
$resp = $c->execute($req);

$arr = $resp->taobaoke_items->taobaoke_item;
print_r($arr[0]);
?>
