@extends('layouts.User.app')

<!-- ======= Header ======= -->


@section('content')
<h1>{{ Auth::user()->name }}</h1>
@endsection