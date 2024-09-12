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
                    <a type="button" id="addCategoryModal" class="btn btn-success mb-1" data-toggle="modal" data-target="#addModal">Add New Category</a>
                </h3>
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Subcategory Name</th>
                            <th>Category Slug</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategory as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->subcategory_name }}</td>
                                <td>{{ $item->subcategory_slug }}</td>
                                <td>{{ $item->category->category_name }}</td>
                                <td>
                                    <a href="javascript:void(0)" data-toggle="modal" class="btn btn-success edit" data-id="{{ $item->id }}" data-target="#editModal"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('subcategory.delete', $item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add New Subcategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('subcategory.store') }}">
                    @csrf
                    <div class="form-group">
                        <select name="category_id" class="form-control">
                            @foreach ($category as $items)
                                <option value="{{ $items->id }}">{{ $items->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory_name" class="col-form-label">Subcategory Name</label>
                        <input type="text" name="subcategory_name" class="form-control" placeholder="Enter Subcategory Name">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Subcategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    @csrf
                    <input type="hidden" name="id" id="subcategory_id">
                    <div class="form-group">
                        <select name="category_id" class="form-control">
                            @foreach ($category as $items)
                                <option value="{{ $items->id }}">{{ $items->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="e_subcategory_name" class="col-form-label">Subcategory Name</label>
                        <input type="text" name="subcategory_name" class="form-control" id="e_subcategory_name" placeholder="Enter Subcategory Name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $('body').on('click', '.edit', function () {
        let subcategory_id = $(this).data('id');
        $.get('/subcategory/edit/' + subcategory_id, function (data) {
            $('#e_subcategory_name').val(data.subcategory_name);
            $('#subcategory_id').val(data.id);
        });
    });
</script>
