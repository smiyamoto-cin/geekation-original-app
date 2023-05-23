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

    

    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
  <div class="container">

    <main>
<!-- クリックしたクイズのタイトルと問題一覧を表示 -->
    <div class="row justify-content-center">
    @foreach ($categories as $category)
        <h5 class ="text-center">{{ $category->name}}</h5>
        @endforeach
        @foreach ($titles as $title)
        <h1 class ="text-center">{{ $title->title}}</h1>
        @endforeach
        <table class="table table-bordered table table-sm">

            @foreach ($quizzes as $quiz) 
            <tr>
                <td nowrap>
                    <p>{{ $quiz->question }}</p>			
                </td>
                    @php
                    $quizChoices = $choices->where('quiz_id', $quiz->id)
                    ->where('is_answer',1);
                    @endphp
                    @foreach ($quizChoices as $choice)
                <td>{{ $choice->choice }}</td>
                    @endforeach
                </td>
                <td nowrap>
                <form action="{{route ('favorite-words',['id'=>$quiz->id])}}" method="POST">
                @csrf
                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                <input type="hidden" name="question" value="{{ $quiz->question}}">
                <input type="hidden" name="correct_answer" value="{{ $choice->choice}}">
                <button type="submit" onclick="return confirm('マイ単語帳に登録しますか？')">📙</button>
                </form>
                </td>
    </tr>
            @endforeach
            <!-- 登録成功メッセージとエラーメッセージ -->
@if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
  
        </table>
        <a href="{{ route('paid-user-menu',['category_id'=>$category->id ,'title_id'=>$title->id])}}"><button>戻る</button></a>
    </div>
</main>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
</html>

@endsection