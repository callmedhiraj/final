<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRepository
 * @package App\Repositories
 * @version August 17, 2019, 12:26 am UTC
*/

class PermissionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return Permission::class;
    }
}
