<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'type_id', 'attack', 'defence', 'speed', 'life', 'img', 'user_id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
