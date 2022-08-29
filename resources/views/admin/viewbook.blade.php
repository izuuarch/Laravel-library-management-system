@include('admin/partials/header')
<div class="container-fluid">
    @include('messages')
	<div class="row">
        @if ($fetch)
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
          
                    
                </div>
            </div>
        </div>
        @endif

</div>
</div>
@include('admin/partials/footer')