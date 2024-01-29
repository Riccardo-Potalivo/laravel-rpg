<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'player_count_win',
        'computer_count_win',
        'computer_name',
        'player_name',
        'game'
    ];
}
