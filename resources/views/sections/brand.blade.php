<!-- brand -->
@if(count($brands)>0)
<div class="container">
            <div class="brand-carousel section-padding owl-carousel">
                @foreach ($brands as $brand)
                <div class="single-logo">
                    <img src="{{is_null($brand->image)?'/frontend/img/default.png':Voyager::image($brand->image)}}" alt="">
                </div>
                @endforeach
               
            </div>
         </div>
         @endif