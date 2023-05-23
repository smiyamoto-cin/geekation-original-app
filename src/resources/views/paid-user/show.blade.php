@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Admin mypage · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/album/">

    <script src="https://kit.fontawesome.com/9d0dd753e7.js" crossorigin="anonymous"></script>


    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  </head>
  <body>
  <div class="container">

        <!-- クイズの表示 -->
        <h3>{{ $title->title }}</h3>
        <h1>{{ $firstQuiz->question }}</h1>


        <!-- 選択肢の表示 --><form action="{{ route('quiz.submit') }}" method="post">
        
            @csrf
            <input type="hidden" name="next_quiz_id" value="{{ $firstQuiz->id }}">
            <input type="hidden" name="title_id" value="{{ $title->id }}">
            <input type="hidden" name="category_id" value="{{ $category->id }}">
            @foreach ($choices as $choice)
                <input type="radio" name="user_answer" value="{{ $choice->id }}">{{ $choice->choice }}<br>
            @endforeach
         
            <!-- エラーメッセージの表示 -->
    @if ($errors->has('user_answer'))
        <p style="font-size: 15px; color: red;">回答を選択してください</p>
    @endif

        <button type="submit">回答する</button>
    </form>
</div>



</body>


@endsection
