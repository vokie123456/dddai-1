<html><head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">


<meta content="all" name="robots">
<meta charset="utf-8">
<title>借款管理-我要还款</title>
<meta content="点点贷、借出、借款" name="keywords">
<meta content="点点贷" name="description">
    
<meta content="no-cache" http-equiv="pragma">
<meta content="no-cache" http-equiv="cache-control">
<meta content="0" http-equiv="expires">

<link type="text/css" rel="stylesheet" href="css/common.css"> 
<link type="text/css" rel="stylesheet" href="css/sea.css">
<link type="text/css" rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="" >
</head>

<body style="display: block;">
<!--header start-->

@include('header')
<!--header end-->

<!--面包屑-->
<div class="crumbs userCrumbs">
    <a class="first" href="#">账户中心</a><span>&gt;</span><a class="two" href="#">借款管理</a><span>&gt;</span><a class="two">项目审核</a>
</div>
<!--面包屑 end-->
<!--layout start-->
<div class="layout clearfix page46">
    <!--left nav start-->
<!--left nav start-->
	<div class="clearfix leftbar">
    	<div class="clearfix left_nav">
        	<!--user_nav start-->
        	<div class="clearfix user_nav" id="leftMenuContainer"><a href="#"><h3><i class="ico1"></i>账户中心</h3></a><h4><span>资金管理</span><i></i></h4><ul style="display:block;" pdata="zjglElem" id="zjglElem"><li pdata="my_nwd_3" id="my_nwd_3"><a href="#">我要充值</a></li><li pdata="my_nwd_4" id="my_nwd_4"><a href="#">我要提现</a></li><li pdata="my_nwd_5" id="my_nwd_5"><a href="#">资金记录</a></li><li pdata="my_nwd_6" id="my_nwd_6"><a href="#">收益明细</a></li></ul><h4><span>投资管理</span><i></i></h4><ul style="display:block;" pdata="tzglElem" id="tzglElem"><li pdata="tz_nwd_2" id="tz_nwd_2"><a href="#">嘉财有道</a></li><li pdata="tz_nwd_8" id="tz_nwd_8" class="rela"><a href="#">嘉猜宝</a></li><li pdata="tz_nwd_1" id="tz_nwd_1"><a href="#">我的债权</a></li><li pdata="tz_nwd_5" id="tz_nwd_5"><a href="#">债权转让</a></li><li pdata="tz_nwd_7" id="tz_nwd_7" class="rela"><a href="#">体验专区</a></li><li pdata="tz_nwd_4" id="tz_nwd_4" class="rela"><a href="#">电子对账单</a></li><li pdata="tz_nwd_3" id="tz_nwd_3"><a href="#">智能抢标</a></li></ul><h4><span>借款管理</span><i></i></h4><ul style="display:block;" pdata="jkglElem" id="jkglElem"><li pdata="jk_nwd_5" id="jk_nwd_5"><a href="#">我要还款</a></li><li pdata="jk_nwd_4" id="jk_nwd_4"><a href="#">借款记录</a></li><li pdata="jk_nwd_6" id="jk_nwd_6"><a href="#">借款申请</a></li></ul><h4><span>账户管理</span><i></i></h4><ul style="display:block;" pdata="zhglElem" id="zhglElem"><li pdata="xinxi_nwd_1" id="xinxi_nwd_1"><a href="#">个人资料</a></li><li pdata="xinxi_nwd_9" id="xinxi_nwd_9"><a href="#">我的积分</a></li><li class="weiyi" pdata="xinxi_nwd_8" id="xinxi_nwd_8"><a href="#">安全中心</a></li><li pdata="xinxi_nwd_7" id="xinxi_nwd_7"><a href="#">账户绑定</a></li><li pdata="xinxi_nwd_4" id="xinxi_nwd_4"><a href="#">消息中心</a></li></ul><h4><span>活动管理</span><i></i></h4><ul style="display:block;" pdata="hdglElem" id="hdglElem"><li pdata="xinxi_nwd_6" id="xinxi_nwd_6"><a href="#">我的礼品</a></li><li pdata="tj_nwd_4" id="tj_nwd_4"><a href="#">推荐有奖</a></li><li pdata="tj_nwd_1" id="tj_nwd_1"><a target="_blank" href="#">我要推荐</a></li></ul></div>
            <!--user_nav end-->
    	</div>
    		    	<div class="banner_out">
		            <div class="user_banner">
			                <div class="img">
			                    <ul>
			                    </ul>
			                </div>
		            <div class="page"></div></div>
	        </div>
    </div>
    <!--left nav end-->
    
<!--left nav end-->
    <!--right start-->
    <div class="clearfix main_wrapper">
    	<div class="container">
            <div class="accountCenter">
                <span class="fs_18 left">项目审核</span>
                <span class="center"></span>
                <span class="ff bold">单位：元</span>
            </div>
            <div class="clearfix fluid mb_10">
            	<div class="module">
                	<!--筛选-->
                	<form action="" id="borrowingRecordfo" method="post" class="nwd-formUi" autocomplete="off">                   
                    <ul class="clearfix search">
                        <li class="clearfix no1">
                            <div class="title">状态：</div>
                            <div class="condition a_btn">
                                <span>
                                    <a href="#" id="atype" value="-1" class="lei kuai active">全部</a>
                                    <a href="#" id="stype" value="20,11" class="lei kuai">发布待审核</a>
                                    <a href="#" id="dtype" value="0" class="lei kuai">未发布</a>
                                    <a href="#" id="ftype" value="1" class="lei kuai">招标中</a>
                                    <a href="#" id="gtype" value="3,9" class="lei kuai">满标待审核</a>
                                    <a href="#" id="htype" value="4" class="lei kuai">借款成功</a>
                                    <a href="#" id="jtype" value="6,7,10" class="lei kuai">流标</a>
                                    <a style="display: none;" href="javascript:void(0)" id="ktype" value="2,21" class="lei kuai">失败</a>
                                    <a style="display: none;" href="javascript:void(0)" id="ltype" value="8" class="lei kuai">担保中</a>
                                </span>
                                <a href="#" class="more kuai">更多</a>               
                            </div>
                        </li>
                    </ul>
                    </form>
                    <!--筛选 end-->
                    <div class="clearfix tab_content">
                    	<!--1-->
                        <div class="clearfix nr">
                            <!--table-->
                            <table class="table">
                                <tbody>
								<tr>

                                   <th class="f">ID</th>
                                   <th>发布时间</th> 
                                   <th class="tr"><span>借款人</span></th> 
                                   <th class="tr">贷款金额</th> 
                                   <th>年龄</th>
                                   <th class="tr">手机</th>
                                   <th class="">状态</th>
                                   <th class="l">操作</th>
                                </tr>
                            @forelse($pros as $p)
                                <tr>
                                   <td class="f">{{$p->pid}}</td>
                                   <td>{{date('Y/m/d H:i:s',$p->pubtime)}}</td> 
                                   <td class="tr"><span>{{$p->name}}</span></td> 
                                   <td class="tr">{{$p->money/100}}</td> 
                                   <td>{{$p->age}}</td>
                                   <td class="tr">{{$p->mobile}}</td>
                                   <td class="">
								   @if ($p->status==0)
								   待审核
								   @elseif ($p->status==1)
								   招标中
								   @elseif ($p->status==2)
								   还款中
								   @elseif ($p->status==3)
								   已结束
								   @endif
								   
								   </td>
                                   <td class="l"><a href="{{url( 'check',[ $p->pid ] )}}">审核</a></td>
                                </tr>
								@empty
                                </tbody>
                             </table>
                            <div class="wujilu" id="errorMsg">暂无记录</div>
							@endforelse
                            <!--table end-->
                            <div class="t_foot">
                                
                                <div class="r">
                            	<div class="fy">
                                	<!--分页 str -->
                            	</div>
                        		</div>
                                
                          </div>
                            <div class="tongji tj_nr01" id="tongji">
                            	待还本息 &nbsp;&nbsp;共 <span class="fc_orange bold" id="waitCapital"></span> 元，
                            	应还罚息  共 <span class="fc_green bold" id="shouldFine"></span> 元 	
                            </div>
                            
                      </div>
                     
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- right end -->
</div>
<!--layout end-->



</body></html>