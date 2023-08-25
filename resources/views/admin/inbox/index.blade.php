@extends('layout.backend.app', [
    'title' => 'home page exam',
    'pageTitle' => 'home page exam',
])
@section('content')
    <div class="container">
        <h1>Contact Form Submissions</h1>

        @if ($submissions->isEmpty())
            <p>No submissions found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Investment Amount</th>
                        <th>Message</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submissions as $submission)
                        <tr>
                            <td>{{ $submission->name }}</td>
                            <td>{{ $submission->email }}</td>
                            <td>{{ $submission->phone_number }}</td>
                            <td>{{ $submission->investment_amount }}</td>
                            <td>{{ $submission->message }}</td>
                            <td>{{ $submission->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@stop
