<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patienttest extends Model
{
    use HasFactory;
    public $table="patienttest";
    public $timestamps=false;
    public $primarykey="patienttest_id";
}
