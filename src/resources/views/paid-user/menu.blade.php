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
    
            <section class="py-5 text-center container " style="background-color: #FDF5E6;">
                
                    
                        <div class="row justify-content-center ">
                            @foreach ($categories as $category)
                            <h4 class="fw-light"><span style="color: #696969;">{{ $category->name}}</span></h4>
                            @endforeach
                            @foreach ($titles as $title)
                            <h3 class="fw-light"><span style="color: #696969;">{{ $title->title}}</span></h3>
                            @endforeach
                            @foreach ($quizzes as $quiz)
                            <input type="hidden" name="quiz_id" value="{{ $quiz->question}}">
                            @endforeach
                    
                        </div>
            </section>
            
            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
                <div class="col-5">
                    <div class="d-flex justify-content-center my-5">
                        <a href="{{ route('paid-user-list',['category_id'=>$category->id ,'title_id'=>$title->id])}}"><button type="button" class="btn btn-success" style="height:15rem; width:20rem;">問題一覧</button></a>
                    </div>
                </div>
                <div class="col-5">
                    <div class="d-flex justify-content-center my-5">
                        <a href="{{ route('paid-quiz-show', ['category_id'=>$category->id,'title_id'=>$title->id])}}"><button type="button" class="btn btn-success" style="height:15rem; width:20rem;">START<br>クイズを始める</button></a>
                    </div>
                </div>
                          
                       
                        
            </main>
            <div class ="text-center">
            <a href="{{ route('paid-user-mypage')}}"><button class="btn btn-outline-secondary mt-5 text-center">戻る</button></a>   
            </div>
    </div>
    
</body>

@endsection