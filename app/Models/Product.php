<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'price', 'description','status'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public static function boot() {
        parent::boot();

        static::creating(function($model) {
            $model->uuid = generate_uuid();
            $model->created_by = 1;
        });

        static::creating(function($model) {
            $model->updated_by = 1;
        });
        
    }
}
