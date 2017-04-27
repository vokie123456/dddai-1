<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pro;
use App\Att;
use App\Bid;
use App\Hk;
use App\Task;
use DB;
use Auth;
use Grow;
use Validate;
    class ProController extends Controller {

    public function jie(Request $request) {
        //Request $request是为了获取cookie和session等信息

       return view('home.woyaojiekuan');
    } 

    public function jiePost(Request $request) {
         // return 'insert into DB';
      // 在往表中写入数据之前验证
      $this->validate($request , [
      'age'=>'required|in:15,40,80',
      'money'=>'required|digits_between:2,7',
      'mobile'=>'required|regex:/^1[3458]\d{9}$/',
      ]
  );


      $pro = new Pro();
        // $pro->age = $request->age;//projects表中没有age这个字段,附属表atts中有age这个字段
       $user=$request->user();
       $pro->name = $user->name;
       $pro->money = $request->money*100;
        $pro->mobile = $request->mobile;
        $pro->pubtime = time();
        $rs = $pro->save();
        // 开始写入atts附属表信息
        $att = new Att();
        $att->age=$request->age;
        $pro->uid=$user->uid;

        $att->pid = $pro->pid;
        $att->save();
        // var_dump($rs);
     
       echo 'ok';
    }

//传一个参数
    public function pro($pid){
      // 按照主键pid查
      $pro=Pro::find($pid);
      //传参
      return view('pro',['pro'=>$pro]);
    }


    public function touzi(Request $request,$pid){
      // echo 'ok';
      // exit;
      // print_r($pid);
     $bid = new Bid();

      $bid->uid = $request->user()->uid;
      $bid->pid = $pid;
      $bid->title = $request->title;
      $bid->money = $request->money*100;
      $bid->pubtime = time();
     
      $bid->save();

      $pro=Pro::find($pid);
      $pro->recive+=$bid->money;
      $pro->save();

    if(($pro->recive)>($pro->money)){
      echo '已经超标了,不能多投';
      exit;
    }
    else if($pro->recive==$pro->money){
      $pro->status=2;
      $pro->save();
      $this->touziDone($pid);
    }

      return '投标成功';
    }
    protected function  touziDone($pid){
      $pro=Pro::find($pid);
      //1.修改项目的状态
      $pro->status=2;
      $pro->save();
      //2.为借款人生成还款记录
      $amount = ($pro->money * $pro->rate / 1200 ) + ($pro->money / $pro->hrange); // 算出每月还款额
      
      $row = ['uid'=>$pro->uid , 'pid'=>$pro->pid , 'title'=>$pro->title];
      $row['amount'] = $amount;
      // $row['status'] = 0;不能有这个字段,因为hks中没有这个字段.写上的话会报错:找不到status这一列
      
      $today = date('Y-m-d');
      for($i=1; $i<=$pro->hrange; $i+=1) {
      $paydate = date('Y-m-d' , strtotime("+ $i months"));
      $row['paydate'] = $paydate;
      DB::table('hks')->insert($row);
      }
        //3.为投资人,生成收益打款任务
      $bids = Bid::where('pid' , $pid)->get();
      $row = [];
      $row['pid'] = $pid;
      $row['title'] = $pro->title;
      $row['enddate'] = date('Y-m-d' , strtotime("+ {$pro->hrange} months"));
      foreach($bids as $bid) {
      $row['uid'] = $bid->uid;
      $row['amount'] = $bid->money * $pro->rate / 36500;
      DB::table('tasks')->insert($row);
      }
    } 

    //借款人查看自己的账单表
    public function myzd(){
      // $hks=DB::table('hks')->get();//这是获取到表中的所有数据
      $hks=DB::table('hks')->paginate(3);//将获取到到的数据已分页显示
      return  view('myzd',['hks'=>$hks]);
    }  
    //投资人查看自己的投资表
   public function mytz() {
      $user = Auth::user();
      $bids = Bid::where('bids.uid' , $user->uid)->whereIn('status' , [1,2])
      ->join('projects' , 'bids.pid' , '=' , 'projects.pid')->get(['bids.*' , 'projects.status']);
      //dd($bids);
      return view('mytz' , ['bids'=>$bids]);
      }

    //投资人查看自己的收益表
      public function mysy(){
        $user=Auth::user();
        $grows=DB::table('grows')->where('uid',$user->uid)->orderBy('gid','desc')->get();
        return view('mysy',['grows'=>$grows]);
      }

 }
?>