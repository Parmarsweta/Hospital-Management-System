<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bed extends Model
{
    use HasFactory;
    public $table ="bed";
    public $timestamps =false;
    public $primarykey ="bed_id";
    
}
