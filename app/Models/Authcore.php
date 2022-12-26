<?php

namespace App\Models;

use App\Enums\Phone\ChargeType;
use App\Enums\Phone\PhoneStatus;
use App\Enums\Phone\Provider;
use App\Http\Traits\Asiacell;
use App\Interfaces\CellProviderInterface;
use App\Repositories\AsiacellProvider;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;


class Authcore extends Model
{
    use Asiacell;
    protected $casts=[
        'ChargeType'=>ChargeType::class,
        'Status'=>PhoneStatus::class,
        'Provider'=>Provider::class
    ];
    //return register this-> access_token/ refresh_token
    public function RefreshToken(): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        $response = $this->refresh_Token($this->refresh_token);
        $this->refresh_token = $response['refresh_token'];
        $this->access_token = $response['access_token'];
        $this->save();
        return $response;
    }

    public function checkToken(): bool
    {
        logger('this token used'.$this->access_token);

        return $this->check_Token($this->access_token);
    }

    public function logs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PhoneLog::class);
    }

    /**
     * @throws BindingResolutionException
     */
    public function getProvider(): CellProviderInterface
    {
        return match ($this->Provider) {
            Provider::Asiacell => app()->makeWith(AsiacellProvider::class,['authcore'=>$this]),//going to use enum here
            default => throw new InvalidArgumentException("[{$this->Provider}] is an invalid provider"),
        };
    }
}
