<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'subscriptions';

    protected $primaryKey = 'id';

    protected $fillable = [
       'user_id', 'name', 'stripe_id', 'stripe_status', 'stripe_price', 'quantity','trial_ends_at', 'ends_at'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
}
