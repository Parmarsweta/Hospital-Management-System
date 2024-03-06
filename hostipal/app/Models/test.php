<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;
    public $table ="test";
    public $timestamps =false;
    public $primarykey ="test_id";
}
