@extends('layouts.app')

@section('content')
<div class="container">
    
    @if ($isCorrect)
        <h2 style="color:green">正解です！</h2>
    @else
        <h2 style="color:#ff0000">不正解です！</h2>
    @endif

    

    <a href="{{ route('paid-quiz-next', ['category_id' => $category->id, 'title_id' => $title->id, 'quiz_id' => $quiz->id]) }}">次の問題へ</a>
</div>
@endsection
