@extends('public.layout.master')
@section('title', __('user/title.title.detail'))
@section('content')
<div class="wrap">
  <div class="content_top">
    <div class="back-links">
      <h4>@lang('user/title.title.detail')</h4>
    </div>
    <div class="clear"></div>
  </div>
  <div class="section group">
  <div class="cont-desc span_1_of_2">
    <div class="product-details">				
    <div class="grid images_3_of_2">
      <img src="images/banner/1.jpg" alt="" />
    </div>
  <div class="desc span_3_of_2">
    <h2>Wrath of the Titans </h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>					
    <div class="price">
      <p>@lang('user/detail.price'): <span>$500</span></p>
    </div>
    <div class="available">
      <ul>
        <li><span>@lang('user/detail.category'):</span> &nbsp; Model 1</li>
        <li><span>@lang('user/detail.start_date'):</span>&nbsp; 5lbs</li>
        <li><span>@lang('user/detail.end_date'):</span>&nbsp; 566</li>
        </ul>
    </div>
</div>
<div class="clear"></div>
</div>
<div class="product_desc">	
 <h2>@lang('user/detail.detail') :</h2>
   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
     industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and 
     scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
</div>
<div class="page-showtimes">
<div id="sessiontimes" class="schedule-block-wrapper">
  <h2>26/08/2018</h2>
  <div class="time-wrapper">
    <ul>
      <li><a class="available" href="637">12:30 AM</a></li>
    </ul>
  </div>
  <h2>27/08/2018</h2>
  <div class="time-wrapper">
    <ul>
      <li><a class="available" href="#">10:45 AM</a></li>
      <li><a class="available" href="#">12:50 PM</a></li>
      <li><a class="available" href="#">02:55 PM</a></li>
      <li><a class="available" href="#">05:00 PM</a></li>
      <li><a class="available" href="#">06:35 PM</a></li>
      <li><a class="available" href="#">07:05 PM</a></li>
      <li><a class="available" href="#">08:10 PM</a></li>
      <li><a class="available" href="#">09:10 PM</a></li>
      <li><a class="available" href="#">10:15 PM</a></li>
      <li><a class="available" href="#">11:15 PM</a></li>
    </ul>
  </div>
  <h2>28/08/2018</h2>
  <div class="time-wrapper">
    <ul>
      <li><a class="available" href="#">10:45 AM</a></li><li><a class="available" href="#">12:50 PM</a></li>
      <li><a class="available" href="#">02:55 PM</a></li><li><a class="available" href="#">05:00 PM</a></li>
      <li><a class="available" href="#">06:35 PM</a></li><li><a class="available" href="#">07:05 PM</a></li>
      <li><a class="available" href="#">08:10 PM</a></li><li><a class="available" href="#">09:10 PM</a></li>
      <li><a class="available" href="#">10:15 PM</a></li><li><a class="available" href="#">11:15 PM</a></li>
    </ul>
  </div>
  <h2>29/08/2018</h2>
  <div class="time-wrapper">
    <ul>
      <li><a class="available" href="#">10:00 AM</a></li>
      <li><a class="available" href="#">12:05 PM</a></li>
      <li><a class="available" href="#">02:10 PM</a></li>
    </ul>
  </div>
  </div>
</div>
  </div>
  <div class="rightsidebar span_3_of_1 sidebar">
    <h2>@lang('user/detail.new_film')</h2>
       <div class="special_movies">
          <div class="movie_poster">
           <a href="preview.html"><img src="images/banner/1.jpg" alt="" /></a>
          </div>
            <div class="movie_desc">
            <h3><a href="preview.html">End Game</a></h3>
             <p><span>$620.87</span> &nbsp; $500.35</p>
               <span><a href="#">Add to Cart</a></span>
           </div>
          <div class="clear"></div>
         </div>	
         <div class="special_movies">
          <div class="movie_poster">
           <a href="preview.html"><img src="images/banner/1.jpg" alt="" /></a>
          </div>
            <div class="movie_desc">
            <h3><a href="preview.html">Coraline</a></h3>
             <p><span>$620.87</span> &nbsp; $500.35</p>
               <span><a href="#">Add to Cart</a></span>
           </div>
          <div class="clear"></div>
         </div>	
         <div class="special_movies">
          <div class="movie_poster">
           <a href="preview.html"><img src="images/banner/1.jpg" alt="" /></a>
          </div>
            <div class="movie_desc">
            <h3><a href="preview.html">Eclipse</a></h3>
             <p><span>$620.87</span> &nbsp; $500.35</p>
               <span><a href="#">Add to Cart</a></span>
           </div>
          <div class="clear"></div>
         </div>	
         <div class="special_movies">
          <div class="movie_poster">
           <a href="preview.html"><img src="images/banner/1.jpg" alt="" /></a>
          </div>
            <div class="movie_desc">
            <h3><a href="preview.html">Priest 3D</a></h3>
             <p><span>$620.87</span> &nbsp; $500.35</p>
               <span><a href="#">Add to Cart</a></span>
           </div>
          <div class="clear"></div>
         </div>	
         <div class="special_movies">
           <div class="movie_poster">
           <a href="preview.html"><img src="images/banner/1.jpg" alt="" /></a>
          </div>
            <div class="movie_desc">
            <h3><a href="preview.html">Sorority Wars</a></h3>
             <p><span>$620.87</span> &nbsp; $500.35</p>
               <span><a href="#">Add to Cart</a></span>
           </div>
          <div class="clear"></div>
         </div>			 
        </div>
     </div>
  </div>
@endsection
@section('script')
  <script src="js/public/detail.js"></script>
@endsection
