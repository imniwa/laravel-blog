@extends('layout.main')
@section('body')
<div>
    <h1>Edit Account</h1>
    <form action="{{ route('editAccount') }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        @csrf
        <table>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><input type="text" name="name" value="{{$data->name}}"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" value="{{$data->username}}"></td>
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
                        <option value="admin" @if($data->role === 'admin') checked @endif>Admin</option>
                        <option value="author" @if($data->role === 'author') checked @endif>Author</option>
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
@endsection