@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-2 d-flex justify-content-between align-items-center">
                    <a href="{{route('category.create')}}" class="btn btn-primary">Category Create
                        <i class="fa fa-plus-circle fa-1x"></i></a>
                    <form method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search ">
                            <button  class="btn btn-primary" type="submit">Button</button>
                        </div>
                    </form>
                </div>
                @if(session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session('status')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>User</th>
                        <th>Action</th>
                        <th>Created_at</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{\Illuminate\Support\Str::words($post->title,10)}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->user->name}}</td>
                            <td class="d-flex">

                                <div class="btn-group">
                                    <a href="{{route('post.show',$post->id)}}" class="btn btn-outline-primary ">
                                        <i class="fa fa-info fa-fw"></i>
                                    </a>
                                    <a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-primary ">
                                        <i class="fa fa-upload"></i>
                                    </a>

                                    <button class="btn  btn-outline-primary " form="formId{{$post->id}}">
                                        <i class="fa fa-trash fa-1x"></i>
                                    </button>
                                </div>
                                <form action="{{route('post.destroy',$post->id)}}" id="formId{{$post->id}}" method="post">
                                    @csrf
                                    @method('delete')

                                </form>
                            </td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="5" ><b>There is no data</b></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center">
                    {{$posts->appends(request()->all())->links()}}
                    <p class=" font-weight-bold mb-0 h4">Total : {{ $posts->total() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
