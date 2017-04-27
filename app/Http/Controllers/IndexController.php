<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pro;
use Auth;
class IndexController extends Controller{
    public function index(){
        $pros=Pro::where('status',1)->take(3)->get();//实例化一张表
        return view('index',['pros'=>$pros] );
    }
/*
    public function sm(Requestm $request,$mobile){
    require(base_path().'/vender/alidayu/TopSdk.php');


$c = new \TopClient;
$c->appkey = 23354783;
$c->secretKey =533fc9534a5f881ec44192ab0effee8c ;
$request = new AlibabaAliqinFcSmsNumSendRequest;
$request->setExtend("123456");
$requset->setSmsType("normal");
$request->setSmsFreeSignName("阿里大鱼");
$request->setSmsParam("{\"code\":\"1234\",\"product\":\"alidayu\"}");
$request->setRecNum("13000000000");
$request->setSmsTemplateCode("SMS_585014");

echo $c->execute($request);
    }
*/
}
?>