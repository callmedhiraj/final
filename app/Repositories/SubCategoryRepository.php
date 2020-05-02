<?php

namespace App\Repositories;

use App\Models\SubCategory;
use App\Repositories\BaseRepository;

/**
 * Class SubCategoryRepository
 * @package App\Repositories
 * @version February 26, 2020, 6:35 am UTC
*/

class SubCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SubCategory::class;
    }
}
