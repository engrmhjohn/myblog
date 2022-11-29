@extends('admin.master')
@section('title')
    Manage Blog
@endsection
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <h1 class="mt-4">{{ Session('message') }}</h1>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Blog Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $blog->blog_title }}</td>
                            <td>{{ $blog->author }}</td>
                            <td>{{ $blog->category }}</td>
                            <td>{!! substr($blog->description,0,400).'.......' !!}</td>
                            <td><img src="{{ asset($blog->image) }}" alt="" style="height: 80px; width: 80px;"></td>
                            <td>{{ $blog->status==1? 'Published':'Unpublished'}}</td>
                            <td>
                                @if($blog->status==1)
                                    <a class="btn btn-warning" href="{{ route('status',['id'=>$blog->id]) }}">Unpublished</a>
                                @else
                                    <a class="btn btn-info" href="{{ route('status',['id'=>$blog->id]) }}">Published</a>
                                @endif
                                    <a class="btn btn-info" href="{{ route('edit-blog',['id'=>$blog->id]) }}">Edit</a>
                                    <form action="{{ route('delete-blog') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" value="{{ $blog->id }}" name="blog_id">
                                        <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="card-footer text-center py-3">
                    <a class="form-control btn btn-secondary" href="{{ route('add-blog') }}">Go to Add Blog</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
