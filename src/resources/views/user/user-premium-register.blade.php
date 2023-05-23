@extends('layouts.app')

@section('content')

<h2>有料プランに変更しました</h2>

<a href="{{route('premium-plan-register')}}"><button type="button" class="btn btn-sm btn-outline-secondary">有料会員になる</button></a>
<a href="{{route('user-mypage')}}"><button type="button" class="btn btn-sm btn-outline-secondary">戻る</button></a>

@endsection