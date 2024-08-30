<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $table = 'sewa';

    protected $fillable = [
        'letter_no',
        'letter_date',
        'first_party_name',
        'first_party_address',
        'first_party_nik',
        'second_party_name',
        'second_party_address',
        'second_party_position',
        'second_party_nik',
        'vehicle_type',
        'vehicle_brand',
        'vehicle_model',
        'vehicle_year',
        'vehicle_color',
        'vehicle_engine_size',
        'vehicle_frame_no',
        'vehicle_engine_no',
        'vehicle_bpkb_no',
        'vehicle_plate_no',
        'vehicle_owner',
        'vehicle_owner_address',
    ];
}
