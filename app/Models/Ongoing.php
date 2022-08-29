<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ongoing extends Model
{
    protected $fillable = [
        'username',
        "identifier",
        "testnumber",
        "points",
        "currentquestion",
        "questionlist",
        "statistics"
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];
}
