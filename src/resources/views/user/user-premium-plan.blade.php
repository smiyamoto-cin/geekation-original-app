@extends('layouts.app')

@section('content')
<body style="background-color: #FDF5E6;">
  <div class="container text-center mt-5">
        <h4><span style="color: #696969;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16" style="color:#B8860B;">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>有料会員限定サービスです。</span></h4>
        <form action="{{ route('premium-plan-register') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}" >
            <input type="hidden" name="role" value="{{ $user->role }}" >
            <button type="submit" class="btn btn-success mt-5 mb-3 btn-lg" onclick="return confirm('有料プランに変更します。')">
                {{ '有料プランに変更' }}
            </button>

        </form>
        <a href="{{route('user-mypage')}}"><button type="button" class="btn btn-sm btn-outline-secondary">戻る</button></a>
    </div>
</boby>
@endsection

