<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 *
 * User model representing a system user.
 */
class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'UserID';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Username',
        'password',
        'Email',
        'RoleID'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'Email_verified_at' => 'datetime',
    ];

    /**
     * Define the relationship with the Role model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'RoleID');
    }

    /**
     * Constants representing user roles.
     */
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_CAREER_HEAD = 'ROLE_CAREER_HEAD';
    const ROLE_CLUB_LEADER = 'ROLE_CLUB_LEADER';
    const ROLE_STUDENT = 'ROLE_STUDENT';

    /**
     * Hierarchy of user roles to define role permissions.
     */
    private const ROLES_HIERARCHY = [
        self::ROLE_ADMIN => [self::ROLE_CAREER_HEAD],
        self::ROLE_CAREER_HEAD => [self::ROLE_CLUB_LEADER],
        self::ROLE_CLUB_LEADER => [self::ROLE_STUDENT],
        self::ROLE_STUDENT => []
    ];

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
     * Check if the user has a specific role or is in its hierarchy.
     *
     * @param string $role
     * @return bool
     */
    public function isGranted($role)
    {
        return $role === $this->role->RoleName ||
            self::isRoleInHierarchy($role, self::ROLES_HIERARCHY[$this->role->RoleName]);
    }

    /**
     * Check if a role is in the hierarchy of another role.
     *
     * @param string $role
     * @param array $role_hierarchy
     * @return bool
     */
    private static function isRoleInHierarchy($role, $role_hierarchy)
    {
        if (in_array($role, $role_hierarchy)) {
            return true;
        }

        foreach ($role_hierarchy as $role_included) {
            if (
                isset(self::ROLES_HIERARCHY[$role_included]) &&
                self::isRoleInHierarchy($role, self::ROLES_HIERARCHY[$role_included])
            ) {
                return true;
            }
        }

        return false;
    }
}
