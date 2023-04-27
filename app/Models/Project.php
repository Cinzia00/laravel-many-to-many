<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'project_image',
        'project_id'
    ];

    public function type() {
        return $this->belongsTo(Type::class, 'project_id');
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }

    public function getTechnologiesIds() {
        return $this->technologies->pluck('id')->all();
    }
}
