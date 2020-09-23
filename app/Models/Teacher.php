<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Person;
use App\Scopes\TeacherScope;

class Teacher extends Person
{
    use HasFactory;
    protected $table = 'person';
    protected $guarded = ['id', 'role', 'created_at', 'updated_at'];

    protected static function booted()
    {
        static::addGlobalScope(new TeacherScope);
    }

    public static function truncate()
    {
        self::query()->delete();
    }
}
