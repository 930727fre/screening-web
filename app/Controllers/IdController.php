<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SignModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class IdController extends BaseController
{
    public function index()
    {
        return view('id/index.php');
    }
    public function signIn(){
        return view("id/signIn.php");
    }
    public function validateAccount(){
        $model=new SignModel();
        $data=[
            'username'=>$this->request->getVar('username'),
            'password'=>$this->request->getVar('password')
        ]; 
        if($model->where('username',$data['username'])->first()){
            if(($model->where('username',$data['username'])->first())['password']===$data['password']){
                session_start();
                $_SESSION['username']=$data['username'];
                $_SESSION['signedIn']=true;
                return view("id/profile.php");
            }
        }
            // echo "<script>alert('" . 錯誤username或密碼 . "');</script>";
        return view("id/signIn.php",array("message"=>"密碼輸入錯誤"));

    }
    public function register()
    {
        return view("id/register.php");
    }
    public function createAccount(){
        $model=new SignModel(); 
        $data=[
            'identity'=>$_POST['identity'],
            'fullname'=>$_POST['fullname'],
            'mail'=>$_POST['mail'],
            'username'=>$_POST['username'],
            'password'=>$_POST['password']
        ];
        $YN=$model->save($data);
        // print_r($YN);
        return view('id/countdown.php',array("message"=>"註冊成功!"));
        // return redirect("idController");
    }
    public function sessionTest(){
        return view('id/sessionTest.php');
    }
    public function test1(){
        return view('id/test1.php');
    }
    public function checkUsername(){
        $username = $this->request->getPost('username');

        $model = new SignModel(); // Replace this with the actual model representing your users

        // Check if the username exists in the database
        $user = $model->where('username', $username)->first();

        if ($user) {
            // Username is taken
            return 'taken';
        } else {
            // Username is available
            return 'available';
        }
    }
    public function signOut(){
        session_start();
        session_destroy();
        $_SESSION = array(); 
        return view("id/index.php");
    }
    public function forgetPassword(){
        return view("id/forgetPassword.php");
    }
    public function changePassword(){
        if($_POST['verificationCode']==$_POST["input"]){
            $model = new SignModel(); // Replace this with the actual model representing your users
            $model->where("username",$_POST['username'])->set(array("password"=>$_POST['password']))->update();

            return view("id/countdown.php",array("message"=>"驗證成功！已修改密碼"));
        }
        else{
            return view("id/countdown.php",array("message"=>"驗證失敗","url"=>"idController/test2"));
        }
    }
    public function sendMail(){
        ob_start();

        require $_SERVER['DOCUMENT_ROOT'].'/src/Exception.php';
        require $_SERVER['DOCUMENT_ROOT'].'/src/PHPMailer.php';
        require $_SERVER['DOCUMENT_ROOT'].'/src/SMTP.php';
        require $_SERVER['DOCUMENT_ROOT'].'/../vendor/autoload.php';
    
        // //Create an instance; passing `true` enables exceptions
        $verificationCode=rand(1000,9999);
        $mail = new PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        $from="930727fre@gmail.com";
        $model = new SignModel();
        $to=($model->where('username', $_POST['username'])->first())['mail'];
        $fromPassword="ywcelhgwnkqahpkr";
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = $from;
        $mail->Password = $fromPassword;
        $mail->SetFrom($from);
        $mail->Subject = "admission-web: verification code";
        $mail->Body = "驗證碼：".$verificationCode;
        $mail->AddAddress($to);
        if(!$mail->Send()) {
            return view("id/countdown.php",array("message"=>"invalid email"));
    
        } else {
            ob_end_clean();
            return view("id/inputVerificationCode.php",array("verificationCode"=>$verificationCode,"username"=>$_POST['username']));
        }        
    }
}
