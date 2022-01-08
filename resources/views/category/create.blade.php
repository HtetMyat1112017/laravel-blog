@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if(session('status'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           {{session('status')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    <div class="card-header">
                        <h4>Category Create</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <div class="row align-items-end">
                                <div class="col-6 col-lg-4">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title')  is-invalid @enderror" value="{{old('title')}}" name="title">
                                    @error('title')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-primary">Add Category</button>
                                </div>
                            </div>
                        </form>

                        <table class="table table-hover table-bordered mt-5">
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
                        <div class="text-center">
                            <a href="{{route('category.index')}}" class="btn btn-primary">
                                <i class="fa fa-list me-2"></i>Show All List
                           </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
