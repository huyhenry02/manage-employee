<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

    public const STATUS = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_EMPLOYEE => 'Employee',
    ];

    public const ROLE_ADMIN = 'admin';
    public const ROLE_EMPLOYEE = 'employee';

    public const ROLE = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_EMPLOYEE => 'Employee',
    ];

    protected $fillable = [
        'email',
        'code',
        'email_verified_at',
        'password',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'contact_info',
        'address',
        'date_joined',
        'status',
        'role_type',
        'position_id',
        'department_id'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class, 'user_id');
    }

    public function reports(): HasMany
    {
        return $this->hasMany(EmployeePerformance::class, 'employee_id');
    }
}
