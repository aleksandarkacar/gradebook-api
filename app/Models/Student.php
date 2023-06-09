<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['gradebook_id', 'first_name', 'last_name', 'img_url'];

    public function gradebook(): BelongsTo
    {
        return $this->belongsTo(Gradebook::class);
    }
}
