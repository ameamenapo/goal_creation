<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Goal_listsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'classification' => 1,
            'theme' => '1日1回あいさつをしよう',
            'first_day' => 'おはようと言う',
            'second_day' => 'ありがとうと言う',
            'third_day' => 'お疲れ様ですと言う',
            'fourth_day' => '何かできることがありますか？と言う',
            'fifth_day' => 'ありがとうと２回言う',
            'sixth_day' => 'さようならと言う',
            'seventh_day' => 'おやすみなさいと言う',
            'user_id' => 4,
        ];
        DB::table('goal_lists')->insert($param);
        
        $param = [
            'classification' => 1,
            'theme' => 'いつもと違う場所へ行ってみよう',
            'first_day' => 'いつもと一本違う道を通ってみる',
            'second_day' => 'いつもと違うコンビニに行ってみる',
            'third_day' => '駅のホームで、いつもと違うドアから電車に乗ってみる',
            'fourth_day' => 'いつもと違うカフェに行ってみる',
            'fifth_day' => '買い物したことないパン屋でパンを買ってみる',
            'sixth_day' => '電車で１０分以上かかる滅多に降りない駅で降りて、探索してみる',
            'seventh_day' => '憧れのあの人が行ってそうな場所を妄想し、そこに行ってみる',
            'user_id' => 4,
        ];
        DB::table('goal_lists')->insert($param);
        
        $param = [
            'classification' => 1,
            'theme' => 'あと一歩踏み出してみよう',
            'first_day' => 'いつもより１０分早く起きる',
            'second_day' => 'いつもより丁寧に歯を磨く',
            'third_day' => '出かけるとき、下を向いて歩かないよう意識してみる',
            'fourth_day' => '店員さんと話すとき目をみてはっきりと話す',
            'fifth_day' => '本屋に行き、今売れている本を一冊買う',
            'sixth_day' => '朝食をいつもより丁寧に食べる',
            'seventh_day' => '今週の自分を褒めてみる',
            'user_id' => 4,
        ];
        DB::table('goal_lists')->insert($param);
            
    }
}
