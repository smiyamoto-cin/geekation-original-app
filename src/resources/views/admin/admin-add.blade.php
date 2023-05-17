@extends('layouts.app')

@section('content')
    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <form action="{{ route('admin-list-create') }}" method="POST">
    @csrf
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
        <input type="text" class="form-control" name="question" id="question">
      </div>
      {{-- 選択肢1フォーム --}}
        <div class="form-group w-25">
        <label for="choices[]">{{ '選択肢1' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
        <input type="text" class="form-control" name="choices[]" id="choice1">
        </div>
        {{-- 選択肢2フォーム --}}
        <div class="form-group w-25">
        <label for="choices[]">{{ '選択肢2' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
        <input type="text" class="form-control" name="choices[]" id="choice2">
        </div>
        {{-- 選択肢3フォーム --}}
        <div class="form-group w-25">
        <label for="choices[]">{{ '選択肢3' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
        <input type="text" class="form-control" name="choices[]" id="choice3">
        </div>
     



      <button type="submit" class="btn btn-success w-100">
        {{ '登録する' }}
      </button>
    </form>
</div>

@endsection