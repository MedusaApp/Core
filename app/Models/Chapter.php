<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chapter
 * @package App\Models
 *
 * @OA\Schema()
 */
class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_active', 'chapter_type_id', 'hull_number', 'is_joinable', 'ship_class_id', 'branch_id', 'chapter_id', 'commission_date', 'decommission_date'];

    /**
     * Name
     * @var string
     * @OA\Property(
     *     property="name",
     *     type="string",
     *     description="The name of the chapter"
     * )
     */

    /**
     * Is active?
     * @var boolean
     * @OA\Property(
     *     property="is_active",
     *     type="boolean",
     *     description="Is this chapter active?"
     * )
     */

    /**
     * Chapter Type
     * @var string
     * @OA\Property(
     *     property="chapter_type_id",
     *     type="integer",
     *     description="The type of chapter"
     * )
     */

    /**
     * Hull Number
     * @var string
     * @OA\Property(
     *     property="hull_number",
     *     type="string",
     *     description="The hull number for the chapter"
     * )
     */

    /**
     * Is joinable?
     * @var boolean
     * @OA\Property(
     *     property="is_joinable",
     *     type="boolean",
     *     description="Is this chapter joinable?"
     * )
     */

    /**
     * Ship Class
     * @var string
     * @OA\Property(
     *     property="ship_class_id",
     *     type="integer",
     *     description="The ship class for the chapter"
     * )
     */

    /**
     * Branch
     * @var integer
     * @OA\Property(
     *     property="branch_id",
     *     type="integer",
     *     description="The branch that the chapter belongs to"
     * )
     */

    /**
     * Parent Chapter
     * @var integer
     * @OA\Property(
     *     property="chapter_id",
     *     type="integer",
     *     description="If this belongs to another chapter, this is its ID"
     * )
     */

    /**
     * Commission Date
     * @var string
     * @OA\Property(
     *     property="commission_date",
     *     type="string",
     *     description="The date the chapter was commissioned on"
     * )
     */

    /**
     * Decommission Date
     * @var string
     * @OA\Property(
     *     property="decommission_date",
     *     type="string",
     *     description="The date the chapter was decommissioned on"
     * )
     */

    public function members()
    {
        return $this->hasMany(User::class, 'chapter_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function children()
    {
        return $this->hasMany(Chapter::class, 'chapter_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function parent()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }

    public function shipClass()
    {
        return $this->belongsTo(ShipClass::class);
    }

    public function chapterType()
    {
        return $this->belongsTo(ChapterType::class);
    }
}
