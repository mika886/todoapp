<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>

        @if (count($errors) > 0)
            <p>20文字以下で入力してください</p>
        @endif

        <form action="/todo/create" method="post">
            @csrf
            <input type="text" name="content" class="main-form">
            <button class="add-btn">追加</button>
        </form>
        <table>
            <tr>
                <th>作成日</th>
                <th>タスク名</th>
                <th>更新</th>
                <th>削除</th>
            </tr>

            @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->updated_at }}</td>

                <td>
                    <form action="/todo/update" method="post">
                        @csrf
                        <input type="text" name="content" class="sub-form" value="{{$todo->content}}">
                        <input type="hidden" name="id" value="{{$todo->id}}">
                </td>
                <td><button type="submit" class="update-btn">更新</button></td>
                    </form>

                <td>
                    <form action="/todo/delete" method="DELETE">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{$todo->id}}">
                        <button type="submit" class="delete-btn">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tr>
        </table>
    </div>
</body>
</html>
