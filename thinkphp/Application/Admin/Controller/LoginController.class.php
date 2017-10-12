<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function Login(){

        if($_POST){


            $names=I('post.names');
            $password=md5(I('post.password'));
            $result=M('admin')->where("`names`='$names' AND `password`='$password'" )->find();
            if($result){
                session("names",$names);

            }
            if(!empty(I('post.remember'))){
                cookie("names",$names,time()+60*60);

            }

            $this->redirect('Index/index');
        }else{

          //  $this->error("用户名或密码错误！",U('Login/login',3));die;
        }


     $this->display();
    }

}