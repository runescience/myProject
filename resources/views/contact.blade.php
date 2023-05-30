
@extends('layouts.app')
<h1> blah blah blah blah </h1>

@section('content')

    {{-- @include() includes other files. --}}

    <h1>Contact Page</h1>

    {{-- if people is not an empty object --}}
    @if(count($people))
        <ul>

            @foreach($people as $person)
                <li>{{$person}}</li>
            @endforeach

        </ul>
    @endif


@stop

@section('footer')
    <script>alert("Hello Visitor");</script>
@stop



