@extends('layouts.app')

@section('content')
    <!-- Bootstrap core CSS -->
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <main>
    <div class="row justify-content-center my-3">
        <form action="{{ route('admin-list-update') }}" method="POST" class="w-25">
        @csrf
            <input type="hidden" name="quiz_id" value="{{ $quiz_id }}">
            {{-- カテゴリーフォーム --}}
        <div class="form-group my-3">
            <label for="category_id">{{ 'カテゴリー' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
            <select class="form-control" id="category_id" name="category_id">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
        </div>
        {{-- タイトルフォーム --}}
        <div class="form-group my-3">
            <label for="title_id">{{ 'タイトル' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
            <select class="form-control" id="title_id" name="title_id">
            @foreach ($titles as $title)
            <option value="{{ $title->id }}">{{ $title->title }}</option>
            @endforeach
            </select>
        </div>
        

        
        {{-- クイズフォーム --}}
        <div class="form-group my-3">
            <label for="question">{{ '問題' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
            @foreach ($quizzes as $quiz)
            <input type="text" class="form-control" name="question" id="question" value="{{$quiz->question}}">
            @endforeach  
        </div>
    
        {{-- 選択肢フォーム --}}
        <div class="form-group my-3">
            <label for="choices">選択肢</label>
            @for ($i = 0; $i < 3; $i++)
        
                <input type="text" class="form-control my-2" name="choices[]" id="choices{{ $i + 1 }}" value="{{ isset($choices[$i]) ? $choices[$i]->choice : '' }}"required>
            
            @endfor
        </div>

        {{-- 正解の選択肢を選ぶ --}}
        <div class="form-group">
        <label>正解の選択肢</label><br>
        @foreach ($choices as $index => $choice)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="is_answer" id="isAnswer{{ $index + 1 }}" value="{{ $index }}" {{ $choice->is_answer ? 'checked' : '' }} required>
                <label class="form-check-label" for="isAnswer{{ $index + 1 }}">選択肢{{ $index + 1 }}</label>
            </div>
        @endforeach
        </div>

    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success my-4" onclick="return confirm('こちらの内容で更新してよろしいですか？')">
            {{ '更新する' }}
        </button>
        <button  onClick="history.back();" class="btn btn-outline-secondary my-4">戻る</button>
    </div>
        </form>
        
    </div>
    </main>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</div>
</html>

@endsection