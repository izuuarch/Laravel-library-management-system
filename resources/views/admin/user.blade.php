@include('admin/partials/header')
<div class="container-fluid">
	<div class="row">
        @if ($user)
        <div class="col-lg-4 col-md-6 mt-5">
            <div class="card card-bordered">
                
                <div class="card-body text-center">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Username</label>
                        <input class="form-control" type="text" required="" name="username" value="{{$user->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Email</label>
                        <input class="form-control" type="text" required="" name="" value="{{$user->email}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Usertype</label>
                        <input class="form-control" type="text" required="" name="" value="{{$user->usertype}}" readonly>
                    </div>
              
                </div>
            </div>
        </div>
        @endif 
       
      
    </div>
</div>
@include('admin/partials/footer')