<?php
namespace App\Models;

use App\Enums\Rolse;
use App\Enums\Year;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'role',
        'academic_level',
        'GPA',
        'phone',
        'address',
        'email',
        'department_id',
        'password',
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
        'email_verified_at' => 'datetime',
        'academic_level' => Year::class,


    ];


    public function department()
    {
        return $this->belongsTo(departmentModel::class);
    }

    /**
     * Check if the user has a specific role.
     *
     * @param  Rolse  $role
     * @return bool
     */
    public function hasRole(Rolse $role): bool
    {
        return $this->role === $role->value;
    }
    public function userCourses()
    {
        return $this->hasMany(user_course::class);
    }

}




?>