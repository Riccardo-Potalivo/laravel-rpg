<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'attack', 'category', 'type', 'weight', 'cost', 'img', 'user_id'];

    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getSlug($name)
    {
        $slug = Str::of($name)->slug('-');
        $count = 1;

        while (Item::where("slug", $slug)->first()) {
            $slug = Str::of($name)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }
}
