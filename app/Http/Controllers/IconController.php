<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Icon;

class IconController extends Controller
{
    /**
     *
     * Iconデータ一覧を表示
     *
     */
    public function index(){
    
	    return view('icon.index');
    }

    /**
     *
     * Iconデータ新規登録画面を表示
     *
     */
    public function create(){
    
  	    return view('icon.create');
    }
    
    // classは関数と変数のまとまりなので
    // このように関数は他のものと並行の位置になるように記述する
    public function store(Request $request){
	    /*
		   * 1. データを受け取るはRequestクラスを使うことで実現
		   */
		
		  /*
		   * 2. バリデーション処理
		   */
		   
		  /*
		   * 3. データ登録
		   * （画像は今回省略しています）
		   */
	   	$new_icon = new Icon();
		$new_icon->title = $request->title;
		$new_icon->description = $request->description;
		
		$new_icon->save();
		   
		  /*
		   * 4. リダイレクト
			 */
	    return redirect('/dashboard');
    }
    
    /*
     * update関数はこちら
     */
    public function update(Request $request, $icon_id){
  
  
		
			$icon = Icon::find($icon_id);
		  
		  $icon->title = $request->title;
		  $icon->description = $request->description;
		  
		  $icon->save();
		  
		  return redirect('/dashboard');
    }
    
    /*
     * destroy関数はこちら
     */
    public function destroy($icon_id){
    
  			$icon = Icon::find($icon_id);
        $icon->delete();
        
				// 上の2行は以下のようにしてもOKです
        Icon::destroy($icon_id);
        
        return redirect('/dashboard');
	}
}
