<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patientdischarge extends Model
{
    use HasFactory;
    public $table="patientdischarge";
    public $timestamps=false;
    public $primarykey="patientdischarge_id";
}
