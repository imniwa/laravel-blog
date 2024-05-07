@extends('layout.main')
@section('body')
<h1>
    LOGIN
</h1>
<form action="/auth/login" method="POST">
    @csrf
    <table>
        <tr>
            <td>username</td>
            <td>:</td>
            <td>
                <input type="text" name="username">
            </td>
        </tr>
        <tr>
            <td>password</td>
            <td>:</td>
            <td>
                <input type="password" name="password">
            </td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                <button type="submit">LOGIN</button>
            </td>
        </tr>
    </table>
</form>
@endsection