<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    public $table = 'reviews';


    protected $dates = ['deleted_at','date'];



    public $fillable = [
        'user_id',
        'product_id',
        'description',
        'date',
        'rating'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
