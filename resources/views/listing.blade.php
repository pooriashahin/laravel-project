@extends('layout')

@section('content')


<h4>{{$listing->title}}</h4>
<p>{{$listing->tags}}</p>
<p>{{$listing->company}}</p>
<p>{{$listing->webside}}</p>
<p>{{$listing->email}}</p>
<p>{{$listing->location}}</p>
<p>{{$listing->description}}</p>

@endsection
