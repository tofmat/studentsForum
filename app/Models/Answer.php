<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $appends = ['author'];

    protected $fillable = [
        'answer', 'user_id', 'question_id'
    ];

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getAuthorAttribute() {
        return User::find($this->user_id);
    }
}