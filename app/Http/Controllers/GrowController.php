<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Grow;
use App\Hk;
use App\Task;
use App\Pro;
use DB;
use Bid;
use Auth;
class GrowController extends Controller{

//运行产生每日收益
   public function run(){
    $today = date('Y-m-d');
    $tasks = DB::table('tasks')->where('enddate' , '>=' , $today)->get();
    foreach($tasks as $t) {
    $t->paytime = $today;
    $t = (array)$t;
    unset($t['tid']);
    unset($t['enddate']);
    DB::table('grows')->insert($t);
      }
   }
// //执行账单动作
//    public function myzd(){
//     $hk=DB::table('hk')->get();
//     return view('myzd',['hk'=>$hk]);
//    }

//执行收益动作
   public function mysy(){
    $user=Auth::user();
    $grows=DB::table('grows')->where('uid',$user->uid)->orderBy('gid','desc')->get();
    return view('mysy',['grows'=>$grows]);
   }

//执行投资动作
   public function mytz(){
    $user = Auth::user();
    $bids = Bid::where('bids.uid' , $user->uid)->whereIn('status' , [1,2])
    ->join('projects' , 'bids.pid' , '=' , 'projects.pid')->get(['bids.*' , 'projects.status']);
    return view('mytz' , ['bids'=>$bids]);
       }
}
?>