<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    public $table = "room";
    public $timestamps =false;
    public $primarykey = "room_id";
}
