<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $guarded = [];

    protected $attributes = [
        'notes' => 'Add project notes here.'
    ];


    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($attributes)
    {
        return $this->tasks()->create($attributes);
    }

    public function updateTask($attributes)
    {
        return $this->tasks()->update($attributes);
    }

}
