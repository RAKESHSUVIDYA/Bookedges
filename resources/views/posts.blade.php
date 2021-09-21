@extends('layouts.app')

@section('title', 'Posts')

@section('content')

<!-- Hero -->
<div id="rs-blog" class="rs-blog pt-100 pb-100">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 mb-md-50 pr-25 bol_sd">
                  <div class="sidebar-area">
                     <div class="search-box">
                        <h4 class="title">Search</h4>
                        <div class="box-search">
                           <input class="form-control" placeholder="Search Here ..." name="srch-term" id="srch-term" type="text">
                           <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                     </div>
                     <!-- .search-box end -->
                     <div class="search_mn_pic">
                        <ul>
                           <li>  
                              <a href="#"><img src="images/googlepay.png" alt=""></a>
                           </li>
                           <li>
                              <a href="#"><img src="images/aap.png" alt=""></a>
                           </li>
                        </ul>
                     </div>
                     <div class="latest-post">
                        <h4 class="title">Latest Post</h4>
                        @foreach ($posts as $post)
                        @if($loop->first)
                        <div class="post-item">
                           <div class="post-img">
                              <a href="/post/{{$post->slug}}"><img src="{{is_null($post->image)?'/frontend/img/default.png':Voyager::image($post->image)}}" alt="" title="News image"></a>
                           </div>
                           <div class="post-desc">
                             <p>{{Str::words($post->excerpt,10)}}</p>
                              <h6><a href="/post/{{$post->slug}}">{{$post->title}}</a></h6>
                              <span class="duration">{{is_null($post->authorId)?'Admin':$post->authorId->name}}
                              </span> 
                              <span class="date"><time datetime="2019-04-25">{{$post->created_at->diffForHumans()}}</time></span>
                           </div>
                        </div>

                        <!-- .post-item end -->
                        @endif
                        @endforeach
                        
                     </div>
                  </div>
               </div>
               <div class="col-lg-8 pl-25 blog_itm_mn">
                  <div class="row">
                    @foreach ($posts as $post)
                    @if(!$loop->first)
                     <div class="col-sm-6 mb-50">
                        <div class="blog-item">
                           <div class="blog-img">
                              <a class="blog-link" href="/post/{{$post->slug}}" title="Blog Link">
                              <img src="{{is_null($post->image)?'/frontend/img/default.png':Voyager::image($post->image)}}" alt="Blog Image">   
                              </a>
                              <div class="date"><time datetime="2019-04-25">{{$post->created_at->diffForHumans()}}</time></div>
                           </div>
                           <div class="content-wrapper">
                              <div class="blog-meta border-style">
                                 <h4><a href="#">{{$post->title}}</a></h4>
                                 <ul>
                                    <li><span>By {{is_null($post->authorId)?'Admin':$post->authorId->name}}</span></li>
                                    <li><span>{{Str::words($post->excerpt,10)}}</span></li>
                                 </ul>
                              </div>
                              <div class="blog-desc">
                                 <p>{!! $post->body !!}</p>
                              </div>
                              <a href="/post/{{$post->slug}}" class="blog-btn">Read more</a>
                           </div>
                        </div>
                     </div>
                    @endif
                    @endforeach
                     
                  </div>
               </div>
            </div>
         </div>
      </div>

    
@endsection