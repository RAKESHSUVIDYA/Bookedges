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
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form method="post" action="{{url('admin/vendor/store')}}">
                        {{ csrf_field() }}
                        <div class="col-sm-6">
                            <label>Vendor Name</label>
                            <input type="text" class="form-control" name="vendorName">
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" class="ntn btn-success" name="Save" value="Save">
                        </div>
                    </form>
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