<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Attribute
 * @package App\Models
 * @version October 22, 2019, 4:49 am UTC
 *
 * @property integer feature
 */
class Attribute extends Model
{
    use SoftDeletes;

    public $table = 'attributes';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'feature'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'feature' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'feature'=>'required',
    ];

    public function subcategories(){
        return $this->belongsToMany(SubCategory::class,'attribute_sub_category');
    }
    public function product()
    {
        return $this->belongsToMany(Product::class)->withPivot('value')->withTimestamps();
    }

}
