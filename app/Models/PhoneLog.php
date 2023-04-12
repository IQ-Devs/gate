<?php

namespace App\Models;

use App\Enums\Phone\ChargeTransactionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneLog extends Model
{
    use HasFactory;

    protected $fillable =['chargeStatus'];
    protected $casts=[
        'ChargeStatus'=>ChargeTransactionStatus::class,

    ];
    public function loggable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
    return $this->morphTo();
    }

    public function authcore(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Authcore::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
