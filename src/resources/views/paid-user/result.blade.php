@extends('layouts.app')

@section('content')
<body style="background-color: #FDF5E6;">
<div class="container text-center">
    

    @if ($isCorrect)
        <h2 class="my-5" style="color:green"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
  <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
  <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
</svg> 正解です！</h2>
    @else
        <h2 class="my-5" style="color:#ff0000"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
  <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
</svg> 不正解です...</h2>
    @endif

    
<!-- 
    <a href="{{ route('quiz.next', ['category_id' => $category->id, 'title_id' => $title->id, 'quiz_id' => $quiz->id]) }}"><button class="btn btn-outline-success my-5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
</svg>次の問題へ</button></a> -->

@if ($nextQuiz)
  <a href="{{ route('paid-quiz-next', ['category_id' => $category->id, 'title_id' => $title->id, 'quiz_id' => $quiz->id])}}" class="btn btn-success">次の問題へ</a>
@else
  <a href="{{ route('paid-quiz-next', ['category_id' => $category->id, 'title_id' => $title->id, 'quiz_id' => $quiz->id]) }}" class="btn btn-success">結果を見る</a>
@endif


</div>

</body>
@endsection
