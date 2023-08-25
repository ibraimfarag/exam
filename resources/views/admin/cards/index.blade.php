@extends('layout.backend.app', [
    'title' => 'home page exam',
    'pageTitle' => 'home page exam',
])
@section('content')
    <h1>List of Cards</h1>
    <table style="width:400px">
        <thead>
            <tr>

                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cards as $card)
                <tr>

                    <td>{{ $card->title }}</td>
                    <td>{{ $card->description }}</td>
                    <td>{{ $card->price }}</td>
                    <td>
                        <a href="{{ route('cards.edit', $card->id) }}">Edit</a>
                        <form action="{{ route('cards.destroy', $card->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('cards.create') }}">Create New Card</a>
@stop
