@extends('layouts.app')

@section('content')
    <!-- Bootstrap core CSS -->
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <form action="{{ route('admin-list-update') }}" method="POST">
    @csrf
        <input type="hidden" name="quiz_id" value="{{ $quiz_id }}">
        {{-- カテゴリーフォーム --}}
      <div class="form-group w-50">
        <label for="category_id">{{ 'カテゴリー' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
        <select class="form-control" id="category_id" name="category_id">
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        </select>
      </div>
      {{-- タイトルフォーム --}}
      <div class="form-group w-50">
        <label for="title_id">{{ 'タイトル' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
        <select class="form-control" id="title_id" name="title_id">
        @foreach ($titles as $title)
          <option value="{{ $title->id }}">{{ $title->title }}</option>
        @endforeach
        </select>
      </div>
      

      
      {{-- クイズフォーム --}}
      <div class="form-group w-25">
        <label for="question">{{ '問題' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
        @foreach ($quizzes as $quiz)
        <input type="text" class="form-control" name="question" id="question" value="{{$quiz->question}}">
         @endforeach  
    </div>
 
    {{-- 選択肢フォーム --}}
    <div class="form-group">
        <label for="choices">選択肢</label>
        @for ($i = 0; $i < 3; $i++)
       
            <input type="text" class="form-control" name="choices[]" id="choices{{ $i + 1 }}" value="{{ isset($choices[$i]) ? $choices[$i]->choice : '' }}"required>
        
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


      <button type="submit" class="btn btn-success w-100" onclick="return confirm('こちらの内容で更新してよろしいですか？')">
        {{ '更新する' }}
      </button>
      <button  onClick="history.back();">戻る</button>
    </form>
</div>

@endsection