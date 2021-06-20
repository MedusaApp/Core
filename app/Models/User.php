<?php

namespace App\Models;

use App\Permissions\HasPermissionsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @package App\Models
 *
 * @OA\Schema()
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasFactory;
    use HasPermissionsTrait;

    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $with = ['branch', 'chapter'];

    /**
     * First name
     * @var string
     * @OA\Property(
     *     property="first_name",
     *     type="string",
     *     description="First name"
     * )
     */

    /**
     * Middle name
     * @var string
     * @OA\Property(
     *     property="middle_name",
     *     type="string",
     *     description="Middle name"
     * )
     */

    /**
     * Last name
     * @var string
     * @OA\Property(
     *     property="last_name",
     *     type="string",
     *     description="Last name"
     * )
     */

    /**
     * Phone number
     * @var string
     * @OA\Property(
     *     property="phone_number",
     *     type="string",
     *     description="Phone number"
     * )
     */

    /**
     * Date of birth
     * @var string
     * @OA\Property(
     *     property="date_of_birth",
     *     type="string",
     *     description="Date of birth, in yyyy-mm-dd format"
     * )
     */

    /**
     * Address line one
     * @var string
     * @OA\Property(
     *     property="address_line_1",
     *     type="string",
     *     description="Address line one"
     * )
     */

    /**
     * Address line two
     * @var string
     * @OA\Property(
     *     property="address_line_2",
     *     type="string",
     *     description="Address line two"
     * )
     */

    /**
     * City
     * @var string
     * @OA\Property(
     *     property="city",
     *     type="string",
     *     description="City"
     * )
     */

    /**
     * Province or state
     * @var string
     * @OA\Property(
     *     property="province_or_state",
     *     type="string",
     *     description="Province or state"
     * )
     */

    /**
     * Postal code
     * @var string
     * @OA\Property(
     *     property="postal_code",
     *     type="string",
     *     description="Postal code"
     * )
     */

    /**
     * Country
     * @var string
     * @OA\Property(
     *     property="country",
     *     type="string",
     *     description="Country"
     * )
     */

    /**
     * Is active?
     * @var boolean
     * @OA\Property(
     *     property="is_active",
     *     type="boolean",
     *     description="Is active?"
     * )
     */

    /**
     * Email address
     * @var string
     * @OA\Property(
     *     property="email",
     *     type="string",
     *     description="Email address"
     * )
     */

    /**
     * Password
     * @var string
     * @OA\Property(
     *     property="password",
     *     type="string",
     *     description="Password"
     * )
     */

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Branch ID
     * @var integer
     * @OA\Property(
     *     property="branch_id",
     *     type="integer",
     *     description="ID of the branch the user belongs to"
     * )
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Chapter ID
     * @var integer
     * @OA\Property(
     *     property="chapter_id",
     *     type="integer",
     *     description="ID of the chapter the user belongs to"
     * )
     */
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
