<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'due_date', 'completed'];

    protected $dates = ['due_date'];
    protected $casts = [
        'due_date' => 'datetime',
        'completed' => 'boolean'
    ];
}
