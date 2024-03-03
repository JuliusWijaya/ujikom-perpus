@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h1>Hello {{ Auth::user()->name }}</h1>
    </div>

    @if (Auth::user()->hak_akses !== 'anggota')
        <x-card-dashboard :users="$users" :koleksis="$koleksis" :trxpjm="$trxpjm" :trxpgm="$trxpgm" />
    @endif
@endsection
