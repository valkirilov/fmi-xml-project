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

		  <div class="form-group">
		    <label for="input-occasion">Повод</label>
		    <input type="text" name="occasion" class="form-control" id="input-occasion" placeholder="Повод" value="{{ isset($joke) && isset($joke['occasion']) ? $joke['occasion'] : '' }}">
		  </div>

		  <div class="form-group">
		    <label for="input-quotes">Цитира</label>
		    <input type="text" name="quotes" class="form-control" id="input-quotes" placeholder="Цитира" value="{{ isset($joke) && isset($joke['quotes']) ? $joke['quotes'] : '' }}">
		  </div>

		  <div class="form-group">
		    <label for="input-context">Контекст</label>
		    <input type="text" name="context" class="form-control" id="input-context" placeholder="Контекст" value="{{ isset($joke) && isset($joke['context']) ? $joke['context'] : '' }}">
		  </div>

		  <div class="form-group">
		    <label for="input-lesson">Поука</label>
		    <input type="text" name="lesson" class="form-control" id="input-lesson" placeholder="Поука" value="{{ isset($joke) && isset($joke['lesson']) ? $joke['lesson'] : '' }}">
		  </div>

		  <div class="form-group">
		    <label for="input-rating">Рейтинг</label>
		    <input type="text" name="rating" class="form-control" id="input-rating" placeholder="Рейтинг" value="{{ isset($joke) && isset($joke['rating']) ? $joke['rating'] : '' }}">
		  </div>

		  <button type="submit" class="btn btn-default">Запази</button>
		</form>

	</div>

@stop