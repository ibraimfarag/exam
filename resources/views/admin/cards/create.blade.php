@extends('layout.backend.app', [
    'title' => 'home page exam',
    'pageTitle' => 'home page exam',
])
@section('content')
    <h1>Create New Card</h1>
    <form action="{{ route('cards.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="images[]" multiple>


        <label for="title">Title:</label>
        <input type="text" name="title" id="title">

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>


        <label for="price">price:</label>
        <input type="text" name="price" id="price">



        <button type="submit">Create</button>
    </form>
    <a href="{{ route('cards.index') }}">Back to List</a>
@stop
