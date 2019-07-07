<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $appends = ['user', 'answer_count'];

    protected $fillable = [
        'title',
        'brief',
        'user_id',
        'course_id',
        'school_id'
    ];

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function getUserAttribute() {
        return User::find($this->user_id);
    }

    public function getAnswerCountAttribute() {
        return 5;
    }
}