@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <a href="{{route('category.create')}}" class="btn btn-primary">Category Create
                    <i class="fa fa-plus-circle fa-1x"></i></a>
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
                            <th>User</th>
                            <th>Action</th>
                            <th>Created_at</th>

                        </tr>
                    </thead>
                    <tbody>
                    @forelse($category as $categories)
                        <tr>
                            <td>{{$categories->id}}</td>
                            <td>{{$categories->name}}</td>
                            <td>{{$categories->user->name}}</td>
                            <td class="d-flex">
                                <form action="{{route('category.destroy',$categories->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn  btn-danger mx-2">
                                        <i class="fa fa-trash fa-1x"></i>
                                    </button>
                                </form>
                                <a href="{{route('category.edit',$categories->id)}}" class="btn btn-warning ">
                                    <i class="fa fa-upload"></i>
                                </a>

                                </td>
                                <td>{{$categories->created_at->diffForHumans()}}</td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="5" ><b>There is no data</b></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                <div class="">
                    {{$category->links()}}
                </div>
                </div>
            </div>
        </div>
    @endsection
