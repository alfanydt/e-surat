<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;

    protected $table = 'lembur';

    protected $fillable = [
        'letter_date',
        'recipient',
        'address',
        'sender_name',
        'sender_position',
        'overtime_reason',
        'employee_details',
        'approval1',
        'approval1_position',
        'approval2',
        'approval2_position',
        'approval3',
        'approval3_position',
    ];
}
