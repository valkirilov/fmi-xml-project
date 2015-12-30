@extends('layouts.base')

@section('content')
  @foreach ($jokes['joke'] as $joke)
  	<div>
  		<h3><a href="/edit/{{ $joke['@attributes']['id'] }}">{{ $joke['_value'] }}</a></h3>
  		<p>
  			Автор: <strong>{{ isset($joke['@attributes']['author']) ? $joke['@attributes']['author'] : 'Неизвестен' }}</strong>
  			<strong> &middot; </strong>
				Дата: <strong>{{ isset($joke['@attributes']['date']) ? $joke['@attributes']['date'] : 'Неизвестна' }}</strong>
  		</p>
  	</div>
	@endforeach

@stop