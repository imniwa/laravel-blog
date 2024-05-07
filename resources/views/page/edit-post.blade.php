@extends('layout.main')
@section('body')
<div>
    <h1>Edit Post</h1>
    <form action="{{ route('editPost') }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="{{$data->id}}">
        <table>
            <tr>
                <td>Title</td>
                <td>:</td>
                <td><input type="text" name="title" value="{{$data->title}}"></td>
            </tr>
            <tr>
                <td>Content</td>
                <td>:</td>
                <td>
                    <textarea name="content" id="" cols="30" rows="10">{{$data->content}}</textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit">Update</button></td>
            </tr>
        </table>
    </form>
</div>
@endsection