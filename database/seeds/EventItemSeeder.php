<?php

use Illuminate\Database\Seeder;

class EventItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\EventItem::class, 5)->create();
    }
}
