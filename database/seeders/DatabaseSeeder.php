<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 外部キー制約のチェックを無効
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        \App\Models\Like::truncate();
        \App\Models\User::truncate();
        \App\Models\Prefecture::truncate();

        // 外部キー制約のチェックを再度有効
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $this->call([
            PrefectureSeeder::class,
        ]);
    }
}
