<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blokir extends Model
{
    use HasFactory;

    protected $table = 'blokir';

    protected $fillable = [
        'letter_no',
        'letter_date',
        'lamp',
        'regarding',
        'recipient_name',
        'recipient_address',
        'sender_name',
        'sender_position',
        'sender_address',
        'vehicle_details',
        'cc',
    ];
}
