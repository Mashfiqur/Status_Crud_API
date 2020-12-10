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
            <div class="row">
                <div class="col-md-10">
                <h4 class="text-primary">{{ $status->user->name }}</h4>
                            <p class="text-secondary">
                            {{ $status->status }}
                            </p>
                </div>
                <div class="col-md-2 my-4">
                    <a class="btn btn-sm" data-toggle="modal" data-target="#viewQuote{{$status->id}}" data-placement="top" title="View"><i class="text fa fa-eye" aria-hidden="true"></i></a>
                    <a class="btn btn-sm" data-toggle="modal" data-target="#editQuote{{$status->id}}" title="Edit"><i class="text fa fa-pencil" aria-hidden="true"></i></a>
                    <a class="btn btn-sm" data-toggle="modal" data-target="#deleteQuote{{$status->id}}" title="Delete"><i class="text fa fa-trash" aria-hidden="true"></i></a>
                </div>
            </div>



 <!-- View modal start-->
 <div class="modal fade text-left" id="viewQuote{{$status->id}}" tabindex="-1"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">View Quote</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body px-5">
                                            <input type="number" name="id" value="{{ $status->id }}" hidden>
                                            </div>
                                            <div class="m-3">
                                            <h3><strong>Author: </strong> {{ $status->user->name }}</h3>
                                            <h4><strong>Quote:</strong>  {{ $status->status }}</h4>
                                            <p><strong>Quote-Time:</strong> @php echo e(date('M d, Y h:i A', strtotime($status->created_at )))@endphp</p>
                                            </div>
                                          
                                            <div class="modal-footer pb-4">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                                                   <i class="lni lni-cross-circle"></i> Close
                                                </button>
                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!-- View modal end-->







       <!-- Edit modal start-->
       <div class="modal fade text-left" id="editQuote{{$status->id}}" tabindex="-1"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Are you sure you want to
                                                    delete?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body px-5">
                                            <form method="post" action="{{ url('/status/update') }}">
                                                    @csrf
                                                    <input type="number" name="id" value="{{ $status->id }}" hidden>


                                                    <div class="form-group ">
                                                        <label >Author Name</label>
                                                        <input type="text" name="name" class="form-control"
                                                               
                                                               value="{{$status->user->name}}" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group ">
                                                        <label >Quote</label>
                                                        <input type="text" name="quote" class="form-control"
                                                               
                                                               value="{{$status->status}}">
                                                    </div>
                                            </div>
                                            <div class="modal-footer pb-4">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!-- Edit modal end-->


<!-- delete modal start-->
            <div class="modal fade text-left" id="deleteQuote{{$status->id}}" tabindex="-1"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Are you sure you want to
                                                    delete?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body px-5">
                                                Please click the delete button to delete the product.
                                            </div>
                                            <div class="modal-footer pb-4">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                                                   <i class="lni lni-cross-circle"></i> Close
                                                </button>
                                                <a class="btn btn-sm btn-danger"
                                                   href="{{url('/status/delete/'.$status->id)}}"><i
                                                        class="lni lni-trash"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!-- delete modal end-->


         </div>
         </div>
         @endforeach
        <div class="mt-3">{{ $statuses->links() }}</div>
        </div>
    </div>
</div>
@endsection
