<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionItem extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'subscription_items';

    protected $primaryKey = 'id';

    protected $fillable = [
      'subscription_id', 'stripe_id', 'stripe_product', 'stripe_price', 'quantity'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
}
