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
            ['name' => '沖縄県', 'latitude' => '26.212', 'longitude' => '127.681', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '鹿児島県', 'latitude' => '31.560', 'longitude' => '130.558', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '宮崎県', 'latitude' => '31.911', 'longitude' => '131.424', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '長崎県', 'latitude' => '32.745', 'longitude' => '129.874', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '熊本県', 'latitude' => '32.790', 'longitude' => '130.742', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '大分県', 'latitude' => '33.238', 'longitude' => '131.613', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '佐賀県', 'latitude' => '33.249', 'longitude' => '130.300', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '高知県', 'latitude' => '33.560', 'longitude' => '133.531', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '福岡県', 'latitude' => '33.607', 'longitude' => '130.418', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '愛媛県', 'latitude' => '33.842', 'longitude' => '132.766', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '徳島県', 'latitude' => '34.066', 'longitude' => '134.559', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '山口県', 'latitude' => '34.186', 'longitude' => '131.471', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '和歌山県', 'latitude' => '34.227', 'longitude' => '135.167', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '香川県', 'latitude' => '34.340', 'longitude' => '134.043', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '広島県', 'latitude' => '34.397', 'longitude' => '132.460', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '岡山県', 'latitude' => '34.662', 'longitude' => '133.934', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '奈良県', 'latitude' => '34.685', 'longitude' => '135.833', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '大阪府', 'latitude' => '34.686', 'longitude' => '135.520', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '兵庫県', 'latitude' => '34.691', 'longitude' => '135.183', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '三重県', 'latitude' => '34.730', 'longitude' => '136.509', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '静岡県', 'latitude' => '34.977', 'longitude' => '138.383', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '滋賀県', 'latitude' => '35.005', 'longitude' => '135.869', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '京都府', 'latitude' => '35.021', 'longitude' => '135.756', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '愛知県', 'latitude' => '35.180', 'longitude' => '136.907', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '岐阜県', 'latitude' => '35.391', 'longitude' => '136.722', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '神奈川県', 'latitude' => '35.448', 'longitude' => '139.642', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '島根県', 'latitude' => '35.472', 'longitude' => '133.050', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '鳥取県', 'latitude' => '35.504', 'longitude' => '134.238', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '千葉県', 'latitude' => '35.605', 'longitude' => '140.123', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '山梨県', 'latitude' => '35.664', 'longitude' => '138.568', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '東京都', 'latitude' => '35.689', 'longitude' => '139.692', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '埼玉県', 'latitude' => '35.857', 'longitude' => '139.649', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '福井県', 'latitude' => '36.065', 'longitude' => '136.222', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '茨城県', 'latitude' => '36.342', 'longitude' => '140.447', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '群馬県', 'latitude' => '36.391', 'longitude' => '139.060', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '栃木県', 'latitude' => '36.563', 'longitude' => '139.883', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '石川県', 'latitude' => '36.595', 'longitude' => '136.626', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '長野県', 'latitude' => '36.651', 'longitude' => '138.181', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '富山県', 'latitude' => '36.695', 'longitude' => '137.211', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '福島県', 'latitude' => '37.750', 'longitude' => '140.468', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '新潟県', 'latitude' => '37.903', 'longitude' => '139.023', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '山形県', 'latitude' => '38.240', 'longitude' => '140.364', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '宮城県', 'latitude' => '38.269', 'longitude' => '140.872', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '岩手県', 'latitude' => '39.704', 'longitude' => '141.153', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '秋田県', 'latitude' => '39.719', 'longitude' => '140.102', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '青森県', 'latitude' => '40.824', 'longitude' => '140.740', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '北海道', 'latitude' => '43.065', 'longitude' => '141.347', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // トップ用の都市名
            ['name' => '札幌', 'latitude' => '43.063', 'longitude' => '141.354', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '釧路', 'latitude' => '42.984', 'longitude' => '144.381', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '秋田', 'latitude' => '39.719', 'longitude' => '140.103', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '仙台', 'latitude' => '38.268', 'longitude' => '140.869', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '東京', 'latitude' => '35.689', 'longitude' => '139.691', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '新潟', 'latitude' => '37.916', 'longitude' => '139.036', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '長野', 'latitude' => '36.648', 'longitude' => '138.194', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '金沢', 'latitude' => '36.562', 'longitude' => '136.648', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '名古屋', 'latitude' => '35.181', 'longitude' => '136.906', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '大阪', 'latitude' => '34.693', 'longitude' => '135.502', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '広島', 'latitude' => '34.385', 'longitude' => '132.455',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '松江', 'latitude' => '35.472', 'longitude' => '133.050',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '鳥取', 'latitude' => '35.503', 'longitude' => '134.238',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '高知', 'latitude' => '33.558', 'longitude' => '133.531',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '福岡', 'latitude' => '33.590', 'longitude' => '130.401',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '鹿児島', 'latitude' => '31.560', 'longitude' => '130.558',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '那覇', 'latitude' => '26.212', 'longitude' => '127.679',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '小笠原', 'latitude' => '27.094', 'longitude' => '142.192', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ];
        DB::table('prefectures')->insert($prefectures);
    }
}
