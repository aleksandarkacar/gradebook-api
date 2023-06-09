<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gradebook extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public static function scopeSearchByName($query, $name)
    {
        if (!$name) {
            return $query;
        }
        return $query->where('name', 'like', "%$name%");
    }
}
