@include('admin/partials/header')
<div class="container-fluid">
	<div class="row">
        @forelse ($users as $user)
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
                    <div class="form-group">
                        <a href="view/{{$user->id}}" class="btn btn-success">View profile</a>
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