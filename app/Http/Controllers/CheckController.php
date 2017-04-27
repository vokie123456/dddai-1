<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pro;
use App\Att;
class CheckController extends Controller
{
    //取出所有项目,供管理员审核
	public function prolist(){
        echo 'hello world';
		$pros=Pro::orderBy('pid','desc')->get();
		return view('prolist',['pros'=>$pros]);
    }
   //查出每一行,审核项目,主要是修改projects表和atts表
    public function check($pid){
    	$pro=Pro::find($pid);
    	$att=Att::where('pid',$pid)->first();
    	if(empty($pro)){
    		return redirect('./prolist');
    	}
    	return view('shenhe',['pro'=>$pro,'att'=>$att]);
    }

    //审核数据update到数据库
    public function checkPost(Request $request,$pid){
    	$pro=Pro::find($pid);
    	$att=Att::where('pid',$pid)->first();

    	if(empty($pro)){
    		return redirect('./prolist');
    	}
    	$pro->title=$request->title;
    	$pro->hrange=$request->hrange;
    	$pro->rate=$request->rate;
    	$pro->status=$request->status;

    	$att->realname=$request->realname;
    	$att->gender=$request->gender;
    	$att->udesc=$request->udesc;

    	if($pro->save()&&$att->save()){
    		return redirect('./prolist');
    	}else{
    		return 'error';
    	}
    }
}
?>