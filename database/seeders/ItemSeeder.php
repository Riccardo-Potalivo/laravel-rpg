<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/items.json');
        $items = json_decode($json, true);

        foreach ($items as $itemData) {
            $item = new Item();
            $item->name = $itemData['name'];
            $item->attack = rand(2, 9);
            $item->img = $itemData['image'];
            $item->slug = Str::slug($itemData['name'] . '-');
            $item->category = $itemData['category'];
            $item->type = $itemData['type'];
            $item->weight = $itemData['weight'];
            $item->cost = $itemData['cost'];
            $item->save();
        }
    }
}
