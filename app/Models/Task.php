<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, $attributes): void
    {
        if ($selectedProject = $attributes['selected_project'] ?? false) {
            $query->where('project_id', $selectedProject);
        }
    }
}
