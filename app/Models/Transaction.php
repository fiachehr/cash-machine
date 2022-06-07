<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Requests
 *
 * @property char $type
 * @property json $data
 * @property float $amount
 * @property int $ts_register
 *
 */
class Transaction extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'type',
        'data',
        'amount',
        'ts_register',
    ];
}
