<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = ['勉強する','ゲームする','買い物する'];
        foreach($contents as $content){
            DB::table('todos')->insert([
            'content' => $content,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
            ]);
        }
    }
}