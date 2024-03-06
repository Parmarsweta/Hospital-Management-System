<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ward extends Model
{
    use HasFactory;
    public $table ="ward";
    public $timestamps = False ;
    public $primarykey = "ward_id";

}
