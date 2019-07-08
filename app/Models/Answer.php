<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answer', 'question_id', 'user_id', 'body'
    ];

    public function comments() {
        $this->morphMany(Comment::class, 'commentable');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}