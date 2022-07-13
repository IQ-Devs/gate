<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

trait Asiacell
{

    //fake pc id
    public function login($phonenumber)
    {
        $fake_id = $this->generate_id();
        $send_sms = Http::withHeaders([
            'Origin' => 'https://odpapp.asiacell.com',
            'DeviceID' => $fake_id,
            'Content-Length' => '43',
            'Accept' => '*/*',
            'User-Agent' => 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36'])->withOptions(['verify' => false])
            ->post('https://odpapp.asiacell.com/api/v1/login', [
                "username" => $phonenumber,
                "captchaCode" => ""

            ]);
        $pid = "";
        $regex = "/PID=([a-z-0-9]*)/";
        if (preg_match($regex, $send_sms['nextUrl'], $out)) {
            $pid = $out[1];

        }
//        if pid found or return false to retry
        return ['pid' => $pid, 'fake_id' => $fake_id];

    }

    //first step in login

    public function generate_id()
    {
        // generate a psuedo-random DeviceID //////////////////////////////////////////////
        $id = "04d1641e964250790b";
        for ($i = 0; $i < 8; $i++) {
            $id .= rand(0, 9);
        }
        $id .= "3bee55";
        return $id;
    }

    public function login_sms($fake_id, $pid, $passcode)
    {
        $send_sms = Http::withHeaders([
            'Origin' => 'https://odpapp.asiacell.com',
            'DeviceID' => $fake_id,
            'Content-Length' => '43',
            'Accept' => '*/*',
            'User-Agent' => 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36'])->withOptions(['verify' => false])
            ->post('https://odpapp.asiacell.com/api/v1/smsvalidation', [
                "PID" => $pid,
                "passcode" => $passcode

            ]);


        return json_decode($send_sms);

        //        {"access_token":"eyJhbGciOiJIUzUxMiJ9.eyJ1c2VybmFtZSI6IjA3NzI0OTMyNDM3IiwiZXhwIjoxNjQxMzMxMTc3fQ.43-7U6HOq7DtbFcBYU6z4Qgk7ZScNAUp9YJc3QUbo0dK6qAE2WcBR1_21RIKFMg3BTcSN9D8_DIuiSzcGd8rtA","refresh_token":"eyJhbGciOiJIUzUxMiJ9.eyJ0eXBlIjoicmVmcmVzaFRva2VuIiwidXNlcm5hbWUiOiIwNzcyNDkzMjQzNyIsImV4cCI6MTY0NjQyODc3N30.ZVw8USbY674NE0sfzKCzjbkNjuTTl9csmCm03I9Vph_08-d1BDNyjnhRvPSrrlvqe58Ogy6VyHSNqg8JQkvGtQ","success":true,"token_type":"Bearer","userId":2119015,"username":"07724932437"}
    }
//stdClass Object
//(
//[access_token] => eyJhbGciOiJIUzUxMiJ9.eyJ1c2VybmFtZSI6IjA3NzI0OTMyNDM3IiwiZXhwIjoxNjQ4ODUzMDMzfQ.7skyM2XpV6rv4Q-ZRYpi2RlWVAReu_J1P4fgVU0tlBMaixU6KAIQ48Vkll6sctxxAhNny20KdKsHYnxa7O2gyw
//[refresh_token] => eyJhbGciOiJIUzUxMiJ9.eyJ0eXBlIjoicmVmcmVzaFRva2VuIiwidXNlcm5hbWUiOiIwNzcyNDkzMjQzNyIsImV4cCI6MTY1Mzk1MDYzM30.DJRPpUN66Ut8p0C_mSvoIusQP63U5AHJkx2UGI6ErtLkjGmXBJ4QAPR7k2s6OGu7LT76lPe3nAGW9vYtIzed3A
//[success] => 1
//[userType] => eligibleAvocado
//[token_type] => Bearer
//[userId] => 2119015
//[username] => 07724932437
//)
    public function refresh_Token($refresh_token)
    {
        return Http::withHeaders([
            'Origin' => 'https://odpapp.asiacell.com',

            'Content-Length' => '43',
            'Accept' => '*/*',
            'User-Agent' => 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36'])->withOptions(['verify' => false])
            ->post('https://odpapp.asiacell.com/api/v1/validate', [
                "refreshToken" => "Bearer " . $refresh_token,

            ]);
    }

    public function getBalance($token)
    {

        $request = Http::withToken($token)->withHeaders([
            'Origin' => 'https://odpapp.asiacell.com',
            'Accept' => '*/*',
            'User-Agent' => 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36'])->withOptions(['verify' => false])
            ->get('https://odpapp.asiacell.com/api/v1/profile');

        $balance = json_decode($request);
        return $balance->data->bodies[1]->items[0]->value;
//        {"data":{"headers":null,"bodies":[{"groupId":0,"action":"open/uploadProfile","type":"profile","title":"Account overview","items":[{"name":"ابراهيم  قحطان","phoneNumber":"07724932437","photo":null}]},{"groupId":0,"action":"","type":"balance","title":"YOUR PREPAID BALANCE","items":[{"value":1135.25,"actionButton":{"title":"RECHARGE","action":"navigate/recharge"}}]},{"icon":"https://odpapp.asiacell.com/img/icon/remaining_data.png","tag":"data","type":"giftBox","inverted":true,"title":"Remaining Data","items":[{"title":"Your current plan does not include Data","action":{"title":"Get Data add-ons now","action":"switchTab/addOn"}}]},{"icon":"https://odpapp.asiacell.com/img/icon/remaining_call.png","tag":"call","type":"giftBox","inverted":true,"title":"Remaining Call","items":[{"title":"Your current plan does not include Call","action":{"title":"Get Call add-ons now","action":"switchTab/addOn"}}]},{"icon":"https://odpapp.asiacell.com/img/icon/remaining_sms.png","tag":"sms","type":"giftBox","inverted":true,"title":"Remaining SMS","items":[{"title":"Your current plan does not include SMS","action":{"title":"Get SMS add-ons now","action":"switchTab/addOn"}}]}]},"success":true,"message":"Success"}

    }

    public function check_Token($token)
    {
//if its expired or not accepted from the server

        $expire_date = Carbon::createFromTimestamp(
            json_decode(
            base64_decode(
                explode(".", $token)[1]
            )
        )->exp);
        if ($expire_date > Carbon::now()) {


            $request = Http::withToken($token)->withHeaders([

                'Origin' => 'https://odpapp.asiacell.com',
                'Accept' => '*/*',
                'User-Agent' => 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36'])->withOptions(['verify' => false])
                ->get('https://odpapp.asiacell.com/api/v1/profile');
            $response =$request ;

            if ($response['message'] === "Access Denied") {
                return false;
            } elseif ($response['message'] === "Success") {

                return true;

            }

        }


        return false;

        // return boolean flag or whatever the json returns
    }



}

//{
//    "access_token": "eyJhbGciOiJIUzUxMiJ9.eyJ1c2VybmFtZSI6IjA3NzI0OTMyNDM3IiwiZXhwIjoxNjU2ODcwNjc0fQ.mXs61I6ZRmVsl41qQho65TF6xMSInzTY2JnEGQCZyJnUyXx96U28pgHHuK0eiihv1ep0kqswyeMDA5e025N9Ew",
//    "refresh_token": "eyJhbGciOiJIUzUxMiJ9.eyJ0eXBlIjoicmVmcmVzaFRva2VuIiwidXNlcm5hbWUiOiIwNzcyNDkzMjQzNyIsImV4cCI6MTY2MTk2ODI3NH0.Gyc2EO5dC11R7agVnNZIJZ3SPa9qBdvaXffcZInkqWkaNxoNVO2e9gz0Mc2Zn0XeBzsMY-TKh6nZnmqPRsiX_Q",
//    "success": true,
//    "message": "Refreshed successfully",
//    "userId": 2119015,
//    "username": "07724932437"
//}
