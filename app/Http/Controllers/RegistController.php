<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistRequest;
use App\Models\User;
use Hash;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use Illuminate\Support\Facades\Cache;

class RegistController extends Controller
{
   function regist(){
       return view('regist.regist');
   }
   function doregist(RegistRequest $req){
    
        
       


       $password = Hash::make($req->password);
       $user = new User;
       $user->mobile = $req->mobile;
       $user->password = $password;
       if($req->has('face') && $req->face->isValid()){
           $data = date('Ymd');
           $face = $req->face->store('face/'.$data);
           $user->face = $face;
       }else{
           return back()->withError([
               'face'=>'上传过程中出错，请重试！',
           ]);
       }

       $user->save();
       return redirect()->route('login');
   }
   function sendmobilecode(Request $req){
         //短信验证
        //  return $req->mobile;
            $code = rand(100000,999999);
            // $code = 1234;
            $name = 'code-'.$req->mobile;
            Cache::put($name,$code,1);

            $config = [
                'accessKeyId'    => 'LTAILMq8bGG16QRH',
                'accessKeySecret' => 'EfRwz3y5c7GW8gbgsSaNnUMViolaRr',
            ];
            
            $client  = new Client($config);
            $sendSms = new SendSms;
            $sendSms->setPhoneNumbers('15893074791');
            $sendSms->setSignName('MBM');
            $sendSms->setTemplateCode('SMS_135038655');
            $sendSms->setTemplateParam(['code' => $code]);
            
            // 发送
            print_r($client->execute($sendSms));
            // return 1;
   }

}