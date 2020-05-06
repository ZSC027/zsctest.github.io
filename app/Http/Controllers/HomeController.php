<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Model\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //删除构造方法，前台不需要强制登录
/*    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //将所有文章作为参数全部分配给模板输出
        return view('home')->withArticles(Article::all());
    }

    //返回文章内容视图
    public function detail($id){
        //按指定ID获得一篇文章分配给内容模板
        return view('detail')->withArticle(Article::find($id));
    }
}
