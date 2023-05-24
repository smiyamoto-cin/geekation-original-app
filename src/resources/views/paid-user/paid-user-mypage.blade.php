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
        text-anchor: mdle;
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
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
</header>

<main>
<section class="pt-2 text-center container">
    <div class="row pt-lg-4">
      <div class="col-lg-6 col-md-8 mx-auto">
      <h4 class="fw-light"><span style="color: #696969;">有料会員様マイページ</span></h4>
      </div>
    </div>
  </section>
  
  <div class="album py-3" style="background-color: #FDF5E6;">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
        <div class="col">
                <div class="d-flex justify-content-center mb-5">
                    <a href="{{route('paid-incorrect-answer')}}"><button type="button" class="btn btn-warning" style="height:8rem; width:20rem; color:#ffffff;">不正解単語帳</button></a>
                </div>
        </div>
        <div class="col">
              <div class="d-flex justify-content-center mb-5">
                <a href="{{route('favorite-words-list')}}">
                    <button type="button" class="btn btn-warning " style="height:8rem; width:20rem; color:#ffffff;">お気に入り単語帳</button></a>
              </div>
        </div>
    </div>
    
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!-- 初級 -->
     <!-- 初級 -->
     @foreach ($titles1 as $title) 
        <div class="col">
              <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('paid-user-menu',['category_id'=>'1' ,'title_id'=>$title->id])}}"><button type="button" class="btn btn-success" style="height:8rem; width:20rem;">Beginner<br>{{ $title->title}}</button></a>
              </div>
            </div>
        @endforeach
    <!-- 中級 -->
    @foreach ($titles2 as $title) 
            <div class="col">
              <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('paid-user-menu',['category_id'=>'2' ,'title_id'=>$title->id])}}"><button type="button" class="btn btn-primary" style="height:8rem; width:20rem;">Beginner<br>{{ $title->title}}</button></a>
              </div>
            </div>
        @endforeach
        <!-- 上級 -->
      @foreach ($titles3 as $title) 
        <div class="col">
              <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('paid-user-menu',['category_id'=>'3','title_id'=>$title->id])}}"><button type="button" class="btn btn-danger" style="height:8rem; width:20rem;">Beginner<br>{{ $title->title}}</button></a>
              </div>
            </div>
        @endforeach

       
       
    </div>
  </div> 

</main>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
</html>




@endsection