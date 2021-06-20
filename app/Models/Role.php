<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models
 *
 * @OA\Schema()
 */
class Role extends Model
{
    use HasFactory;

    /**
     * Name
     * @var string
     * @OA\Property(
     *     property="name",
     *     type="string",
     *     description="Role name"
     * )
     */

    /**
     * Slug
     * @var string
     * @OA\Property(
     *     property="slug",
     *     type="string",
     *     description="Unique identifying slug for the role"
     * )
     */

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
