<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicineallocation extends Model
{
    use HasFactory;
    public $table ="medicineallocation";
    public $timestamps=false;
    public $primarykey="medicineallocation_id";
}
