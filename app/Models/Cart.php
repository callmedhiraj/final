<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cart
 * @package App\Models
 * @version April 26, 2020, 7:41 am UTC
 *
 * @property integer product_id
 * @property integer user_id
 * @property integer quantity
 * @property integer total_amt
 * @property integer status
 */
class Cart extends Model
{
    use SoftDeletes;

    public $table = 'carts';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'total_amt',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'user_id' => 'integer',
        'quantity' => 'integer',
        'total_amt' => 'double',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
