<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaminan extends Model
{
    use HasFactory;

    protected $table = 'jaminan';

    protected $fillable = [
        'letter_no',
        'letter_date',
        'sender_name',
        'sender_position',
        'sender_address',
        'shm_number',
        'shm_area',
        'shm_location',
        'shm_owner',
    ];
}
