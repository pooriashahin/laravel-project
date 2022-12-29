@extends('layout')

@section('content')

@foreach ($listings as $listing)
<h4><a href='/listings/{{$listing->id}}'>{{$listing->title}}</a></h4>
<p>{{$listing->tags}}</p>
<p>{{$listing->company}}</p>
<p>{{$listing->webside}}</p>
<p>{{$listing->email}}</p>
<p>{{$listing->location}}</p>
<p>{{$listing->description}}</p>
<br>

@endforeach

@endsection
