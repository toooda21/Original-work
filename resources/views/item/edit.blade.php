<!DOCTYPE html>


<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>商品編集画面</title>
</head>

<body>
    <div class=container>

        <h1>商品編集　会員ID:{{$item->id}}</h1>

            <!-- 商品名 -->
        <form action="/item/edit" method="POST" name="edit">
            @csrf
            <input type="text-central" name="id" value="{{$item->id}}" hidden>
            <div class="form-group">
                <input type="text" name="name" value="{{$item->name}}">
                @if($errors->has('name')){{ $errors->first('name') }}@endif 
            </div>


            <!-- コメント -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">詳細</label>
                <div class="col-sm-6">
                    <textarea name="datail" rows="6" cols="50">{{$item->datail}}</textarea>
                </div>
                @if($errors->has('datail')){{ $errors->first('datail') }}@endif 
            </div>     
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">編集</button>
            </div>
        </form>

        <form action="/item/delete/{{$item->id}}" method="POST">
            @csrf
            <div class="form-group">
                <button type="submit" class="btn btn-danger">削除</button>
            </div>        
        </form>
    </div>

</body>
</html>