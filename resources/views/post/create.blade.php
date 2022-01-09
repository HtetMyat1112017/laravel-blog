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
                        <form action="{{route('post.store')}}" method="post">
                            @csrf
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title')  is-invalid @enderror" value="{{old('title')}}" name="title">
                                    @error('title')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select name="category" class="form-select @error('category') is-invalid @enderror" id="">
                                        <option>select category</option>
                                        @foreach(\App\Models\Category::all() as $categories)
                                            <option value="{{$categories->id}}">{{$categories->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description')  is-invalid @enderror" name="description">{{old('description')}}</textarea>
                                    @error('description')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                            <div class="d-flex justify-content-between align-items-end">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" required id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Confirm</label>
                                </div>
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

