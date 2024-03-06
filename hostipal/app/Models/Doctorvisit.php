<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorvisit extends Model
{
    use HasFactory;
    public $table ="doctorvisit";
    public $timestamps =false;
    public $primarykey="doctorvisit_id";
}
