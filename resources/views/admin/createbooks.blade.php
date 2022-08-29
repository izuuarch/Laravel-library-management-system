@include('admin/partials/header')
<div class="container">
    <h1>Create Books for collection</h1>
    @include('messages')
    <div class="row p-4">
        <div class="col-md-10">
            <!-- <form action="/user/question" method="POST" enctype="multipart/form-data"> -->
            <form action="{{route('createbook')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
                <label for="title">Booktitle</label>
                <input type="text" class="form-control" name="booktitle"  placeholder="bookname">
            </div>
 
             <div class="form-group">
                     <label for="file">Book image</label>
                     <input type="file" class="form-control"  name="bookimage">
                 </div>
 
            <div>
                <label for="description">Write book details</label>
                <textarea name="bookdetails" class="ckeditor php form-control" placeholder="description" rows="10"></textarea>
            </div>
            <div class="form-group">
            <button class="btn btn-outline-success btn-lg" type="submit">Create Book</button>
                 </div>
            </form>
        </div>
    </div>
 </div>
@include('admin/partials/footer')