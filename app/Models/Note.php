<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{


    use HasFactory;
    use SoftDeletes;
    protected $table = 'notes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'message',
    ];
    protected $dates = [
        'deleted_at',
    ];
}
