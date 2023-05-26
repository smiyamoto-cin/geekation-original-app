@extends('layouts.app')

@section('content')
    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body style="background-color: #FDF5E6;">
<div class="container ">
    <main>
    <div class="row justify-content-center my-3">
    
            <form action="{{ route('admin-list-create') }}" method="POST" class="w-25">
                @csrf
                    {{-- カテゴリーフォーム --}}
                    
            
                <div class="form-group my-3 ">
                    <label for="category_id">{{ 'カテゴリー' }}</label>
                    <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>
                {{-- タイトルフォーム --}}
                <div class="form-group my-3">
                    <label for="title_id">{{ 'タイトル' }}</label>
                    <select class="form-control" id="title_id" name="title_id">
                    @foreach ($titles as $title)
                    <option value="{{ $title->id }}">{{ $title->title }}</option>
                    @endforeach
                    </select>
                </div>

                
                {{-- クイズフォーム --}}
                <div class="form-group my-3">
                    <label for="question">{{ '問題' }}<span class="badge bg-danger ms-3">{{ '必須' }}</span></label>
                    <input type="text" class="form-control" name="question" id="question" value="{{ old('question') }}" >
                    @error('question')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                
                {{-- 選択肢フォーム --}}
                <div class="form-group my-3">
                    <label for="choices">選択肢<span class="badge bg-danger ms-3">{{ '必須' }}</span></label>
                    @for ($i = 0; $i < 3; $i++)
                        <input type="text" class="form-control my-2" name="choices[]" id="choices{{ $i + 1 }}" value="{{ old('choices[]') }}" >
                    @endfor
                    @error('choices.*')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
       
                </div>

                {{-- 正解の選択肢を選ぶ --}}
                <div class="form-group ">
                    <label>正解の選択肢<span class="badge bg-danger ms-3">{{ '必須' }}</span></label><br>
                    @for ($i = 0; $i < 3; $i++)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_answer" id="isAnswer{{ $i + 1 }}" value="{{  old('is_answer', $i) }}">
                            <label class="form-check-label" for="isAnswer{{ $i + 1 }}">選択肢{{ $i + 1 }}</label>
                            
                        </div>
                    @endfor
                    @error('is_answer')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
     
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-success my-4" onclick="return confirm('こちらの内容で追加してよろしいですか？')">
                            {{ '登録する' }}
                </button><br>
                        <a href="{{ route('admin-list',['category_id'=>$category->id ,'title_id'=>$title->id])}}"><button type="button" class="btn btn-outline-secondary mt-2">戻る</button></a>
                </div>
            </form>
        </div>
                
    </main>
</div>
</body>

@endsection