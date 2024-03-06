<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    use HasFactory;
    public $table ="roomtype";
    public $timestamps = false;
    public $primarykey = "roomtype_id";
}