@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

  <!-- Hero -->
  <div class="best_mn">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <h1>Checkout</h1>
           </div>
        </div>
     </div>
  </div>
  <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="checkout_mn">

                  <div class="col-md-6">
                    @if (!Auth::user())
                     <div class="lgnbtn">
                        <span class="visually-hidden"> Already have an account?</span>
                        <a href="{{url('login')}}">Log in</a>
                     </div>
                     @endif
                     <?php 
                      $currency=get_current_currency()['symbol'];
                      if(!$customer){
                        $billing_country='';
                        $billing_address='';
                        $billing_address_2="";
                        $billing_city='';
                        $billing_state='';
                        $billing_zip='';
                        $shipping_country='';
                        $shipping_address='';
                        $shipping_city='';
                        $shipping_state='';
                        $shipping_zip='';
                        $shipping_address="";
                      }
                      else{
                        $billing_country=$customer->billing_country;
                        $billing_address=$customer->billing_address;
                        $billing_address_2=$customer->billing_address_2;
                        $billing_city=$customer->billing_city;
                        $billing_state=$customer->billing_state;
                        $billing_zip=$customer->billing_zip;
                        $shipping_country=$customer->shipping_country;
                        $shipping_address=$customer->shipping_address;
                        $shipping_city=$customer->shipping_city;
                        $shipping_state=$customer->shipping_state;
                        $shipping_zip=$customer->shipping_zip;
                        $shipping_address2=$customer->shipping_address;
                      }

                      if(Auth::user()){
                        $name=auth()->user()->name;
                        $email=auth()->user()->email;
                        $shipping_name=auth()->user()->name;
                        $shipping_email=auth()->user()->email;

                      }
                      else{
                        $name=old('name');
                        $email=old('email');
                      }
                                 
                      ?>
                     <form id="billing-form" action="{{route('checkout.process')}}" method="post">
                      @csrf
                        
                        <h4 class="mb-3 spht">Contact information</h4>
                        <div class="mb-3">
                           <label for="name">Full Name</label>
                           <input type="name" class="form-control" name="name" id="name" value="{{$name}}" placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                           <label for="email">Email</label>
                           <input type="email" class="form-control" name="email" id="email" value="{{$email}}" placeholder="you@example.com">
                        </div>
                        <div class="mb-3">
                           <label for="number">Phone Number</label>
                           <input type="number" class="form-control" name="number" value="{{$name}}" id="number" placeholder="">
                        </div>
                        <div class="mb-3">
                           <label for="address">Address 1</label>
                           <input type="text" class="form-control" name="address" id="address" value="{{$billing_address}}" placeholder="1234 Main St">
                        </div>
                        <div class="mb-3">
                           <label for="address">Address 2</label>
                           <input type="text" class="form-control" name="billing_address_2" id="billing_address_2" value="{{$billing_address_2}}" placeholder="1234 Main St">
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="country">Billing country</label>
                                 <select class="form-control" name="country" id="country">
                                  @foreach ($countries as $country)
                                    <option value="{{$country->name}}" {{$billing_country==$country->name?'selected':''}}>{{$country->name}}</option>
                                  @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4 mb-3">
                              <label for="city">City</label>
                              <input type="text" class="form-control" name="city" id="city" value="{{$billing_city}}">
                                                                
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="state">State</label>
                              <input type="text"  class="form-control" name="state" id="state" value="{{$billing_state}}">
                                  
                              
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="zip">Zip</label>
                              <input type="number" class="form-control" name="zip" id="zip" value="{{$billing_zip}}" placeholder="">
                           </div>
                        </div>
                        <div class="lnht">
                           <hr>
                        </div>
                        <div class="row mb-4">
                           <div class="col-md-12">
                              <input class="cekbk" id="same-address" name="shipping_address_different" type="checkbox">
                              <label class="custom-control-label" for="same-address">Shipping address different?</label>
                           </div>
                        </div>
                        <div id="shipping-form" class="d-none">
                           <h4 class="mb-3 spht">Shipping Information</h4>
                           <h4 class="mb-3 spht">Contact information</h4>
                            <div class="mb-3">
                               <label for="shipping_name">Full Name</label>
                               <input type="text" class="form-control" name="shipping_name" id="shipping_name" value="{{$shipping_name}}" placeholder="John Doe">
                            </div>
                            <div class="mb-3">
                               <label for="shipping_email">Email</label>
                               <input type="email" class="form-control" name="shipping_email" id="shipping_email" value="{{$shipping_email}}" placeholder="you@example.com">
                            </div>
                            <div class="mb-3">
                               <label for="shipping_number">Phone Number</label>
                               <input type="number" class="form-control" name="shipping_number" value="{{$shipping_name}}" id="shipping_number" placeholder="">
                            </div>
                           <div class="mb-3">
                              <label for="address">Address 1</label>
                              <input type="text" class="form-control" name="shipping_address" id="ship_address" value="{{$shipping_address}}" placeholder="1234 Main St">
                           </div>
                           <div class="mb-3">
                              <label for="address2">Address 2</label>
                              <input type="text" class="form-control" name="shipping_address2" id="ship_address2" value="{{$shipping_address2}}" placeholder="1234 Main St">
                           </div>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="form-control-label" for="country">Shipping country</label>
                                    <select class="form-control" name="shipping_country" id="shipping_country">
                                      @foreach ($countries as $country)
                                        <option value="{{$country->name}}" {{$shipping_country==$country->name?'selected':''}}>{{$country->name}}</option>
                                      @endforeach
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4 mb-3">
                                 <label for="shipping_city">City</label>
                                 <input type="text" class="form-control" name="shipping_city" id="ship_city" value="{{$shipping_city}}" placeholder="">
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="shipping_state">State</label>
                                 <input type="text" class="form-control" name="shipping_state" id="ship_state" value="{{$shipping_state}}" placeholder="">
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="shipping_zip">Zip</label>
                                 <input type="number" class="form-control" name="shipping_zip" id="ship_zip" value="{{$shipping_zip}}" placeholder="">
                              </div>
                           </div>
                        </div>
                        <hr class="mb-4">
                        <div class="row"></div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed</button>
                     </form>
                  </div>
                  <div class="col-md-6">
                     <div class="modal-content contrlclr">
                        <div class="modal-header hdr_tex">
                           <h5 class="modal-title" id="exampleModalLabel">Order Summary</h5>
                        </div>
                        <div class="modal-body">
                          @foreach (Cart::getContent() as $row)
                          <?php
                                $productData = DB::table('products')->where('id',$row->id)->first();
                                ?>
                           <div class="crd_mn4">
                              <div class="crd_pic"><img src="{{is_null($productData->primary_image)?'/frontend/assets/img/default.png':Voyager::image($productData->primary_image)}}" alt=""></div>
                              <div class="crd_tex">
                                 <p>{{$row->name}} ({{$row->quantity}})</p>
                                 <span>@if ($row->getPriceWithConditions()!=$row->price)
                                  <del>{{$currency}}{{$row->price}}</del>{{$currency}}{{$row->getPriceWithConditions()}}
                                @else
                                  {{$currency}}{{$row->price}}
                                @endif</span>
                              </div>
                           </div>
                           @endforeach
                           <div class="coupon">
                              <h3>Have a coupon?</h3>
                              <div><input required="" placeholder="Enter Coupon Code" type="text" class="coddt" value="" style="flex-grow: 1;"><button class="coddt_btn">APPLY</button></div>
                           </div>
                           <div class="Price_mn3">
                              <h3>Price Summary</h3>
                              <p>Order Total</p>
                              <span>{{$currency}}{{Cart::getSubTotal()}}</span>
                              <p>Items Discount</p>
                              <!-- <span>0</span> -->
                              @if(count(Cart::getConditionsByType('coupon'))!=0)          
                                <!-- <li class="list-group-item d-flex justify-content-between bg-light"> -->
                                  <div class="text-success">
                                    <h6 class="my-0">Promo code (<a href="/cart/discountremove">remove</a>)</h6>
                                    <small>{{Cart::getConditionsByType('coupon')->first()->getName()}}</small>
                                  </div>
                                  <span class="text-success">-{{$currency}}{{two_decimal(Cart::getConditionsByType('coupon')->first()->getCalculatedValue($sum))}}</span>
                                <!-- </li> -->
                                @endif
                              <?php $cartConditions = Cart::getConditions(); ?>
                                @if (count($cartConditions)>0)
                                  @foreach($cartConditions as $condition)
                                    @if ($condition->getType()!='coupon')
                                        <!-- <li class="list-group-item d-flex justify-content-between"> -->
                                          <p>{{$condition->getName()}}</p>
                                          <span>{{$currency}}{{two_decimal($condition->getCalculatedValue(Cart::getSubTotal()))}}</span>
                                        <!-- </li> -->
                                    @endif
                                  @endforeach
                                @endif
                                
                                <!-- <li class="list-group-item d-flex justify-content-between"> -->
                                  <p>Subtotal</p>
                                  <span>{{$currency}}{{Cart::getSubTotal()}}</span>
                                <!-- </li> -->
                                
                              <p>Grand Total</p>
                              <span>{{$currency}}{{Cart::getTotal()}}</span>
                           </div>
                           <!-- <div class="savings_mn">Total savings of ₹77.40 on this order</div> -->
                           <div class="savings_mn2">
                              <h4>Safe and Secure Payment, Easy Return.</h4>
                              <img src="images/cd.png" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
  <!-- <div class="container mt-3">
    <div class="row">
      <div class="col-lg-12 text-center">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>	
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
      </div>
    </div>
  </div>  -->  

  <!-- <div class="container my-5">
    @if (!Auth::user())
      <div class="row mb-5">
        <div class="col-12 col-md-12">
          <div class="alert alert-primary" role="alert">
            Returning customer? <a href="#" id="click_to_login" class="alert-link">click here to login</a>
          </div>

          <div class="card border-light d-none" id="checkout_login">
            <div class="card-body">
              <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing & Shipping section.
              </p>
              <form action="{{route('checkout.login')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email">
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="email">Password</label>
                      <input type="password" class="form-control" name="password">
                    </div>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-lg btn-primary">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div> 
    @endif
    <div class="row">  
      <?php 
      $currency=get_current_currency()['symbol'];
      if(!$customer){
        $billing_country='';
        $billing_address='';
        $billing_city='';
        $billing_state='';
        $billing_zip='';
        $shipping_country='';
        $shipping_address='';
        $shipping_city='';
        $shipping_state='';
        $shipping_zip='';
      }
      else{
        $billing_country=$customer->billing_country;
        $billing_address=$customer->billing_address;
        $billing_city=$customer->billing_city;
        $billing_state=$customer->billing_state;
        $billing_zip=$customer->billing_zip;
        $shipping_country=$customer->shipping_country;
        $shipping_address=$customer->shipping_address;
        $shipping_city=$customer->shipping_city;
        $shipping_state=$customer->shipping_state;
        $shipping_zip=$customer->shipping_zip;
      }

      if(Auth::user()){
        $name=auth()->user()->name;
        $email=auth()->user()->email;
      }
      else{
        $name=old('name');
        $email=old('email');
      }
                 
      ?>
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">{{Cart::getTotalQuantity()}}</span>
        </h4>
        <ul class="list-group mb-3">
          <?php $sum=0;?>
          @foreach (Cart::getContent() as $row)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$row->name}} ({{$row->quantity}})</h6>
              </div>
              <span class="text-muted">
                @if ($row->getPriceWithConditions()!=$row->price)
                  <del>{{$currency}}{{$row->price}}</del>{{$currency}}{{$row->getPriceWithConditions()}}
                @else
                  {{$currency}}{{$row->price}}
                @endif
              </span>
            </li>
            <?php $sum=$sum+$row->getPriceSumWithConditions();?>
          @endforeach
          
          @if(count(Cart::getConditionsByType('coupon'))!=0)          
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code (<a href="/cart/discountremove">remove</a>)</h6>
              <small>{{Cart::getConditionsByType('coupon')->first()->getName()}}</small>
            </div>
            <span class="text-success">-{{$currency}}{{two_decimal(Cart::getConditionsByType('coupon')->first()->getCalculatedValue($sum))}}</span>
          </li>
          @endif
          <li class="list-group-item d-flex justify-content-between">
            <span>Subtotal</span>
            <strong>{{$currency}}{{Cart::getSubTotal()}}</strong>
          </li>
          <?php $cartConditions = Cart::getConditions(); ?>
          @if (count($cartConditions)>0)
            @foreach($cartConditions as $condition)
              @if ($condition->getType()!='coupon')
                  <li class="list-group-item d-flex justify-content-between">
                    <span>{{$condition->getName()}}</span>
                    <strong>{{$currency}}{{two_decimal($condition->getCalculatedValue(Cart::getSubTotal()))}}</strong>
                  </li>
              @endif
            @endforeach
          @endif
          
          <li class="list-group-item d-flex justify-content-between">
            <span>Total</span>
            <strong>{{$currency}}{{Cart::getTotal()}}</strong>
          </li>
        </ul>

        <form class="card p-2" action="{{route('cart.add-discount')}}" method="get">
          @csrf
          <div class="input-group">
            <input type="text" class="form-control" name="discount" placeholder="Promo code">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-8 order-md-1">
        <form id="billing-form" action="{{route('checkout.process')}}" method="post">
          @csrf
          <h4 class="mb-3">Billing Information</h4>
          <div class="mb-3">
            <label for="name">Full Name</label>
            <input type="name" class="form-control" name="name" id="name" value="{{$name}}" placeholder="John Doe">
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$email}}" placeholder="you@example.com">
          </div>

          <div class="mb-3">
            <label for="number">Phone Number</label>
            <input type="number" class="form-control" name="number" id="number" placeholder="">
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{$billing_address}}" placeholder="1234 Main St">
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="country">Billing country</label>
                <select name="country" id="country">
                  @foreach ($countries as $country)
                    <option value="{{$country}}" {{$billing_country==$country?'selected':''}}>{{$country}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="city">City</label>
              <input type="text" class="form-control" name="city" id="city" value="{{$billing_city}}" placeholder="">
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <input type="text" class="form-control" name="state" id="state" value="{{$billing_state}}" placeholder="">
            </div>
            <div class="col-md-4 mb-3">
              <label for="zip">Zip</label>
              <input type="number" class="form-control" name="zip" id="zip" value="{{$billing_zip}}" placeholder="">
            </div>
          </div>
          
          <hr class="mb-4">

          <div class="row mb-4">
            <div class="col-md-12">
              <input id="same-address" name="shipping_address_different" type="checkbox">
              <label class="custom-control-label" for="same-address">Shipping address different?</label>
            </div>
          </div>
          
          @include('sections.shipping')
          <hr class="mb-4">
          <div class="row"></div>
          
          <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed</button>
        </form>
          
        </div>
      </div>
    </div>
  </div> -->
 
  
@stop

@section('javascript')

  <script src="/frontend/assets/js/checkout.js"></script>

@endsection