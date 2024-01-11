<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

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
            $item->description = $itemData['description'];
            $item->slug = $itemData['slug'];
            $item->category = $itemData['category'];
            $item->type = $itemData['type'];
            $item->weight = $itemData['weight'];
            $item->cost = $itemData['cost'];
            $item->save();
        }
    }
}