@extends('layouts.main')

@section('title', 'Users')

@section('content')
    <div class="row align-items-center mt-5">
        <div class="col-md-9">
            <h2 class="d-inline-block mr-3">Users</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Number of posts</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->posts->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center">
                <div class="col-lg-12 offset-10">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
