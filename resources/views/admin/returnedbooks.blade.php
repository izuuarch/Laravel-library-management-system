@include('admin/partials/header')
<div class="container-fluid">
    @include('messages')
	<div class="row">
        @forelse ($returnedbooks as $fetch)
        <div class="col-lg-4 col-md-6 mt-5">
            <div class="card card-bordered">
                
                <div class="card-body text-center">
                    <div>
                        <img src="{{ asset('/uploads/'.$fetch->bookimage) }}" alt="" class="image-fluid" width="200px">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Book Name</label>
                        <input class="form-control" type="text" required="" name="username" value="{{$fetch->bookname}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Book description</label>
                     <textarea name="" id="" cols="30" rows="5" readonly>{{$fetch->bookdetails}}</textarea>
                    </div>
                    <div class="form-group">
                      <a href="viewrequests/{{$fetch->bookid}}" class="btn btn-success">View Requests for these book</a>
                    </div>
                    
                </div>
            </div>
        </div>
        @empty
        <div class="col-lg-4 col-md-6 mt-5">
            <div class="card card-bordered">
                
                <div class="card-body text-center">
                    <h5 class="title"><b></b></h5>
                    <input type="text" readonly value="asdfg" class="form-control">
                </div>
            </div>
        </div>
        @endforelse
</div>
</div>
@include('admin/partials/footer')