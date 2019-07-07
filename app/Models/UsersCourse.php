<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersCourse extends Model
{
    protected $appends = ['code', 'title'];
    
    protected $fillable = [
        'user_id', 'course_id'
    ];

    public function getCodeAttribute() {
        return Course::find($this->course_id)
            ->code;
    }
    public function getTitleAttribute() {
        return Course::find($this->course_id)
            ->title;
    }
}