<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;
    public $table ="staff";
    public $timestamps=false;
    public $primarykey="staff_id";
}
