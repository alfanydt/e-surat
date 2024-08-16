<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    protected $table = 'daftar';

    protected $fillable = [
        'letter_no',
        'letter_date',
        'location',
        'regarding',
        'attachment',
        'recipient_name',
        'recipient_address',
        'sender_name',
        'sender_position',
        'sender_address',
        'collateral_description',
        'auction_date',
        'cc',
    ];
}
