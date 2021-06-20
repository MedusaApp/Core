<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShipType
 * @package App\Models
 *
 * @OA\Schema()
 */
class ShipType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'abbreviation'];

    /**
     * Abbreviation
     * @var string
     * @OA\Property(
     *     property="abbreviation",
     *     type="string",
     *     description="The abbreviated version of the ship type's name"
     * )
     */

    /**
     * Name
     * @var string
     * @OA\Property(
     *     property="name",
     *     type="string",
     *     description="The full name of the ship type"
     * )
     */

    public function shipClasses() {
        return $this->hasMany(ShipClass::class);
    }
}
