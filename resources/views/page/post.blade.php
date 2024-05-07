@extends('layout.main')
@section('body')
    <h1>Post</h1>
    <div>
        <h1>Tambah Post</h1>
        <form action="{{ route('post') }}" method="post">
            @csrf
            <table>
                <tr>
                    <td>Title</td>
                    <td>:</td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td>:</td>
                    <td>
                        <textarea name="content" id="" cols="30" rows="10"></textarea>
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
    <h1>Details Post</h1>
    <div>
        <table>
            <tr>
                <td>#</td>
                <td>title</td>
                <td>content</td>
                <td>date</td>
                <td></td>
            </tr>
            @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <form action="{{route('editPost')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button type="submit">Edit</button>
                        </form>
                        <form action="{{route('post')}}" method="POST">
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
