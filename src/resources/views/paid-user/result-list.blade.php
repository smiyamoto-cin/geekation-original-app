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
            <div class="row justify-content-center text-center">
        
                @foreach ($titles as $title)
                <h3 class="fw-light my-4"><span style="color: #696969;">{{ $title->title}}</span></h3>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">問題</th>
                        <th scope="col">正しい解答</th>
                        <th scope="col">あなたの解答</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($quizzes as $quiz)
                    <tr>
                        <th scope="row">{{ $quiz->question }}</th>
                        <td>
                        @php
                        $quizChoices = $choices->where('quiz_id', $quiz->id)
                        ->where('is_answer',1);
                        
                        @endphp
                        @foreach ($quizChoices as $choice)
                            <p>{{ $choice->choice }}</p>
                        @endforeach
                    </td>
                    <td>
                        @php
                        $quizAnswerHistories = $answerHistories->where('quiz_id', $quiz->id);
                        @endphp
                        @foreach ($quizAnswerHistories as $answerHistory)
                            @php
                                $choice = \App\Models\Choice::find($answerHistory->user_answer);
                            @endphp
                            @if ($choice)
                                <p>{{ $choice->choice }}</p>
                            @endif	
                                @endforeach
                    </td>
                        <td>
                        @php
                        $quizChoices = $choices->where('quiz_id', $quiz->id)
                                                ->where('is_answer', 1);
                                $quizAnswerHistories = $answerHistories->where('quiz_id', $quiz->id);
                                @endphp
                                @if ($quizChoices->count() > 0 && $quizAnswerHistories->count() > 0)
                                    @foreach ($quizAnswerHistories as $answerHistory)
                                        @php
                                        $choice = \App\Models\Choice::find($answerHistory->user_answer);
                                        @endphp
                                    @if ($quizChoices->contains('id', $answerHistory->user_answer))
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" style="color:green;" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                    </svg></p>
                                @else
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16" style="color:red;">
                                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                    </svg></p>
                                @endif
                                    @endforeach
                                @else
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16" style="color:red;">
                                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                    </svg></p>
                                @endif
                    </td>
                    <td>
                    <form action="{{route ('favorite-words',['id'=>$quiz->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                        <input type="hidden" name="question" value="{{ $quiz->question}}">
                        <input type="hidden" name="correct_answer" value="{{ $choice->choice}}">
                        <button type="submit" style="color:green;border: none; background: transparent;" onclick="return confirm('マイ単語帳に登録しますか？')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/>
                    </svg>
                        </button>
                        </form>
                    </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>

                <a href ="{{ route('paid-quiz-show',['category_id'=>$category->id,'title_id'=>$title->id])}}">
                            <button class="btn btn-success mb-2 btn-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                            </svg> もう一度
                            </button>
                        </a>
                        <a href ="{{ route('paid-user-mypage')}}">
                        <button class="btn btn-outline-secondary btn-sm mt-2 mb-5">マイページに戻る</button>
                        </a>
            </div>
    </main>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </div>
  </body>
</html>

@endsection