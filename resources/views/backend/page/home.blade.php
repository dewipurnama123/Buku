@extends('backend/template')
@section('content')
@section('title')
    Home
@endsection
<!-- isi didalam sectionakan mengganti fuction yield yang ada pada file template.blade.php -->
    <h1> Selamat Datang {{Auth::user()->username}}</h1>
@endsection
