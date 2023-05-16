@extends('layouts.app')

@section('content')
    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <form action="" method="">
    @csrf
      {{-- タイトルフォーム --}}
      <div class="form-group w-50">
        <label for="category-id">{{ 'タイトル' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
        <select class="form-control" id="category-id" name="category_id">
        @foreach ($titles as $title)
          <option value="{{ $title->id }}">{{ $title->title}}</option>
        @endforeach
        </select>
      </div>

      {{-- クイズフォーム --}}
      <div class="form-group w-25">
        <label for="entry-fee">{{ '問題' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
        <input type="text" class="form-control" name="entry_fee" id="entry-fee">
      </div>
      {{-- 選択肢フォーム --}}
      <div class="form-group w-25">
        <label for="entry-fee">{{ '選択肢' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
        <input type="text" class="form-control" name="entry_fee" id="entry-fee">
      </div>


      <button type="submit" class="btn btn-success w-100">
        {{ '登録する' }}
      </button>
    </form>
</div>

@endsection