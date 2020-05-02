<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

/**
 * Class Product
 * @package App\Models
 * @version February 26, 2020, 7:04 am UTC
 *
 * @property string title
 * @property string description
 * @property string expiry_time
 * @property number price
 * @property string price_negotiable
 * @property string condition
 * @property string used_for
 * @property string delivery
 * @property string delivery_area
 * @property number delivery_charge
 * @property string warranty_period
 * @property string featured_image
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'slug',
        'product_code',
        'description',
        'expiry_time',
        'price',
        'condition',
        'used_for',
        'delivery',
        'delivery_area',
        'delivery_charge',
        'warranty_period',
        'featured_image',
        'status',
        'views',
        'likes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'slug'=>'string',
        'product_code'=>'string',
        'price' => 'double',
        'price_negotiable' => 'string',
        'condition' => 'string',
        'delivery' => 'string',
        'delivery_area' => 'string',
        'delivery_charge' => 'double',
        'warranty_period' => 'string',
        'featured_image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function attribute()
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value')->withTimestamps();
    }
    public function sub_category()
    {
        return $this->belongsToMany(SubCategory::class,'product_sub_category');
    }

}
