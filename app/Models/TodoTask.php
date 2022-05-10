<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoTask extends Model
{
    use HasFactory;
    public function assign_to_user()
    {
        return $this->hasOne(User::class,"id","assign_to");
    }
    public function assign_by_user()
    {
        return $this->hasOne(User::class,"id","assign_by");
    }
}
