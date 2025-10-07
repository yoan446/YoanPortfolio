<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Technologie extends Model
{
    //
    use HasFactory;
     protected $fillable = [
        'tech_name'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'tech_projects');
    }

}
