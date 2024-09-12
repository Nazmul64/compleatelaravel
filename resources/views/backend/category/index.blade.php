@extends('layouts.admin')

@section('main_content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
               <h3>
                <a type="button" id="exampleModal" class="btn btn-success mb-1"data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Added</a>
               </h3>
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ $item->category_slug }}</td>
                                <td>
                                 <a href=""data-toggle="modal" data-id="{{$item->id}}" data-target="#edit" data-toggle="modal" data-target="editleModal" class="btn btn-success edit"><i class="fa fa-edit"></i></a>
                                 <a href="{{route('category.delete',$item->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                               </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post"action="{{route('category.store')}}">
            @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category Name</label>
            <input type="text" name="category_name" class="form-control" id="recipient-name"placeholder="Enter Your Category Name">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--------edit-model--->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit">Edit Category </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post"action="{{route('category.categoryupdate')}}">
              @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label"> Category Edit</label>
              <input type="text" name="category_name" id="e_category_name" class="form-control" id="recipient-name"placeholder="Enter Your Category Name">
              <input type="hidden" name="id" class="form-control" id="e_category_id"placeholder="Enter Your Category Name">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script type="text/javascript">
     $('body').on('click','.edit',function(){
        let cat_id =$(this).data('id');
        $.get('category/edit/' +cat_id, function(data){
          $('#e_category_name').val(data.category_name);
          $('#e_category_id').val(data.id)
        });
     });
  </script>
  <!--------edit-model--->
