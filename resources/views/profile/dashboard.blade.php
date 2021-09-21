@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

  <!-- Hero -->
  <div class="best_mn">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <h1>My Account Dashboard</h1>
           </div>
        </div>
     </div>
  </div>
  <div class="tb_blt">
         <div class="container">
            <div class="row">
              @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                          <strong>{{ $message }}</strong>
                      </div>
                    @endif
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif 
               <div class="col-md-1"></div>
               <div class="col-md-9">
                  <div class="vertical-tab" role="tabpanel">
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-user-o"></i> Your Profile</a></li>
                        <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">
                           <i class="fa fa-shopping-cart"></i> Your Orders</a>
                        </li>
                        <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">
                           <i class="fa fa-map-marker"></i> Manage Addresses</a>
                        </li>
                        
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content tabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                           <div class="card-container">
                             
                              <div class="card-info">
                                 <form action="{{route('profile.info')}}" method="post">
                                  @csrf
                                  <h6 class="heading-small text-muted mb-4">User information</h6>
                                  <div class="pl-lg-12">
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <p>Leave any field empty to keep the same<p>
                                      </div>
                                    </div>
									
									 <div class="fmmm">
									
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-username">Name</label>
                                          <input type="text" name="name" class="form-control" placeholder="{{auth()->user()->name}}">
                                        </div>
                                      </div>
                                   
                                    
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-email">Email address</label>
                                          <input type="email" name="email" class="form-control" placeholder="{{auth()->user()->email}}">
                                        </div>
                                      </div>
                                    </div>
									</div>
									
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-first-name">Password</label>
                                          <input type="password" name="password" id="input-first-name" class="form-control">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <div class="form-group">
                                          <button type="submit" class="btn btn-info">Save</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                                <hr class="my-4" />
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Upload Avatar</h6>
                                <div class="pl-lg-12">
                                  <div class="row">
                                    <div class="col-md-12">
                                      
                                        <form method="post" action="{{route('profile.avatar_remove')}}">
                                          @csrf
                                            @if(auth()->user()->avatar!='users/default.png')
                                              <img src="{{Voyager::image(auth()->user()->avatar)}}">
                                              <div class="row my-2">
                                                <div class="col-6">
                                                  <button type="submit" class="btn btn-sm btn-danger">Remove Avatar</button>
                                                </div>
                                              </div>
                                            @else
                                              <img class="uspcc" src="{{Voyager::image(auth()->user()->avatar)}}">
                                            @endif
                                        </form>
                                        <form method="post" action="{{route('profile.avatar')}}" enctype="multipart/form-data">
                                          @csrf
                                            <div class="row">
                                              <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="avatar">
                                                    </div>    
                                                </div>
                                              </div>
                                            </div>
                                            
                                          <div class="row">
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <button type="submit" class="btn btn-info">Upload avatar</button>
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                           <div class="oder-box">
                              <div class="box-body table-responsive-sm no-padding">    
                                <table class="table table-bordered tb-wd" id="orders-table">
                                    <thead>
                                        <tr>
                                            <th>Invoice Number</th>
                                            <th>Billing Address</th>
                                            <th>Status</th>
                                            <th>Order Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Section3">
                           <h3>YOUR ADDRESS</h3>
                           <?php 
                            if($customer){
                                $billing_address= $customer->billing_address;
                                $billing_address1= $customer->billing_address_2;
                                $billing_city= $customer->billing_city;
                                $billing_state= $customer->billing_state;
                                $billing_zip= $customer->billing_zip;
                                $billing_country= $customer->billing_country;
                                $shipping_address= $customer->shipping_address;
                                $shipping_city= $customer->shipping_city;
                                $shipping_state= $customer->shipping_state;
                                $shipping_zip= $customer->shipping_zip;
                                $shipping_country= $customer->shipping_country;
                            }
                            else{
                                $billing_address= '';
                                $billing_address1= '';
                                $billing_city= '';
                                $billing_state= '';
                                $billing_zip= '';
                                $billing_country='';
                                $shipping_address= '';
                                $shipping_city= '';
                                $shipping_state= '';
                                $shipping_zip= '';
                                $shipping_country='';
                            }
                            ?>
                            <form action="{{route('profile.billing')}}" method="post">
                              @csrf
                           <div class="mb-3">
                              <label class="lblclr" for="address">Address 1</label>
                              <input type="text" name="billing_address" class="form-control" value="{{$billing_address}}">
                           </div>
                           <div class="mb-3">
                              <label class="lblclr" for="address">Address 2</label>
                              <input type="text" name="billing_address" class="form-control" value="{{$billing_address1}}">
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label lblclr" for="country">Billing country</label>
                                 <select name="billing_country" class="form-control" id="billing_country">
                                @foreach ($countries as $country)
                                  <option value="{{$country}}" {{$billing_country==$country?'selected':''}}>{{$country}}</option>
                                @endforeach
                              </select>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4 mb-3">
                                 <label class="lblclr" for="city">City</label>
                                 <input type="text" name="billing_city" class="form-control" value="{{$billing_city}}">
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label class="lblclr" for="state">State</label>
                                 <input type="text" name="billing_state" id="input-first-name" class="form-control" value="{{$billing_state}}">
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label class="lblclr" for="zip">zip</label>
                                 <input type="text" name="billing_zip" id="input-first-name" class="form-control" value="{{$billing_zip}}">
                              </div>
                              <div class="col-md-4 mb-3">
                              <button type="submit" class="btn btn-info">Save</button>
                              </div>
                           </div>
                         </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Section4">
                           sdfvw
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

  <section class="section py-5 bg-soft">
    <div class="container">
      <div class="row justify-content-center">
  
        @include('partials.dashboardsidebar')

        <div class="col-md-8">
            <div class="card border-light">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                    @endif

                    This is your dashboard. You can edit your <a href="/dashboard/edit-info">details</a> or visit your <a href="/dashboard/orders">orders</a> from here.
                </div>
            </div>
        </div>
    </div>
    </div>
  </section>
  

@endsection

@section('javascript')
    <script>
      
      $(document).ready(function() {
  "use strict";

  $('#orders-table').DataTable({
    order: [[ 0, "desc" ]],
    processing: true,
    serverSide: true,
    ajax: "{{url('dashboard/user-orders')}}",
    columns: [
      { data: 'invoice_id', name: 'invoice_id' },
      { data: 'billing_address', name: 'billing_address' },
      { data: 'status', name: 'status' },
      { data: 'created_at', name: 'created_at' },
      {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
  });
});
    </script>   
@endsection
