@extends('layouts.app')

@section('content')
    <!-- Bootstrap core CSS -->
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
            @foreach ($categories as $category)
                <h5 class ="text-center">{{ $category->name}}</h5>
                @endforeach
                @foreach ($titles as $title)
                <h1 class ="text-center">{{ $title->title}}</h1>
                @endforeach
            <form action="" method="POST">
            @csrf

           
            {{-- クイズフォーム --}}
                <div class="form-group">
                    <label for="question">{{ '問題' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
                    <input type="text" class="form-control" name="question" id="question" value="{{ $quiz->question }}" readonly>
                </div>

                {{-- 選択肢フォーム --}}
                <div class="form-group">
                    <label for="choices">選択肢</label>
                    @foreach ($choices as $choice)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="choice{{ $choice->id }}" value="{{ $choice->id }}" required>
                            <label class="form-check-label" for="choice{{ $choice->id }}">{{ $choice->choice }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success" onclick="return confirm('こちらの内容で更新してよろしいですか？')">
                        {{ $nextQuestion ? '次の問題へ' : '結果を表示' }}
                    </button>
                </div>
            </form>

            @if (!$nextQuestion)
                <div class="text-center">
                    <a href="{{ route('top') }}">トップに戻る</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection