<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * @package App\Models
 *
 * @OA\Schema()
 */
class Permission extends Model
{
    use HasFactory;

    /**
     * Name
     * @var string
     * @OA\Property(
     *     property="name",
     *     type="string",
     *     description="Permission name"
     * )
     */

    /**
     * Slug
     * @var string
     * @OA\Property(
     *     property="slug",
     *     type="string",
     *     description="Unique identifying slug for the permission"
     * )
     */

    public function roles() {
        return $this->belongsToMany(Role::class,'roles_permissions');
     }
}
