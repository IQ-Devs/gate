<?php

namespace Database\Seeders;

use App\Models\Authcore;
use App\Http\Traits\Asiacell;
use App\Models\PhoneLog;
use App\Models\PhoneTransferLog;
use Illuminate\Database\Seeder;

class AuthcoreSeeder extends Seeder
{
    use Asiacell;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phonenumber = '07724932437';
        $response = $this->login($phonenumber);
        $phone = \App\Models\Authcore::where('Phone', $phonenumber)->first();
        //  for test only need fix default value UsageLimit/Pid/DeviceId..etc and the number should be already registered
        if ($phone === null) {
            $phone = new Authcore();
            $phone->Phone = $phonenumber;
            $phone->UsageLimit = 0;
            $phone->Pid = 0;
            $phone->DeviceId = 0;
            $phone->access_token = 0;
            $phone->refresh_token = 0;
            $phone->save();
        }
        $phone->Pid = $response['pid'];
        $phone->DeviceId = $response['fake_id'];
        $phone->save();

         $log = new PhoneLog();
         $log->authcore_id =1;
         $log->chargeStatus =2;
         $log->user_id =1;
         $log->loggable_id =1;
         $log->loggable_type = "App\Models\PhoneTransferLog";
         PhoneTransferLog::create([
             'user_phone'=>1,
             'Comments'=>1,
             'TransValue'=>1,
             'BalanceBefore'=>1,

         ]);

         $log->save();
        return $phone;
    }
}
