<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $prefectures = [
                ['name' => '沖縄県', 'latitude' => '26.212', 'longitude' => '127.681', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '鹿児島県', 'latitude' => '31.560', 'longitude' => '130.558', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '宮崎県', 'latitude' => '31.911', 'longitude' => '131.424', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '長崎県', 'latitude' => '32.745', 'longitude' => '129.874', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '熊本県', 'latitude' => '32.790', 'longitude' => '130.742', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '大分県', 'latitude' => '33.238', 'longitude' => '131.613', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '佐賀県', 'latitude' => '33.249', 'longitude' => '130.300', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '高知県', 'latitude' => '33.560', 'longitude' => '133.531', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '福岡県', 'latitude' => '33.607', 'longitude' => '130.418', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '愛媛県', 'latitude' => '33.842', 'longitude' => '132.766', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '徳島県', 'latitude' => '34.066', 'longitude' => '134.559', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '山口県', 'latitude' => '34.186', 'longitude' => '131.471', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '和歌山県', 'latitude' => '34.227', 'longitude' => '135.167', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '香川県', 'latitude' => '34.340', 'longitude' => '134.043', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '広島県', 'latitude' => '34.397', 'longitude' => '132.460', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '岡山県', 'latitude' => '34.662', 'longitude' => '133.934', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '奈良県', 'latitude' => '34.685', 'longitude' => '135.833', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '大阪府', 'latitude' => '34.686', 'longitude' => '135.520', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '兵庫県', 'latitude' => '34.691', 'longitude' => '135.183', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '三重県', 'latitude' => '34.730', 'longitude' => '136.509', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '静岡県', 'latitude' => '34.977', 'longitude' => '138.383', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '滋賀県', 'latitude' => '35.005', 'longitude' => '135.869', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '京都府', 'latitude' => '35.021', 'longitude' => '135.756', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '愛知県', 'latitude' => '35.180', 'longitude' => '136.907', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '岐阜県', 'latitude' => '35.391', 'longitude' => '136.722', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '神奈川県', 'latitude' => '35.448', 'longitude' => '139.642', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '島根県', 'latitude' => '35.472', 'longitude' => '133.050', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '鳥取県', 'latitude' => '35.504', 'longitude' => '134.238', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '千葉県', 'latitude' => '35.605', 'longitude' => '140.123', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '山梨県', 'latitude' => '35.664', 'longitude' => '138.568', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '東京都', 'latitude' => '35.689', 'longitude' => '139.692', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '埼玉県', 'latitude' => '35.857', 'longitude' => '139.649', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '福井県', 'latitude' => '36.065', 'longitude' => '136.222', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '茨城県', 'latitude' => '36.342', 'longitude' => '140.447', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '群馬県', 'latitude' => '36.391', 'longitude' => '139.060', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '栃木県', 'latitude' => '36.563', 'longitude' => '139.883', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '石川県', 'latitude' => '36.595', 'longitude' => '136.626', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '長野県', 'latitude' => '36.651', 'longitude' => '138.181', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '富山県', 'latitude' => '36.695', 'longitude' => '137.211', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '福島県', 'latitude' => '37.750', 'longitude' => '140.468', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '新潟県', 'latitude' => '37.903', 'longitude' => '139.023', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '山形県', 'latitude' => '38.240', 'longitude' => '140.364', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '宮城県', 'latitude' => '38.269', 'longitude' => '140.872', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '岩手県', 'latitude' => '39.704', 'longitude' => '141.153', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '秋田県', 'latitude' => '39.719', 'longitude' => '140.102', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '青森県', 'latitude' => '40.824', 'longitude' => '140.740', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => '北海道', 'latitude' => '43.065', 'longitude' => '141.347', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                // ['name' => '小笠原諸島', 'latitude' => '27.094', 'longitude' => '142.192', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                // ['name' => '釧路', 'latitude' => '42.9848', 'longitude' => '144.3813', 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('prefectures')->insert($prefectures);
    }
}
