<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;
use App\Models\Item;
use Illuminate\Support\Str;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/characters.json');
        $data = json_decode($json, true);
        $items = Item::all();

        foreach ($data as $item) {
            $new_character = new Character();
            $new_character->name = $item["name"];
            $new_character->slug = Str::slug($item['name'] . '-');
            $new_character->description = $item["description"];
            $new_character->type_id = $item["type_id"];
            $new_character->attack = $item["attack"];
            $new_character->defence = $item["defence"];
            $new_character->speed = $item["speed"];
            $new_character->life = $item["life"];

            $new_character->save();
            $new_character->items()->sync($items->pluck('id')->random(2));
        }

    }
}
