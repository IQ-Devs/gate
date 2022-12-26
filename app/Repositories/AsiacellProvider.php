<?php

namespace App\Repositories;

use App\Interfaces\CellProviderInterface;
use App\Models\Authcore;
use Illuminate\Support\Facades\Http;

class AsiacellProvider implements CellProviderInterface
{
    public Authcore $authcore;
    public function __construct(Authcore $authcore)
    {
        $this->authcore=$authcore;
    }

    public function Balance()
    {
        $request = Http::withToken($this->authcore->access_token)->withHeaders([
            'Origin' => 'https://odpapp.asiacell.com',
            'Accept' => '*/*',
            'User-Agent' => 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36', ])->withOptions(['verify' => false])
            ->get('https://odpapp.asiacell.com/api/v1/profile');

        $balance = json_decode($request);

//        return $balance->data->bodies[1]->items[0]->value;
        return $balance->data->bodies[1]->items[0]->value;
//        {"data":{"headers":null,"bodies":[{"groupId":0,"action":"open/uploadProfile","type":"profile","title":"Account overview","items":[{"name":"ابراهيم  قحطان","phoneNumber":"07724932437","photo":null}]},{"groupId":0,"action":"","type":"balance","title":"YOUR PREPAID BALANCE","items":[{"value":1135.25,"actionButton":{"title":"RECHARGE","action":"navigate/recharge"}}]},{"icon":"https://odpapp.asiacell.com/img/icon/remaining_data.png","tag":"data","type":"giftBox","inverted":true,"title":"Remaining Data","items":[{"title":"Your current plan does not include Data","action":{"title":"Get Data add-ons now","action":"switchTab/addOn"}}]},{"icon":"https://odpapp.asiacell.com/img/icon/remaining_call.png","tag":"call","type":"giftBox","inverted":true,"title":"Remaining Call","items":[{"title":"Your current plan does not include Call","action":{"title":"Get Call add-ons now","action":"switchTab/addOn"}}]},{"icon":"https://odpapp.asiacell.com/img/icon/remaining_sms.png","tag":"sms","type":"giftBox","inverted":true,"title":"Remaining SMS","items":[{"title":"Your current plan does not include SMS","action":{"title":"Get SMS add-ons now","action":"switchTab/addOn"}}]}]},"success":true,"message":"Success"}
    }
}
