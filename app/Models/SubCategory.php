<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SubCategory
 * @package App\Models
 * @version February 26, 2020, 6:35 am UTC
 *
 * @property string name
 * @property string slug
 */
class SubCategory extends Model
{
    use SoftDeletes;

    public $table = 'sub_categories';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class,'category_subcategory');
    }
    public function attributes(){
        return $this->belongsToMany(Attribute::class,'attribute_sub_category');
    }
    public function product()
    {
        return $this->belongsToMany(Product::class,'product_sub_category');
    }
}
