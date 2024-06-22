<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'is_finished',
        'department_id'
    ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
