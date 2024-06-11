<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Models\Log;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('logs')->insert([
            'project_id' => 13,
            'items'=> 0,
            'duration'=> 0.20,
            'started_at'=> new \DateTime('now'),
            'finished_at' => new \DateTime('now'),
            'applied_to_all_times' =>null,
            'user_id' =>null,
            'rules' => null,
            'created_at' =>null,
            'updated_at'=> null,
        ]);

        Log::factory()->count(100)->create();
    }
}
