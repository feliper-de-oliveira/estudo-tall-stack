<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


/**
 * @property string $name
 * @property string $phone
 * @property string $strenght
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Participant extends Model
{

    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'name',
        'phone',
        'strenght',
    ];
}
