<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    public $table="doctor";
    public $timestamps=false;
    public $primarykey ="doctor_id";

}
