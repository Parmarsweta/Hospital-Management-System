<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patientbilling extends Model
{
    use HasFactory;
    public $table="patientbilling";
    public $timestamps=false;
    public $primarykey="patientbilling_id";
}
