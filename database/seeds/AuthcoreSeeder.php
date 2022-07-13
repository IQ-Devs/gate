<?php
namespace Database\Seeders;

use App\Authcore;
use Illuminate\Database\Seeder;
use App\Http\Traits\Asiacell;

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
        $phonenumber='07724932437';
        $response= $this->login($phonenumber);
        $phone= \App\Authcore::where('Phone',$phonenumber)->first();
        //  for test only need fix default value UsageLimit/Pid/DeviceId..etc and the number should be already registered
        if ($phone === null) {
            $phone = new Authcore();
            $phone->Phone =$phonenumber;
            $phone->UsageLimit =0;
            $phone->Pid =0;
            $phone->DeviceId =0;
            $phone->access_token =0;
            $phone->refresh_token =0;
            $phone->save();
        }
        $phone->Pid =$response['pid'];
        $phone->DeviceId =$response['fake_id'];
        $phone->save();
        return $phone;
    }




}
