<!DOCTYPE html>


<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>商品編集画面</title>
</head>

<body>
    <div class=container>

        <h1>商品編集</h1>

        <!-- 商品名 -->
        <form action="/items/edit" method="POST" name="edit">
            @csrf
            会員ID:{{$item->id}}<br>
            商品名
            <input type="text-central" name="id" value="{{$item->id}}" hidden>
            <div class="form-group">
                <input type="text" name="name" value="{{$item->name}}">
                @if($errors->has('name')){{ $errors->first('name') }}@endif 
            </div>

            <!-- 性別 -->
            <div class="form-group">
                <label>性別</label><br>
                @if($item->detail2 == "メンズ")
                <input type="radio" id="men" name="detail2" value="メンズ" checked>
                @else
                <input type="radio" id="men" name="detail2" value="メンズ">
                @endif
                <label for="men">メンズ</label>
                @if($item->detail2 == "レディース")
                <input type="radio" id="men" name="detail2" value="レディース" checked>
                @else
                <input type="radio" id="men" name="detail2" value="レディース">
                @endif
                <label for="ladies">レディース</label>
            </div>

            <!-- 個数 -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">個数</label>
                <div class="col-sm-6">
                    <textarea name="type" rows="1" cols="10">{{$item->type}}</textarea>
                </div>
                @if($errors->has('type')){{ $errors->first('type') }}@endif 
            </div>

            <!-- 詳細 -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">詳細</label>
                <div class="col-sm-6">
                    <textarea name="detail" rows="4" cols="40">{{$item->detail}}</textarea>
                </div>
                @if($errors->has('detail')){{ $errors->first('detail') }}@endif 
            </div>
            <!-- 編集ボタン -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">編集</button>
            </div>
        </form>

            <!-- 削除ボタン -->
        <form action="/items/delete/{{$item->id}}" method="POST">
            @csrf
            <div class="form-group">
                <button type="submit" class="btn btn-danger btn-sm">削除</button>
            </div>        
        </form>
    </div>

</body>
</html>