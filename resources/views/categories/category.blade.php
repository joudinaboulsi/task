@extends('admin.master')
@section('title')
    Categories
@stop

@section('content')
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="#" data-toggle="modal" data-target="#addcategory" class="btn btn-outline-primary">New
                    Category</a>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
           <div class="card-header">
                <h4>Categories</h4>


                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>

                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        <tr>
                            <?php $i = 0; ?>
                            @foreach ($categories as $x)
                                <?php $i++; ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $x->title }}</td>
                            <td>{{ $x->description }}</td>


                            <td><a href="#" data-toggle="modal" data-target="#editcategory" data-id="{{ $x->id }}"
                                    data-title="{{ $x->title }}" data-description="{{ $x->description }}"
                                    class="btn btn-icon icon-left btn-success">Update</a>


                                <a href="#" data-toggle="modal" data-target="#deltecategory" data-id="{{ $x->id }}"
                                    data-title="{{ $x->title }}" class="btn btn-icon icon-left btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <!-- category -->
    <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categories.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Title</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                </div>

                                <input type="text" class="form-control" placeholder="title" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-hand-peace"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="description" name="description">
                            </div>
                        </div>


                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>


    <!--edit category -->

    <div class="modal fade" id="editcategory" tabindex="-1" role="dialog" aria-labelledby="editcategory"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="categories/update" method="post" autocomplete="off">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label>Title</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                </div>

                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-hand-peace"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                        </div>


                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>

    <!--Delete -->
    <div class="modal fade" id="deltecategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delte category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="categories/destroy" method="post">

                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id" value="delete">
Are you sure?
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    </div>
    </div>
    </div>
@endsection
@section('customscript')

    <script>
        $(function() {
            $('#editcategory').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                var id = button.data('id')
                var title = button.data('title')
                var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #title').val(title);
                modal.find('.modal-body #description').val(description);
            });



            $('#deltecategory').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')

                var modal = $(this)
                modal.find('.modal-body #id').val(id);

            });
        });
    </script>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/prism/prism.js"></script>
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
@endsection
