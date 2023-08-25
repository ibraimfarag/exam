@extends('layout.backend.app', [
    'title' => 'home page exam',
    'pageTitle' => 'home page exam',
])
@section('content')
    <h1>Edit Card</h1>
    <form action="{{ route('cards.update', $card->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $card->title }}">

        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $card->description }}</textarea>

        <label for="price">price:</label>
        <input type="text" name="price" id="price" value="{{ $card->price }}">

        <button type="submit">Update</button>
    </form>
    <a href="{{ route('cards.index') }}">Back to List</a>
@stop
