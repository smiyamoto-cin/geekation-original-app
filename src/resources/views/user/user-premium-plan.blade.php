@extends('layouts.app')

@section('content')

<h2>有料会員限定サービスです。</h2>
<form action="{{ route('premium-plan-register') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user->id }}" >
    <input type="hidden" name="role" value="{{ $user->role }}" >
    <button type="submit" class="btn btn-success w-100" onclick="return confirm('有料プランに変更します。')">
        {{ '有料プランに変更' }}
      </button>

</form>
<a href="{{route('user-mypage')}}"><button type="button" class="btn btn-sm btn-outline-secondary">戻る</button></a>

@endsection

