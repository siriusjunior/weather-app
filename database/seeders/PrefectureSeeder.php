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
            ['name' => '沖縄県', 'furigana' => 'おきなわけん', 'latitude' => '26.212', 'longitude' => '127.681', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '鹿児島県', 'furigana' => 'かごしまけん', 'latitude' => '31.560', 'longitude' => '130.558', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '宮崎県', 'furigana' => 'みやざきけん', 'latitude' => '31.911', 'longitude' => '131.424', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '長崎県', 'furigana' => 'ながさきけん', 'latitude' => '32.745', 'longitude' => '129.874', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '熊本県', 'furigana' => 'くまもとけん', 'latitude' => '32.790', 'longitude' => '130.742', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '大分県', 'furigana' => 'おおいたけん', 'latitude' => '33.238', 'longitude' => '131.613', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '佐賀県', 'furigana' => 'さがけん', 'latitude' => '33.249', 'longitude' => '130.300', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '高知県', 'furigana' => 'こうちけん', 'latitude' => '33.560', 'longitude' => '133.531', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '福岡県', 'furigana' => 'ふくおかけん', 'latitude' => '33.607', 'longitude' => '130.418', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '愛媛県', 'furigana' => 'えひめけん', 'latitude' => '33.842', 'longitude' => '132.766', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '徳島県', 'furigana' => 'とくしまけん', 'latitude' => '34.066', 'longitude' => '134.559', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '山口県', 'furigana' => 'やまぐちけん', 'latitude' => '34.186', 'longitude' => '131.471', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '和歌山県', 'furigana' => 'わかやまけん', 'latitude' => '34.227', 'longitude' => '135.167', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '香川県', 'furigana' => 'かがわけん', 'latitude' => '34.340', 'longitude' => '134.043', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '広島県', 'furigana' => 'ひろしまけん', 'latitude' => '34.397', 'longitude' => '132.460', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '岡山県', 'furigana' => 'おかやまけん', 'latitude' => '34.662', 'longitude' => '133.934', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '奈良県', 'furigana' => 'ならけん', 'latitude' => '34.685', 'longitude' => '135.833', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '大阪府', 'furigana' => 'おおさかふ', 'latitude' => '34.686', 'longitude' => '135.520', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '兵庫県', 'furigana' => 'ひょうごけん', 'latitude' => '34.691', 'longitude' => '135.183', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '三重県', 'furigana' => 'みえけん', 'latitude' => '34.730', 'longitude' => '136.509', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '静岡県', 'furigana' => 'しずおかけん', 'latitude' => '34.977', 'longitude' => '138.383', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '滋賀県', 'furigana' => 'しがけん', 'latitude' => '35.005', 'longitude' => '135.869', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '京都府', 'furigana' => 'きょうとふ', 'latitude' => '35.021', 'longitude' => '135.756', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '愛知県', 'furigana' => 'あいちけん', 'latitude' => '35.180', 'longitude' => '136.907', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '岐阜県', 'furigana' => 'ぎふけん', 'latitude' => '35.391', 'longitude' => '136.722', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '神奈川県', 'furigana' => 'かながわけん', 'latitude' => '35.448', 'longitude' => '139.642', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '島根県', 'furigana' => 'しまねけん', 'latitude' => '35.472', 'longitude' => '133.050', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '鳥取県', 'furigana' => 'とっとりけん', 'latitude' => '35.504', 'longitude' => '134.238', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '千葉県', 'furigana' => 'ちばけん', 'latitude' => '35.605', 'longitude' => '140.123', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '山梨県', 'furigana' => 'やまなしけん', 'latitude' => '35.664', 'longitude' => '138.568', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '東京都', 'furigana' => 'とうきょうと', 'latitude' => '35.689', 'longitude' => '139.692', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '埼玉県', 'furigana' => 'さいたまけん', 'latitude' => '35.857', 'longitude' => '139.649', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '福井県', 'furigana' => 'ふくいけん', 'latitude' => '36.065', 'longitude' => '136.222', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '茨城県', 'furigana' => 'いばらきけん', 'latitude' => '36.342', 'longitude' => '140.447', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '群馬県', 'furigana' => 'ぐんまけん', 'latitude' => '36.391', 'longitude' => '139.060', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '栃木県', 'furigana' => 'とちぎけん', 'latitude' => '36.563', 'longitude' => '139.883', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '石川県', 'furigana' => 'いしかわけん', 'latitude' => '36.595', 'longitude' => '136.626', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '長野県', 'furigana' => 'ながのけん', 'latitude' => '36.651', 'longitude' => '138.181', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '富山県', 'furigana' => 'とやまけん', 'latitude' => '36.695', 'longitude' => '137.211', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '福島県', 'furigana' => 'ふくしまけん', 'latitude' => '37.750', 'longitude' => '140.468', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '新潟県', 'furigana' => 'にいがたけん', 'latitude' => '37.903', 'longitude' => '139.023', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '山形県', 'furigana' => 'やまがたけん', 'latitude' => '38.240', 'longitude' => '140.364', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '宮城県', 'furigana' => 'みやぎけん', 'latitude' => '38.269', 'longitude' => '140.872', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '岩手県', 'furigana' => 'いわてけん', 'latitude' => '39.704', 'longitude' => '141.153', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '秋田県', 'furigana' => 'あきたけん', 'latitude' => '39.719', 'longitude' => '140.102', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '青森県', 'furigana' => 'あおもりけん', 'latitude' => '40.824', 'longitude' => '140.740', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '北海道', 'furigana' => 'ほっかいどう', 'latitude' => '43.065', 'longitude' => '141.347', 'is_representative' => false, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        // トップ用の都市名
            ['name' => '札幌', 'furigana' => 'さっぽろ','latitude' => '43.063', 'longitude' => '141.354', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '釧路', 'furigana' => 'くしろ','latitude' => '42.984', 'longitude' => '144.381', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '秋田', 'furigana' => 'あきた','latitude' => '39.719', 'longitude' => '140.103', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '仙台', 'furigana' => 'せんだい','latitude' => '38.268', 'longitude' => '140.869', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '東京', 'furigana' => 'とうきょう','latitude' => '35.689', 'longitude' => '139.691', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '新潟', 'furigana' => 'にいがた','latitude' => '37.916', 'longitude' => '139.036', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '長野', 'furigana' => 'ながの','latitude' => '36.648', 'longitude' => '138.194', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '金沢', 'furigana' => 'かなざわ','latitude' => '36.562', 'longitude' => '136.648', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '名古屋', 'furigana' => 'なごや', 'latitude' => '35.181', 'longitude' => '136.906', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '大阪', 'furigana' => 'おおさか','latitude' => '34.693', 'longitude' => '135.502', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '広島', 'furigana' => 'ひろしま','latitude' => '34.385', 'longitude' => '132.455',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '松江', 'furigana' => 'まつえ','latitude' => '35.472', 'longitude' => '133.050',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '鳥取', 'furigana' => 'とっとり', 'latitude' => '35.503', 'longitude' => '134.238',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '高知', 'furigana' => 'こうち', 'latitude' => '33.558', 'longitude' => '133.531',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '福岡', 'furigana' => 'ふくおか', 'latitude' => '33.590', 'longitude' => '130.401',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '鹿児島', 'furigana' => 'かごしま', 'latitude' => '31.560', 'longitude' => '130.558',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '那覇', 'furigana' => 'なは', 'latitude' => '26.212', 'longitude' => '127.679',  'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '小笠原', 'furigana' => 'おがさわら', 'latitude' => '27.094', 'longitude' => '142.192', 'is_representative' => true, 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ];
        DB::table('prefectures')->insert($prefectures);
    }
}
