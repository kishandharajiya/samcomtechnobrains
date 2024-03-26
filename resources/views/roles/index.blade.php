@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Roles Management') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('roles.edit')}}">
                            @csrf
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Module</th>
                                        <th>List</th>
                                        <th>Create</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('roles.list') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'permission_list',
                        name: 'permission_list'
                    },
                    {
                        data: 'permission_create',
                        name: 'permission_create'
                    },
                    {
                        data: 'permission_edit',
                        name: 'permission_edit'
                    },
                    {
                        data: 'permission_delete',
                        name: 'permission_delete'
                    },
                ]
            });

        });
    </script>
@endsection
