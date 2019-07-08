<?php
namespace App\School;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name', 'logo', 'auth_endpoint'
    ];
}