<?php

namespace App\Repositories;

use App\Models\Attribute;
use App\Repositories\BaseRepository;

/**
 * Class AttributeRepository
 * @package App\Repositories
 * @version October 22, 2019, 4:49 am UTC
*/

class AttributeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'feature'
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
        return Attribute::class;
    }
}
