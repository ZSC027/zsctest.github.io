<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;

class ArticleController extends Controller
{
    public function index(){
		//加载模板文件，并分配数据给模板，使用paginate()获取分页数据
		return view('admin/article/index')->withArticles(Article::paginate(3));
	}
	public function create(){
		return view('admin/article/create');  //导入admin/article/create.blade.php模板
	}
	
	public function store(Request $request){
		$this->validate($request,[
			'title'=>'required|unique:articles|max:255',
			'body'=>'required',
	]);
		
		$article=new Article;    //Model，Article类实例
		$article->title=$request->get('title'); //创建文章的Model实例
		$article->body=$request->get('body');    //通过请求对象获取标题
		$article->user_id=$request->user()->id;  //获取当前Auth系统中注册的用户ID
		
		//将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
		if($article->save()){
			return redirect('admin/articles');      //保存成功，跳转到文章管理页面
		}else{
			//保存失败，跳回来路页面，保留用户输入，并提供提示
			return redirect()->back()->withInput()->withErrors('保存失败!');
		}
	}
	
	public function edit($id){
		//导入admin/articles/edit.blade.php模板，并将ID对应的文章内容分配给模板
		return view('admin/article/edit')->withArticles(Article::find($id));
	}
	
	public function update(Request $request,$id){
		$this->validate($request,[
		'title'=>'required|max:255',
		'body'=>'required',
		]);
		
		$article = new Article;
		$data['title']=$request->get('title');
		$data['body']=$request->get('body');
		$data['user_id']=$request->user()->id;
		
		//将数据保存到数据库，通过判断保存结果，控制页面进行不同的跳转
		if($article->where('id',$id)->update($data))
			return redirect('admin/articles');
		else 
			return redirect()->back()->withInput()->withErrors('修改失败');
	}
	
	public function destroy($id){
		//用文章Model通过指定ID删除一条记录
		Article::find($id)->delete();
		//跳回来路页面，保留数据，并给出提示
		return redirect()->back()->withInput()->withErrors('删除成功');
	}
}
