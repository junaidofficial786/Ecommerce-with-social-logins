@extends('layouts.base')

@section('title')
    Not found
@endsection


@section('content')

@push('style')
    <style>
        h1 {
            font-size: 120px;
            color: #ff0000; /* Red text */
            margin: 0;
        }

        p {
            font-size: 24px;
            color: #ff0000; /* Red text */
        }
        a {
            color: #ff0000; /* Red text */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
@endpush
<div class="container text-center">
    <h1>404</h1>
    <p>Page Not Found</p>
    <p>Sorry, the page you are looking for might be in another dimension.</p>
    <p>Go back to <a href="/">Home</a></p>
</div>
@endsection
