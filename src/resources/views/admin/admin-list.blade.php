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
        <div class="row justify-content-center text-center my-3" >
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
            @foreach ($categories as $category)
            @foreach ($titles as $title)
            <h4><span style="color: #696969;">{{ $category->name}}　{{ $title->title}}</span></h4>
            @endforeach
            @endforeach
        <div class="row justify-content-center text-center my-1">
        <table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">英単語</th>
      <th scope="col">選択肢1</th>
      <th scope="col">選択肢2</th>
      <th scope="col">選択肢3</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($quizzes as $quiz) 
    <tr>
      <th scope="row">{{ $quiz->question }}</th>
      @php
        $quizChoices = $choices->where('quiz_id', $quiz->id);
        @endphp
        @foreach ($quizChoices as $choice)
      <td>{{ $choice->choice }}</td>
      @endforeach
      <td><a href="{{ route('admin-list-edit', ['category_id'=>$category->id ,'title_id'=>$title->id,'quiz_id'=>$quiz->id]) }}"><button class="btn btn-success">編集</button></a></td>
      <td>
      <form action="{{ route('admin-list-delete',['id'=>$quiz->id]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-secondary" onclick="return confirm('本当に削除しますか？')">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
        
   
    
            <a href="{{ route('admin-list-add',['category_id'=>$category->id ,'title_id'=>$title->id])}}"><button class="btn btn-success my-2">問題を追加</button></a>
            <a href="{{ route('admin-mypage-titles')}}"><button class="btn btn-outline-secondary">戻る</button></a>
        </div>
    </div>

            
    </main>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</div>
</html>

@endsection