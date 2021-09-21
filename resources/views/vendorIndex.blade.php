@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- custom CSS -->
    <link type="text/css" href="{{asset('frontend/voyager-css/css/order-edit-add.css')}}" rel="stylesheet">
    
    @livewireStyles
@stop
@section('page_title', __('voyager::generic.'.('list')))
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-book"></i>
        {{ __('voyager::generic.'.('list'))}}
    </h1>
    <a href="{{url('admin/vendor/create')}}"><button class="btn btn-success">Create Vendor</button></a>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                	<th>Id</th>
                                	<th>Vendor Name</th>
                                	<th>Action</th>
                                </tr>
                                    
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
	<link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@stop
@section('javascript')
	<script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
	<script type="text/javascript">
		var table = $('#dataTable').DataTable();
	</script>

@stop