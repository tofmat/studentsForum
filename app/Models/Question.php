<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $appends = ['user', 'answer_count', 'course'];

    protected $fillable = [
        'title',
        'brief',
        'user_id',
        'course_id',
        'school_id'
    ];

    public function comments() {
        $this->morphMany(Comment::class, 'commentable');
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function getUserAttribute() {
        return User::find($this->user_id);
    }

    public function getAnswerCountAttribute() {
        return Answer::where('question_id', $this->id)->count();
    }

    public function getCourseAttribute() {
        return Course::find($this->course_id);
    }
}