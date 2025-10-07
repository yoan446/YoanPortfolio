<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Project extends Model
{
     use HasFactory;
    //table du projet
    protected $fillable = [
        'title',
        'description',
        'github_link',
        'image',
    ];

    public function technologies()
    {
        return $this->belongsToMany(Technologie::class, 'tech_projects', 'project_id', 'technology_id');
    }

}
