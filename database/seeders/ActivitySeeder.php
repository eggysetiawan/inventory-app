<?php

namespace Database\Seeders;

use App\Models\Activity;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::factory()->count(1000)->create();
    }
}
