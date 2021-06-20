<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Branch
 * @package App\Models
 *
 * @OA\Schema()
 */
class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['abbreviation', 'name', 'is_civilian'];

    /**
     * Abbreviation
     * @var string
     * @OA\Property(
     *     property="abbreviation",
     *     type="string",
     *     description="The abbreviated version of the branch's name"
     * )
     */

    /**
     * Name
     * @var string
     * @OA\Property(
     *     property="name",
     *     type="string",
     *     description="The full name of the branch"
     * )
     */

    /**
     * Is civilian?
     * @var boolean
     * @OA\Property(
     *     property="is_civilian",
     *     type="boolean",
     *     description="Is this branch a civilian branch?"
     * )
     */

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function shipClasses()
    {
        return $this->belongsToMany(ShipClass::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
