<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChapterType
 * @package App\Models
 *
 * @OA\Schema()
 */
class ChapterType extends Model
{
    use HasFactory;

    protected $fillable = ['has_command_triad', 'name', 'slug'];

    /**
     * Has Command Triad
     * @var boolean
     * @OA\Property(
     *     property="has_command_triad",
     *     type="boolean",
     *     description="Whether this chapter type has a command triad or not"
     * )
     */

    /**
     * Name
     * @var string
     * @OA\Property(
     *     property="name",
     *     type="string",
     *     description="The full name of the chapter type"
     * )
     */

    /**
     * Slug
     * @var string
     * @OA\Property(
     *     property="slug",
     *     type="string",
     *     description="The slug of the chapter type"
     * )
     */

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
