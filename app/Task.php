<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'user_id', 'task_name', 'due_date',
    ];

    
    public function users(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
