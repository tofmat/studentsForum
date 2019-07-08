<?php

namespace App\Models;

use App\School\School;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname', 'other_names',  'password', 'reg_no', 'school_id', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function buildProfileData() {
        $data = [
            'surname' => $this->surname,
            'other_names' => $this->other_names,
            'school' => $this->school->name,
            'reg_no' => $this->reg_no,
            'courses' => UsersCourse::where('user_id', '=', $this->id)->get()
        ];
        return $data;
    }

    public function getCourses() {
        $courseIds = UsersCourse::where('user_id', $this->id)->get();
        if ($courseIds != null) {
            $courseIds = $courseIds->pluck('course_id');
            return Course::whereIn('id', $courseIds)->get();
        }
    }
}
