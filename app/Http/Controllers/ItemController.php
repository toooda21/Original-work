<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'detail2' => 'required',
                'type' => 'required',
                'detail' => 'required',
            ],
            [
                'name.required' => '商品名は必須です。',
                'detail2.required'  => '性別の選択は必須項目です。',
                'type.required'  => '種別は必須項目です。',
                'detail.required'  => '詳細情報は必須項目です。',

            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'detail2' => $request->detail2,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }



        //商品編集画面を表示 
        public function edit(Request $request){
            $item = Item::where('id', '=', $request->id)->first();
            return view ('item.edit')->with([
                'item' => $item ,
            ]);
        }
    
        //編集を実行する
        public function itemEdit(Request $request){
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'detail2' => 'required',
                'type' => 'required',
                'detail' => 'required',
            ],
            [
                'name.required' => '商品名は必須です。',
                'detail2.required'  => '性別の選択は必須項目です。',
                'type.required'  => '種別は必須項目です。',
                'detail.required'  => '詳細情報は必須項目です。',
            ]);

            $item = Item::where('id', '=', $request->id)->first();

            $item->name = $request->name;
            $item->detail2 = $request->detail2;
            $item->type = $request->type;
            $item->detail = $request->detail;
    
            $item->save();
    
            return redirect('/items');
        }
    
    
        //削除を実行する 
        public function itemDelete(Request $request){
            $item = Item::where('id', '=', $request->id)->first();
            $item->delete();
    
            return redirect('/items');
        }

}
