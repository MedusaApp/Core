<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShipClass
 * @package App\Models
 *
 * @OA\Schema()
 */
class ShipClass extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image_url', 'crew_max', 'crew_min', 'officer_min', 'type_order', 'ship_type_id'];

    /**
     * Name
     * @var string
     * @OA\Property(
     *     property="name",
     *     type="string",
     *     description="The full name of the ship class"
     * )
     */

     /**
     * Image URL
     * @var string
     * @OA\Property(
     *     property="image_url",
     *     type="string",
     *     description="A URL to an image of the ship class"
     * )
     */

    /**
     * Crew Max
     * @var integer
     * @OA\Property(
     *     property="crew_max",
     *     type="integer",
     *     description="The maximum crew"
     * )
     */

    /**
     * Crew Min
     * @var integer
     * @OA\Property(
     *     property="crew_min",
     *     type="integer",
     *     description="The minimum crew"
     * )
     */

    /**
     * Officer Min
     * @var integer
     * @OA\Property(
     *     property="officer_min",
     *     type="integer",
     *     description="The minimum officer count"
     * )
     */

    /**
     * Type Order
     * @var integer
     * @OA\Property(
     *     property="type_order",
     *     type="integer",
     *     description="The type order"
     * )
     */

    /**
     * Ship Type ID
     * @var integer
     * @OA\Property(
     *     property="ship_type_id",
     *     type="integer",
     *     description="The ID of the ship type"
     * )
     */
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function shipType()
    {
        return $this->belongsTo(ShipType::class);
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }
}
