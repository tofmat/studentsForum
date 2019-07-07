<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'school_id', 'code', 'title', 'description'
    ];

    public static function findByCode($code) {
        return Course::where('code', '=', $code)
            ->get()->first();
    }
}