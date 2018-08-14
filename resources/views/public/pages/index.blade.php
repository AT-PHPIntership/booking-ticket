@extends('public.layout.master')
@section('title', __('user/title.title.index'))
@section('content')
@include('public.layout.header')
<div class="main">
   <div class="wrap">
      <div class="content">
         <div class="content_top">
            <div class="heading">
               <h3>@lang('user/index.new_film')</h3>
            </div>
         </div>
         <div class="section group">
            <div class="grid_1_of_5 images_1_of_5">
               <a href="preview.html"><img src="images/images/end-game.jpg" alt="" /></a>
               <h2><a href="preview.html">End Game</a></h2>
               <div class="price-details">
                  <div class="price-number">
                     <p><span class="rupees">$620.87</span></p>
                  </div>
                  <div class="add-cart">
                     <h4><a href="preview.html">@lang('user/index.add_cart')</a></h4>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            <div class="grid_1_of_5 images_1_of_5">
               <a href="preview.html"><img src="images/images/Sorority_Wars.jpg" alt="" /></a>
               <h2><a href="preview.html">Sorority Wars</a></h2>
               <div class="price-details">
                  <div class="price-number">
                     <p><span class="rupees">$620.87</span></p>
                  </div>
                  <div class="add-cart">
                     <h4><a href="preview.html">@lang('user/index.add_cart')</a></h4>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            <div class="grid_1_of_5 images_1_of_5">
               <a href="preview.html"><img src="images/images/New-Moon-The-Score-cover-twilight.jpg" alt="" /></a>
               <h2><a href="preview.html">Twilight New Moon</a></h2>
               <div class="price-details">
                  <div class="price-number">
                     <p><span class="rupees">$899.75</span></p>
                  </div>
                  <div class="add-cart">
                     <h4><a href="preview.html">@lang('user/index.add_cart')</a></h4>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            <div class="grid_1_of_5 images_1_of_5">
               <a href="preview.html"><img src="images/images/avatar_movie.jpg" alt="" /></a>
               <h2><a href="preview.html">Avatar</a></h2>
               <div class="price-details">
                  <div class="price-number">
                     <p><span class="rupees">$599.00</span></p>
                  </div>
                  <div class="add-cart">
                     <h4><a href="preview.html">@lang('user/index.add_cart')</a></h4>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            <div class="grid_1_of_5 images_1_of_5">
               <a href="preview.html"><img src="images/images/black-swan.jpg" alt="" /></a>
               <h2><a href="preview.html">Black Swan</a></h2>
               <div class="price-details">
                  <div class="price-number">
                     <p><span class="rupees">$679.87</span></p>
                  </div>
                  <div class="add-cart">
                     <h4><a href="preview.html">@lang('user/index.add_cart')</a></h4>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
         </div>
         <div class="content_bottom">
            <div class="heading">
               <h3>@lang('user/index.feature_film')</h3>
            </div>
         </div>
         <div class="section group">
            <div class="grid_1_of_5 images_1_of_5">
               <a href="preview.html"><img src="images/images/beauty_and_the_beast.jpg" alt="" /></a>
               <h2><a href="preview.html">Beauty and the beast</a></h2>
               <div class="price-details">
                  <div class="price-number">
                     <p><span class="rupees">$620.87</span></p>
                  </div>
                  <div class="add-cart">
                     <h4><a href="preview.html">@lang('user/index.add_cart')</a></h4>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            <div class="grid_1_of_5 images_1_of_5">
               <a href="preview.html"><img src="images/images/Eclipse.jpg" alt="" /></a>
               <h2><a href="preview.html">Eclipse</a></h2>
               <div class="price-details">
                  <div class="price-number">
                     <p><span class="rupees">$620.87</span></p>
                  </div>
                  <div class="add-cart">
                     <h4><a href="preview.html">@lang('user/index.add_cart')</a></h4>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            <div class="grid_1_of_5 images_1_of_5">
               <a href="preview.html"><img src="images/images/Coraline.jpg" alt="" /></a>
               <h2><a href="preview.html">Coraline</a></h2>
               <div class="price-details">
                  <div class="price-number">
                     <p><span class="rupees">$899.75</span></p>
                  </div>
                  <div class="add-cart">
                     <h4><a href="preview.html">@lang('user/index.add_cart')</a></h4>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            <div class="grid_1_of_5 images_1_of_5">
               <a href="preview.html"><img src="images/images/Unstoppable.jpg" alt="" /></a>
               <h2><a href="preview.html">Unstoppable</a></h2>
               <div class="price-details">
                  <div class="price-number">
                     <p><span class="rupees">$599.00</span></p>
                  </div>
                  <div class="add-cart">
                     <h4><a href="preview.html">@lang('user/index.add_cart')</a></h4>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            <div class="grid_1_of_5 images_1_of_5">
               <a href="preview.html"><img src="images/images/Priest.jpg" alt="" /></a>
               <h2><a href="preview.html">Priest 3D</a></h2>
               <div class="price-details">
                  <div class="price-number">
                     <p><span class="rupees">$679.87</span></p>
                  </div>
                  <div class="add-cart">
                     <h4><a href="preview.html">@lang('user/index.add_cart')</a></h4>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
