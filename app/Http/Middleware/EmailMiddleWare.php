<?php

namespace App\Http\Middleware;

use Closure;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;

class EmailMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //可以把$next看做一个函数
    // public function handle($request, Closure $next)
    // {
    //     echo 'I will send an email to you';
    //     return $next($request);
    // }
    //注册后发邮件
public function handle($request, Closure $next)
{
$rs = $next($request);
// 注册后发邮件
//$request->user()->email;
if($request->user()) {
$mail = new Message;
//注意,下行的setFrom要和你的邮箱名保持一致
        $mail->setFrom('laowang <superkeysir@163.com>')
        ->addTo($request->user()->email)
        ->setSubject('试试我的中间件')
        ->setBody("真好用!");
        $mailer = new SmtpMailer(array(
                                        'host' => 'smtp.163.com',
                                        'username' => 'superkeysir',#你的163用户名
                                        'password' => 'admins'# 你的邮箱密码
                                        ));
            $mailer->send($mail);
       } 
            return $rs;
    }
}
?>