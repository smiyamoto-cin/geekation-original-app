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

  <body style="background-color: #FDF5E6;">
  <div class="container">

    <main>
<!-- クリックしたクイズのタイトルと問題一覧を表示 -->
    <div class="row justify-content-center text-center my-5">
    <h4><span style="color: #696969;">不正解の単語リスト</span></h4>

    <div class="row justify-content-center text-center my-1">
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
        <table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">英単語</th>
      <th scope="col">意味</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($incorrectAnswers as $incorrectAnswer) 
    <tr>
      <th scope="row">{{ $incorrectAnswer->question }}</th>
      <td>{{ $incorrectAnswer->correct_answer }}</td>
    <td>
    <form action="{{route ('favorite-words',['id'=>$incorrectAnswer->id])}}" method="POST">
                @csrf
                <input type="hidden" name="quiz_id" value="{{ $incorrectAnswer->quiz_id }}">
                <input type="hidden" name="question" value="{{ $incorrectAnswer->question}}">
                <input type="hidden" name="correct_answer" value="{{ $incorrectAnswer->correct_answer}}">
                <button type="submit" style="color:green;border: none; background: transparent;" onclick="return confirm('マイ単語帳に登録しますか？')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/>
                    </svg></button>
                </form>
    </td>
    <td><form action="{{ route('paid-incorrect-answer-delete',['id'=>$incorrectAnswer->id]) }}" method="POST">
                @csrf
                <button type="submit" onclick="return confirm('単語帳から削除されますがよろしいですか？')" class="btn btn-outline-secondary">削除</button>
                </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
 
    

        
        <a href="{{ route('paid-user-mypage')}}"><button button class="btn btn-outline-secondary mt-5">戻る</button></a>
       
    </div>
</main>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>

@endsection