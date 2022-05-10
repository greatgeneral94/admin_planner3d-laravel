<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BplannerVersion extends Model
{
    use HasFactory;
    public function planner()
    {
        return $this->hasOne(Planner::class,"id","planner_id");
    }
}
