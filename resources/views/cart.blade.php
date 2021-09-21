@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<style type="text/css">
  .qtySelector{
  border: 1px solid #ddd;
  width: 107px;
  height: 35px;
  margin: 10px auto 0;
  float: left;
}
.qtySelector .fa{
  padding: 10px 5px;
  width: 35px;
  height: 100%;
  float: left;
  cursor: pointer;
}
.qtySelector .fa.clicked{
  font-size: 12px;
  padding: 12px 5px;
}
.qtySelector .fa-minus{
  border-right: 1px solid #ddd;
}
.qtySelector .fa-plus{
  border-left: 1px solid #ddd;
}
.qtySelector .qtyValue{
  border: none;
  padding: 5px;
  width: 35px;
  height: 100%;
  float: left;
  text-align: center
}

.dlticon{font-size: 28px !important;
    margin: -30px 100px 0 0;
    float: right;
    font-weight: normal !important;}
</style>
    <!-- Hero -->
    <div class="best_mn">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1>Cart</h1>
               </div>
            </div>
         </div>
      </div>
    
 
    <div class="container mt-5">
        <div class="row">
          <div class="col-lg-12 text-center">
            <?php $messages = Session::get('custom_errors'); ?>
            @if (!is_null($messages))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button> 
                <ul>
                    @foreach ($messages as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div><br />
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
    </div>   
    @if ( count(Cart::getContent())>0)
    <div class="container">
         <div class="row">
            <div class="col-md-2"></div>
            <div class="cart_mnn2">
               <div class="col-md-10 ">
                  <div class="">
                     <div class="contrlclr">
                        <div class=" hdr_tex">
                           <h5 class="" id="">Your Cart</h5>
                        </div>
                        <div class="">
                            <?php
                            $i=0;
                            $currency=get_current_currency()['symbol'];
                            $sum=0;
                            ?>
                            <?php foreach(Cart::getContent() as $row) :?>
                              <?php // var_dump($row);?>
                              <?php $i++; ?>
                           <div class="crd_mn4">
                                <?php
                                $productData = DB::table('products')->where('id',$row->id)->first();
                                ?>
                              <div class="crd_pic"><img src="{{is_null($productData->primary_image)?'/frontend/assets/img/default.png':Voyager::image($productData->primary_image)}}" alt=""></div>
                              <div class="crd_tex">
                                 <a href="/product/{{$row->slug}}"><p><?php echo $row->name; ?></p></a>
                                 <span>
                                    @if ($row->getPriceWithConditions()!=$row->price)
                                                    <del>{{$currency}}{{$row->price}}</del>{{$currency}}{{$row->getPriceWithConditions()}}
                                                @else
                                                    {{$currency}}{{$row->price}}
                                                @endif
                                 </span><br>
                  <?php echo $currency.$row->getPriceSumWithConditions();?>
                                 <div class="form-group contt2">
                                    <div class="qtySelector text-center">
                                      <i class="fa fa-minus decreaseQty"></i>
                                      <input type="text" id="qty{{$i}}" class="qtyValue fmwd" value="<?php echo $row->quantity;?>" />
                                      <i class="fa fa-plus increaseQty"></i>
                                    </div>
                                    <!-- <div class="input-group ">
                                       <div class="input-group-btn">
                                          <button id="down" class="btn btn-default" onclick=" down('0')"><span class="glyphicon glyphicon-minus"></span></button>
                                       </div>
                                       <input type="text" id="qty{{$i}}" class="form-control input-number fmwd" value="<?php echo $row->quantity;?>">
                                       <div class="input-group-btn">
                                          <button id="up" class="btn btn-default" onclick="up('10')"><span class="glyphicon glyphicon-plus"></span></button>
                                       </div>
                                    </div> -->
                                 </div>
                                 <div>
                                   
                                 </div>
                                 <?php $removeUrl = url('cart/removerowitem').'/'.$row->id;?> 
                            <span class="fa fa-trash dlticon" onclick="window.location.href ='<?php echo $removeUrl?>'"></span>
                              </div>
                           </div>
                           <input type="hidden" id="id{{$i}}" value="{{$row->id}}">
                           <input type="hidden" id="proid{{$i}}" value="{{$row->product_id}}"> 
                            <?php $sum=$sum+$row->getPriceSumWithConditions();?> 
                            
                           <?php endforeach;?>
                           <input type="hidden" id="val_i" value="{{$i}}"> 
                            <div class="row">
                            <div class="col-12 col-md-3 ml-3 mt-3">
                                <a href="{{ route('cart.removeall') }}" class="btn btn-primary  py-2 btn-block">Remove all</a> 
                            </div>
                            <div class="col-12 col-md-3 ml-3 mt-3">
                                <button id="updatecart" class="btn btn-primary  py-2 btn-block">Update Cart</button>
                            </div>
                        </div>
                            <form action="{{route('cart.add-discount')}}" method="get">
                                    @csrf   
                           <div class="coupon">
                              <h3>Have a coupon?</h3>
                              <div><input required="" placeholder="Enter Coupon Code" type="text" class="coddt" name="discount" value="" style="flex-grow: 1;"><button class="coddt_btn" type="submit">APPLY</button></div>
                           </div>
                            </form>
                           
                           <div class="Price_mn3">
                              <h3>Price Summary</h3>
                              <p>Order Total</p>
                              <span>{{$currency}}{{$sum}}</span>
                              <p>Items Discount</p>
                              <span>
                                @if(count(Cart::getConditionsByType('coupon'))!=0)
                                            ({{Cart::getConditionsByType('coupon')->first()->getName()}}) <a href="/cart/discountremove">remove</a>
                                            @endif
                                            {{$currency}}{{count(Cart::getConditionsByType('coupon'))==0?'0':two_decimal(Cart::getConditionsByType('coupon')->first()->getCalculatedValue($sum))}}
                                </span>
                              <p>Subtotal (after discount)</p>
                              <span>
                                 {{$currency}}{{Cart::getSubTotal()}}
                              </span>
                              <?php $cartConditions = Cart::getConditions(); ?>
                                @if (count($cartConditions)>0)
                                    @foreach($cartConditions as $condition)
                                        @if ($condition->getType()!='coupon')
                                            <p>{{$condition->getName()}}</p><span>{{$currency}}{{two_decimal($condition->getCalculatedValue(Cart::getSubTotal()))}}</span>
                                        @endif
                                    @endforeach
                                @endif
                              
                              <p>Grand Total</p>
                              <span>{{$currency}}{{two_decimal(Cart::getTotal())}}</span>
                           </div>
                           <!-- <div class="savings_mn">Total savings of ₹77.40 on this order</div> -->
                           <div class="savings_mn2">
                              <h4>Safe and Secure Payment, Easy Return.</h4>
                              <img src="images/cd.png" alt="">
                              <a class="" href="{{url('checkout')}}">Proceed to Pay</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
    @else

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">No Items to show</h2>
                <a href="/shop" class="btn btn-lg btn-primary mt-3">Return to shop</a>
            </div>
        </div>
    </div>     
    @endif
@stop

@section ('javascript')
    <script src="/frontend/assets/js/cart.js"></script>
@stop