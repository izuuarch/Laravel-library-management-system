@include('user/partials/header')
<div class="container-fluid">
	<div class="row">
        @if ($viewbook)
        <div class="col-lg-4 col-md-6 mt-5">
            <div class="card card-bordered">
                
                <div class="card-body text-center">
                    <div>
                        <img src="{{ asset('/uploads/'.$viewbook['bookimage']) }}" alt="" class="image-fluid" width="200px">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Book Name</label>
                        <input class="form-control" type="text" required="" name="username" value="{{$viewbook->bookname}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Book description</label>
                     <textarea name="" id="" cols="30" rows="5" readonly>{{$viewbook->bookdetails}}</textarea>
                    </div>
            
                    
                    {{-- <form action="{{ route('unrequestbook')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$viewbook->bookid}}" name="bookid">
                        <button class="btn btn-success">UnRequest book</button>
                    </form> --}}
                
                    
                    <form action="{{ route('requestbook')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$viewbook->bookid}}" name="bookid">
                        <button class="btn btn-success">Request for the book</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
     
</div>
</div>
@include('user/partials/footer')