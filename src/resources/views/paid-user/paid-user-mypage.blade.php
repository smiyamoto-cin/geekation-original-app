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
  <body>
    
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
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">有料会員画面</h1>
      </div>
    </div>
  </section>
  
  <div class="album py-5 bg-light">
    <div class="container">
      <div class =row>
      <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"> 間違えた単語の復習</text></svg>

            <div class="card-body">
              <p class="card-text">ここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入ります</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                
                <a href="{{route('paid-incorrect-answer')}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"> お気に入り単語帳</text></svg>

            <div class="card-body">
              <p class="card-text">ここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入ります</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                
                <a href="{{route('favorite-words-list')}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
    
    
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!-- 初級 -->
      @foreach ($titles1 as $title) 
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $title->title}}</text></svg>

            <div class="card-body">
              <p class="card-text">ここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入ります</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                
                <a href="{{ route('paid-user-menu',['category_id'=>'1' ,'title_id'=>$title->id])}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        
        @endforeach
        <!-- 中級 -->
        @foreach ($titles2 as $title)
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $title->title }}</text></svg>

            <div class="card-body">
              <p class="card-text">ここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入ります</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  
                  <a href="{{ route('paid-user-menu',['category_id'=>'2' ,'title_id'=>$title->id]) }}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                  
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <!-- 上級 -->
        @foreach ($titles3 as $title)
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $title->title }}</text></svg>

            <div class="card-body">
              <p class="card-text">ここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入りますここに説明が入ります</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  
                <a href="{{ route('paid-user-menu',['category_id'=>'3','title_id'=>$title->id]) }}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach

       
       
    </div>
  </div> 

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
</html>




@endsection