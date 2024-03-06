<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicinetype extends Model
{
    use HasFactory;
    public $table ="medicinetype";
    public $timestamps =false;
    public $primarykey ="medicinetype_id";
}
