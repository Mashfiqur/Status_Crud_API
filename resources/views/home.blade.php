@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Share your status with everyone</div>

                <div class="card-body">
                <form action="{{url('/status_post')}}" method="post">
                @csrf
                <textarea name="post" rows="4" cols="106" placeholder="What's on your mind, {{ Auth::user()->name }}?"></textarea>
                <div class="row">
                <div class="col-10">
                </div>
                <div class="col-2">
                <button type="submit" class="btn btn-dark">Post</button>
                </div>
                </div>
               
                </form>
              

                </div>
            </div>
<br>

         @foreach($statuses as $status)
         <div class="card mt-3">
         <div class="card-body">

            <h5>{{ $status->user->name }}</h5>
            <p>
            {{ $status->status }}
            </p>



         </div>
         </div>
         @endforeach
        
        </div>
    </div>
</div>
@endsection
