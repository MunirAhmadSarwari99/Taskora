<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'priority',
        'deadline',
        'reminder',
        'attachment',
        'is_completed',
        'is_archived',
    ];
    protected $casts = [
        'deadline' => 'datetime',
        'reminder' => 'datetime',
        'is_completed' => 'boolean',
        'is_archived' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
