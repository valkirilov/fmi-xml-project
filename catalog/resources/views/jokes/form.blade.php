@extends('layouts.base')

@section('content')

	<div class="container">
	
		<form method="post" action="{{ isset($joke) && isset($joke['id']) ? '/edit' : '/add' }}">

			<input type="hidden" name="id" class="form-control" id="input-id" value="{{ isset($joke) && isset($joke['id']) ? $joke['id'] : '' }}" />

		  <div class="form-group">
		    <label for="input-content">Бисер</label>
		    <input type="text" name="content" class="form-control" id="input-content" placeholder="Бисер" value="{{ isset($joke) && isset($joke['content']) ? $joke['content'] : '' }}" />
		  </div>

		  <div class="form-group">
		    <label for="input-author">Автор</label>
		    <input type="text" name="author" class="form-control" id="input-author" placeholder="Автор" value="{{ isset($joke) && isset($joke['author']) ? $joke['author'] : '' }}" />
		  </div>

		  <div class="form-group">
		    <label for="input-lecture">Лекция/Упражнение</label>
		    <input type="text" name="lecture" class="form-control" id="input-lecture" placeholder="Лекция/Упражнение" value="{{ isset($joke) && isset($joke['lecture']) ? $joke['lecture'] : '' }}">
		  </div>

		  <div class="form-group">
		    <label for="input-date">Дата</label>
		    <input type="text" name="date" class="form-control" id="input-date" placeholder="Дата" value="{{ isset($joke) && isset($joke['date']) ? $joke['date'] : '' }}">
		  </div>
		  
		  <button type="submit" class="btn btn-default">Запази</button>
		</form>

	</div>

@stop