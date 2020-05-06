<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()                 //填入假数据以演示
    {
		DB::table('articles')->delete();  //先清空记录
		for($i=0;$i<10;$i++){
			\App\Model\Article::create([    //借助Article模型来添加数据
				'title'=>'Title'.$i,
				'body' =>'Body'.$i,
				'user_id'=>1,
			]);
		}
	}
		
        //
    
}
