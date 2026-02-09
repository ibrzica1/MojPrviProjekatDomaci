
@extends("layout")
@section("pageTitle")
    All Contacts
@endsection
@section("content")
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Email</th>
        <th scope="col">Title</th>
        <th scope="col">Message</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
            <tr>
                <th>{{$contact->id}}</th>
                <td>{{$contact->email}}</td>
                <td>{{$contact->title}}</td>
                <td>{{$contact->message}}</td>
                <td>
                    <a href="{{route('contactDelete',['contact' => $contact->id])}}" class="btn btn-danger">Delete</a>
                    <a class="btn btn-primary">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection