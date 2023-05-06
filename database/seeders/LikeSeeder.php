<?php

namespace Database\Seeders;

use App\Models\Prefecture;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $prefectures = Prefecture::all();
        // foreach($users as $user){
        //     [

        //     ]
        // }
    }
}
