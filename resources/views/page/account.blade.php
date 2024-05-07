@extends('layout.main')
@section('body')
    <h1>Account</h1>
    <div>
        <h1>Tambah Account</h1>
        <form action="{{ route('account') }}" method="post">
            @csrf
            <table>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td>
                        <select name="role">
                            <option value="admin">Admin</option>
                            <option value="author">Author</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button type="submit">Post</button></td>
                </tr>
            </table>
        </form>
    </div>
    <h1>Details Account</h1>
    <div>
        <table>
            <tr>
                <td>#</td>
                <td>name</td>
                <td>username</td>
                <td>role</td>
                <td></td>
            </tr>
            @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->role }}</td>
                    <td>
                        <form action="{{route('editAccount')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button type="submit">Edit</button>
                        </form>

                        <form action="{{route('account')}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
