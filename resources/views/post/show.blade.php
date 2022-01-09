@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
               <div class="card">
                   <div class="card-header">
                       <h4>{{$post->title}}</h4>
                       <span class="badge bg-primary">{{$post->category->name}}</span>
                       <span class="badge bg-primary">{{$post->created_at->diffForhumans()}}</span>
                   </div>
                   <div class="card-body">
                       <p>{{$post->description}}</p>
                       <hr>
                      <div class="text-center">
                          <a href="{{route('post.index')}}" class="btn btn-primary">All Post</a>
                      </div>
                   </div>
               </div>


            </div>
        </div>
    </div>
@endsection
