@extends('adminDashboard.master')
@section('content')

<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                                @if ($errors->any())
                                    <div class="row mb-3">
                                        <div class="col-md-12 alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                                {{ $errors->first() }}
                                        </div>
                                    </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('success') }}
                                </div>
                            @endif
                           
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="card" style="margin-top:15px;">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                    <h4 class="mb-0">Users List</h4>
                    <p>Get the list of all users of the system, view, add , edit and delete users.</p>
                 </div>
                 <div class="col-md-6 align-items-center">
                  <a role="button"  class="btn btn-success float-right d-inline-block d-flex align-items-center" id="">Add New User</a>
                </div>
                </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
              {!! $dataTable->table() !!}
              </div>
              <!-- /.card-body -->
            </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
           
<div class="modal" id="deleteUserModal" tabindex="1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you really want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirmDeleteUserBtn">Delete User</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}


@endpush