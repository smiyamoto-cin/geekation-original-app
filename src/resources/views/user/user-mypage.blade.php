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
   <script src="https://kit.fontawesome.com/9d0dd753e7.js" crossorigin="anonymous"></script>   
   <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body style="background-color: #FDF5E6;">

<main >
<section class="pt-2 text-center container">
    <div class="row pt-lg-4">
      <div class="col-lg-6 col-md-8 mx-auto">
      <h4 class="fw-light"><span style="color: #696969;">マイページ</span></h4>
      </div>
    </div>
  </section>
 
  <div class="album py-3" style="background-color: #FDF5E6;">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
        <div class="col">
                <div class="d-flex justify-content-center mb-5">
                    <a href="{{route('incorrect-answer')}}"><button type="button" class="btn btn-warning" style="height:8rem; width:20rem; color:#ffffff;">不正解単語帳</button></a>
                </div>
        </div>
        
        <div class="col">
              <div class="d-flex justify-content-center mb-5">
                <a href="{{route('premium-plan-message')}}">
                    <button type="button" class="btn btn-warning disabled" style="height:8rem; width:20rem; color:#ffffff;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16" style="color:#B8860B;">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                    </svg>お気に入り単語帳
                    </button></a>
              </div>
        </div>
    </div>

        

    
    
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!-- 初級 -->
      @foreach ($titles1 as $title) 
        <div class="col">
              <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('user-menu',['category_id'=>'1' ,'title_id'=>$title->id])}}"><button type="button" class="btn btn-success" style="height:8rem; width:20rem;">Beginner<br>{{ $title->title}}</button></a>
              </div>
            </div>
        @endforeach
        <!-- 中級 -->
        <div class="col">
              <div class="d-flex justify-content-center mb-3">
                <a href="{{route('premium-plan-message')}}"><button type="button" class="btn btn-primary disabled" style="height:8rem; width:20rem;">Intermediate<br>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16" style="color:#B8860B;">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>中級１</button></a>
              </div>
        </div>
        <div class="col">
              <div class="d-flex justify-content-center mb-3">
                <a href="{{route('premium-plan-message')}}"><button type="button" class="btn btn-primary disabled" style="height:8rem; width:20rem;">Intermediate<br>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16" style="color:#B8860B;">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>中級2</button></a>
              </div>
        </div>
        <div class="col">
              <div class="d-flex justify-content-center mb-3">
                <a href="{{route('premium-plan-message')}}"><button type="button" class="btn btn-primary disabled" style="height:8rem; width:20rem;">Intermediate<br>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16" style="color:#B8860B;">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>中級3</button></a>
              </div>
        </div>

        
        <!-- 上級 -->
        <div class="col">
              <div class="d-flex justify-content-center mb-3">
                <a href="{{route('premium-plan-message')}}"><button type="button" class="btn btn-danger disabled" style="height:8rem; width:20rem;">Advanced<br>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16" style="color:#B8860B;">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>上級１</button></a>
              </div>
        </div>
        <div class="col">
              <div class="d-flex justify-content-center mb-3">
                <a href="{{route('premium-plan-message')}}"><button type="button" class="btn btn-danger disabled" style="height:8rem; width:20rem;">Advanced<br>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16" style="color:#B8860B;">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>上級2</button></a>
              </div>
        </div>
        <div class="col">
              <div class="d-flex justify-content-center mb-3">
                <a href="{{route('premium-plan-message')}}"><button type="button" class="btn btn-danger disabled" style="height:8rem; width:20rem;">Advanced<br>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16" style="color:#B8860B;">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>上級3</button></a>
              </div>
        </div>
          </div>
        </div>
 
        

       
       
    </div>
  </div> 

</main>




    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
</html>



@endsection