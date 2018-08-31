@extends('public.layout.master')
@section('title', __('user/booking.title'))
@section('content')
<div class="wrap">
   <div class="content">
      <div class="content_top">
         <div class="seat-wrap">
            <div class="seat-count-box">
               <h4 class="pull-left">@lang('user/booking.please_choose_number')</h4>
               <select name="quantity" id="quantity" class="ddl-seat-count">
                  <option selected value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
               </select>
               <br>
               <span class="delimeter-line"></span>
               <div class="seat-selection-box">
                  <div>
                     <div class="title-film">
                        <span>@lang('user/booking.film'): <b style="text-transform: uppercase" id="name_film"</b></span>
                     </div>
                     <div class="title-film">
                        <span>@lang('user/booking.date'): <b id="date_schedule"></b></span>
                     </div>
                     <div class="title-film">
                        <span>@lang('user/booking.schedule'): <b id="time_schedule"></b></span>
                     </div>
                  </div>
                  <div class="title-film">
                     <span>@lang('user/booking.total_seat'):<b>
                     <span id="num_of_seat" data-seattotallabel="">0</span></b></span>
                  </div>
                  <div class="title-film">
                     <span>@lang('user/booking.total_price'): <b>
                     <span id="total_price" data-totalprice="">0</span></b></span>
                  </div>
                  <div style="clear: both"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="content_top">
         <div>
            <h3 style="font-size: 25px; color: red">@lang('user/booking.booking_close') <span id="time"></span> @lang('user/booking.minutes')!</h3>
         </div>
      </div>
      <div class="div-seat-booing" id="sodoghe">
         <strong class="screen_tit">
         <font>
         <font class="">@lang('user/booking.screem')</font>
         </font>
         </strong>
         <div seatline="1" id="A1" class="item-seat line-seat" style="margin-left:50px; top:137px;">A</div>
         <div seatline="1" data-id="1" data-seat="A1" id="1" class="item-seat childitem" style="left:183px; top:138px;">1</div>
         <div seatline="1" data-id="2" data-seat="A2" id="2" class="item-seat childitem" style="left:247px; top:138px;">2</div>
         <div seatline="1" data-id="3" data-seat="A3" id="3" class="item-seat childitem" style="left:311px; top:138px;">3</div>
         <div seatline="1" data-id="4" data-seat="A4" id="4" class="item-seat childitem" style="left:375px; top:138px;">4</div>
         <div seatline="1" data-id="5" data-seat="A5" id="5" class="item-seat childitem" style="left:438px; top:138px;">5</div>
         <div seatline="1" data-id="6" data-seat="A6" id="6" class="item-seat childitem" style="left:502px; top:138px;">6</div>
         <div seatline="2" data-id="7" data-seat="A7" id="7" class="item-seat childitem" style="left:603px; top:138px;">7</div>
         <div seatline="2" data-id="8" data-seat="A8" id="8" class="item-seat childitem" style="left:667px; top:138px;">8</div>
         <div seatline="2" data-id="9" data-seat="A9" id="9" class="item-seat childitem" style="left:731px; top:138px;">9</div>
         <div seatline="2" data-id="10" data-seat="A10" id="10" class="item-seat childitem" style="left:795px; top:138px;">10</div>
         <div seatline="2" data-id="11" data-seat="A11" id="11" class="item-seat childitem" style="left:858px; top:138px;">11</div>
         <div seatline="2" data-id="12" data-seat="A12" id="12" class="item-seat childitem" style="left:922px; top:138px;">12</div>
         <div seatline="2" data-id="13" data-seat="A13" id="13" class="item-seat childitem" style="left:986px; top:138px;">13</div>
         <div seatline="2" data-id="14" data-seat="A14" id="14" class="item-seat childitem" style="left:1050px; top:138px;">14</div>
         <div seatline="1" id="B1" class="item-seat line-seat" style="margin-left:50px; top:181px;">B</div>
         <div seatline="1" data-id="15" data-seat="B1" id="15" class="item-seat childitem" style="left:183px; top:182px;">1</div>
         <div seatline="1" data-id="16" data-seat="B2" id="16" class="item-seat childitem" style="left:247px; top:182px;">2</div>
         <div seatline="1" data-id="17" data-seat="B3" id="17" class="item-seat childitem" style="left:311px; top:182px;">3</div>
         <div seatline="1" data-id="18" data-seat="B4" id="18" class="item-seat childitem" style="left:375px; top:182px;">4</div>
         <div seatline="1" data-id="19" data-seat="B5" id="19" class="item-seat childitem" style="left:438px; top:182px;">5</div>
         <div seatline="1" data-id="20" data-seat="B6" id="20" class="item-seat childitem" style="left:502px; top:182px;">6</div>
         <div seatline="2" data-id="21" data-seat="B7" id="21" class="item-seat childitem" style="left:603px; top:182px;">7</div>
         <div seatline="2" data-id="22" data-seat="B8" id="22" class="item-seat childitem" style="left:667px; top:182px;">8</div>
         <div seatline="2" data-id="23" data-seat="B9" id="23" class="item-seat childitem" style="left:731px; top:182px;">9</div>
         <div seatline="2" data-id="24" data-seat="B10" id="24" class="item-seat childitem" style="left:795px; top:182px;">10</div>
         <div seatline="2" data-id="25" data-seat="B11" id="25" class="item-seat childitem" style="left:858px; top:182px;">11</div>
         <div seatline="2" data-id="26" data-seat="B12" id="26" class="item-seat childitem" style="left:922px; top:182px;">12</div>
         <div seatline="2" data-id="27" data-seat="B13" id="27" class="item-seat childitem" style="left:986px; top:182px;">13</div>
         <div seatline="2" data-id="28" data-seat="B14" id="28" class="item-seat childitem" style="left:1050px; top:182px;">14</div>
         <div seatline="1" id="C1" class="item-seat line-seat" style="margin-left:50px; top:226px;">C</div>
         <div seatline="1" data-id="29" data-seat="C1" id="29" class="item-seat childitem" style="left:183px; top:227px;">1</div>
         <div seatline="1" data-id="30" data-seat="C2" id="30" class="item-seat childitem" style="left:247px; top:227px;">2</div>
         <div seatline="1" data-id="31" data-seat="C3" id="31" class="item-seat childitem" style="left:311px; top:227px;">3</div>
         <div seatline="1" data-id="32" data-seat="C4" id="32" class="item-seat childitem" style="left:375px; top:227px;">4</div>
         <div seatline="1" data-id="33" data-seat="C5" id="33" class="item-seat childitem" style="left:438px; top:227px;">5</div>
         <div seatline="1" data-id="34" data-seat="C6" id="34" class="item-seat childitem" style="left:502px; top:227px;">6</div>
         <div seatline="2" data-id="35" data-seat="C7" id="35" class="item-seat childitem" style="left:603px; top:227px;">7</div>
         <div seatline="2" data-id="36" data-seat="C8" id="36" class="item-seat childitem" style="left:667px; top:227px;">8</div>
         <div seatline="2" data-id="37" data-seat="C9" id="37" class="item-seat childitem" style="left:731px; top:227px;">9</div>
         <div seatline="2" data-id="38" data-seat="C10" id="38" class="item-seat childitem" style="left:795px; top:227px;">10</div>
         <div seatline="2" data-id="39" data-seat="C11" id="39" class="item-seat childitem" style="left:858px; top:227px;">11</div>
         <div seatline="2" data-id="40" data-seat="C12" id="40" class="item-seat childitem" style="left:922px; top:227px;">12</div>
         <div seatline="2" data-id="41" data-seat="C13" id="41" class="item-seat childitem" style="left:986px; top:227px;">13</div>
         <div seatline="2" data-id="42" data-seat="C14" id="42" class="item-seat childitem" style="left:1050px; top:227px;">14</div>
         <div seatline="1" id="D1" class="item-seat line-seat" style="margin-left:50px; top:270px;">D</div>
         <div seatline="1" data-id="43" data-seat="D1" id="43" class="item-seat childitem" style="left:183px; top:271px;">1</div>
         <div seatline="1" data-id="44" data-seat="D2" id="44" class="item-seat childitem" style="left:247px; top:271px;">2</div>
         <div seatline="1" data-id="45" data-seat="D3" id="45" class="item-seat childitem" style="left:311px; top:271px;">3</div>
         <div seatline="1" data-id="46" data-seat="D4" id="46" class="item-seat childitem" style="left:375px; top:271px;">4</div>
         <div seatline="1" data-id="47" data-seat="D5" id="47" class="item-seat childitem" style="left:438px; top:271px;">5</div>
         <div seatline="1" data-id="48" data-seat="D6" id="48" class="item-seat childitem" style="left:502px; top:271px;">6</div>
         <div seatline="2" data-id="49" data-seat="D7" id="49" class="item-seat childitem" style="left:603px; top:271px;">7</div>
         <div seatline="2" data-id="50" data-seat="D8" id="50" class="item-seat childitem" style="left:667px; top:271px;">8</div>
         <div seatline="2" data-id="51" data-seat="D9" id="51" class="item-seat childitem" style="left:731px; top:271px;">9</div>
         <div seatline="2" data-id="52" data-seat="D10" id="52" class="item-seat childitem" style="left:795px; top:271px;">10</div>
         <div seatline="2" data-id="53" data-seat="D11" id="53" class="item-seat childitem" style="left:858px; top:271px;">11</div>
         <div seatline="2" data-id="54" data-seat="D12" id="54" class="item-seat childitem" style="left:922px; top:271px;">12</div>
         <div seatline="2" data-id="55" data-seat="D13" id="55" class="item-seat childitem" style="left:986px; top:271px;">13</div>
         <div seatline="2" data-id="56" data-seat="D14" id="56" class="item-seat childitem" style="left:1050px; top:271px;">14</div>
         <div seatline="1" id="E1" class="item-seat line-seat" style="margin-left:50px; top:314px;">E</div>
         <div seatline="1" data-id="57" data-seat="E1" id="57" class="item-seat childitem" style="left:183px; top:315px;">1</div>
         <div seatline="1" data-id="58" data-seat="E2" id="58" class="item-seat childitem" style="left:247px; top:315px;">2</div>
         <div seatline="1" data-id="59" data-seat="E3" id="59" class="item-seat childitem" style="left:311px; top:315px;">3</div>
         <div seatline="1" data-id="60" data-seat="E4" id="60" class="item-seat childitem" style="left:375px; top:315px;">4</div>
         <div seatline="1" data-id="61" data-seat="E5" id="61" class="item-seat childitem" style="left:438px; top:315px;">5</div>
         <div seatline="1" data-id="62" data-seat="E6" id="62" class="item-seat childitem" style="left:502px; top:315px;">6</div>
         <div seatline="2" data-id="63" data-seat="E7" id="63" class="item-seat childitem" style="left:603px; top:315px;">7</div>
         <div seatline="2" data-id="64" data-seat="E8" id="64" class="item-seat childitem" style="left:667px; top:315px;">8</div>
         <div seatline="2" data-id="65" data-seat="E9" id="65" class="item-seat childitem" style="left:731px; top:315px;">9</div>
         <div seatline="2" data-id="66" data-seat="E10" id="66" class="item-seat childitem" style="left:795px; top:315px;">10</div>
         <div seatline="2" data-id="67" data-seat="E11" id="67" class="item-seat childitem" style="left:858px; top:315px;">11</div>
         <div seatline="2" data-id="68" data-seat="E12" id="68" class="item-seat childitem" style="left:922px; top:315px;">12</div>
         <div seatline="2" data-id="69" data-seat="E13" id="69" class="item-seat childitem" style="left:986px; top:315px;">13</div>
         <div seatline="2" data-id="70" data-seat="E14" id="70" class="item-seat childitem" style="left:1050px; top:315px;">14</div>
         <div seatline="1" id="F1" class="item-seat line-seat" style="margin-left:50px; top:358px;">F</div>
         <div seatline="1" data-id="71" data-seat="F1" id="71" class="item-seat childitem" style="left:183px; top:359px;">1</div>
         <div seatline="1" data-id="72" data-seat="F2" id="72" class="item-seat childitem" style="left:247px; top:359px;">2</div>
         <div seatline="1" data-id="73" data-seat="F3" id="73" class="item-seat childitem" style="left:311px; top:359px;">3</div>
         <div seatline="1" data-id="74" data-seat="F4" id="74" class="item-seat childitem" style="left:375px; top:359px;">4</div>
         <div seatline="1" data-id="75" data-seat="F5" id="75" class="item-seat childitem" style="left:438px; top:359px;">5</div>
         <div seatline="1" data-id="76" data-seat="F6" id="76" class="item-seat childitem" style="left:502px; top:359px;">6</div>
         <div seatline="2" data-id="77" data-seat="F7" id="77" class="item-seat childitem" style="left:603px; top:359px;">7</div>
         <div seatline="2" data-id="78" data-seat="F8" id="78" class="item-seat childitem" style="left:667px; top:359px;">8</div>
         <div seatline="2" data-id="79" data-seat="F9" id="79" class="item-seat childitem" style="left:731px; top:359px;">9</div>
         <div seatline="2" data-id="80" data-seat="F10" id="80" class="item-seat childitem" style="left:795px; top:359px;">10</div>
         <div seatline="2" data-id="81" data-seat="F11" id="81" class="item-seat childitem" style="left:858px; top:359px;">11</div>
         <div seatline="2" data-id="82" data-seat="F12" id="82" class="item-seat childitem" style="left:922px; top:359px;">12</div>
         <div seatline="2" data-id="83" data-seat="F13" id="83" class="item-seat childitem" style="left:986px; top:359px;">13</div>
         <div seatline="2" data-id="84" data-seat="F14" id="84" class="item-seat childitem" style="left:1050px; top:359px;">14</div>
         <div seatline="1" id="G1" class="item-seat line-seat" style="margin-left:50px; top:402px;">G</div>
         <div seatline="1" data-id="85" data-seat="G1" id="85" class="item-seat childitem" style="left:183px; top:403px;">1</div>
         <div seatline="1" data-id="86" data-seat="G2" id="86" class="item-seat childitem" style="left:247px; top:403px;">2</div>
         <div seatline="1" data-id="87" data-seat="G3" id="87" class="item-seat childitem" style="left:311px; top:403px;">3</div>
         <div seatline="1" data-id="88" data-seat="G4" id="88" class="item-seat childitem" style="left:375px; top:403px;">4</div>
         <div seatline="1" data-id="89" data-seat="G5" id="89" class="item-seat childitem" style="left:438px; top:403px;">5</div>
         <div seatline="1" data-id="90" data-seat="G6" id="90" class="item-seat childitem" style="left:502px; top:403px;">6</div>
         <div seatline="2" data-id="91" data-seat="G7" id="91" class="item-seat childitem" style="left:603px; top:403px;">7</div>
         <div seatline="2" data-id="92" data-seat="G8" id="92" class="item-seat childitem" style="left:667px; top:403px;">8</div>
         <div seatline="2" data-id="93" data-seat="G9" id="93" class="item-seat childitem" style="left:731px; top:403px;">9</div>
         <div seatline="2" data-id="94" data-seat="G10" id="94" class="item-seat childitem" style="left:795px; top:403px;">10</div>
         <div seatline="2" data-id="95" data-seat="G11" id="95" class="item-seat childitem" style="left:858px; top:403px;">11</div>
         <div seatline="2" data-id="96" data-seat="G12" id="96" class="item-seat childitem" style="left:922px; top:403px;">12</div>
         <div seatline="2" data-id="97" data-seat="G13" id="97" class="item-seat childitem" style="left:986px; top:403px;">13</div>
         <div seatline="2" data-id="98" data-seat="G14" id="98" class="item-seat childitem" style="left:1050px; top:403px;">14</div>
         <div seatline="1" id="H1" class="item-seat line-seat" style="margin-left:50px; top:446px;">H</div>
         <div seatline="1" data-id="99" data-seat="H1" id="99" class="item-seat childitem" style="left:183px; top:447px;">1</div>
         <div seatline="1" data-id="100" data-seat="H2" id="100" class="item-seat childitem" style="left:247px; top:447px;">2</div>
         <div seatline="1" data-id="101" data-seat="H3" id="101" class="item-seat childitem" style="left:311px; top:447px;">3</div>
         <div seatline="1" data-id="102" data-seat="H4" id="102" class="item-seat childitem" style="left:375px; top:447px;">4</div>
         <div seatline="1" data-id="103" data-seat="H5" id="103" class="item-seat childitem" style="left:438px; top:447px;">5</div>
         <div seatline="1" data-id="104" data-seat="H6" id="104" class="item-seat childitem" style="left:502px; top:447px;">6</div>
         <div seatline="2" data-id="105" data-seat="H7" id="105" class="item-seat childitem" style="left:603px; top:447px;">7</div>
         <div seatline="2" data-id="106" data-seat="H8" id="106" class="item-seat childitem" style="left:667px; top:447px;">8</div>
         <div seatline="2" data-id="107" data-seat="H9" id="107" class="item-seat childitem" style="left:731px; top:447px;">9</div>
         <div seatline="2" data-id="108" data-seat="H10" id="108" class="item-seat childitem" style="left:795px; top:447px;">10</div>
         <div seatline="2" data-id="109" data-seat="H11" id="109" class="item-seat childitem" style="left:858px; top:447px;">11</div>
         <div seatline="2" data-id="110" data-seat="H12" id="110" class="item-seat childitem" style="left:922px; top:447px;">12</div>
         <div seatline="2" data-id="111" data-seat="H13" id="111" class="item-seat childitem" style="left:986px; top:447px;">13</div>
         <div seatline="2" data-id="112" data-seat="H14" id="112" class="item-seat childitem" style="left:1050px; top:447px;">14</div>
         <div seatline="1" id="I1" class="item-seat line-seat" style="margin-left:50px; top:490px;">I</div>
         <div seatline="1" data-id="113" data-seat="I1" id="113" class="item-seat childitem" style="left:183px; top:491px;">1</div>
         <div seatline="1" data-id="114" data-seat="I2" id="114" class="item-seat childitem" style="left:247px; top:491px;">2</div>
         <div seatline="1" data-id="115" data-seat="I3" id="115" class="item-seat childitem" style="left:311px; top:491px;">3</div>
         <div seatline="1" data-id="116" data-seat="I4" id="116" class="item-seat childitem" style="left:375px; top:491px;">4</div>
         <div seatline="1" data-id="117" data-seat="I5" id="117" class="item-seat childitem" style="left:438px; top:491px;">5</div>
         <div seatline="1" data-id="118" data-seat="I6" id="118" class="item-seat childitem" style="left:502px; top:491px;">6</div>
         <div seatline="2" data-id="119" data-seat="I7" id="119" class="item-seat childitem" style="left:603px; top:491px;">7</div>
         <div seatline="2" data-id="120" data-seat="I8" id="120" class="item-seat childitem" style="left:667px; top:491px;">8</div>
         <div seatline="2" data-id="121" data-seat="I9" id="121" class="item-seat childitem" style="left:731px; top:491px;">9</div>
         <div seatline="2" data-id="122" data-seat="I10" id="122" class="item-seat childitem" style="left:795px; top:491px;">10</div>
         <div seatline="2" data-id="123" data-seat="I11" id="123" class="item-seat childitem" style="left:858px; top:491px;">11</div>
         <div seatline="2" data-id="124" data-seat="I12" id="124" class="item-seat childitem" style="left:922px; top:491px;">12</div>
         <div seatline="2" data-id="125" data-seat="I13" id="125" class="item-seat childitem" style="left:986px; top:491px;">13</div>
         <div seatline="2" data-id="126" data-seat="I14" id="126" class="item-seat childitem" style="left:1050px; top:491px;">14</div>
         <div seatline="1" id="J1" class="item-seat line-seat" style="margin-left:50px; top:535px;">J</div>
         <div seatline="1" data-id="127" data-seat="J1" id="127" class="item-seat childitem" style="left:183px; top:536px;">1</div>
         <div seatline="1" data-id="128" data-seat="J2" id="128" class="item-seat childitem" style="left:247px; top:536px;">2</div>
         <div seatline="1" data-id="129" data-seat="J3" id="129" class="item-seat childitem" style="left:311px; top:536px;">3</div>
         <div seatline="1" data-id="130" data-seat="J4" id="130" class="item-seat childitem" style="left:375px; top:536px;">4</div>
         <div seatline="1" data-id="131" data-seat="J5" id="131" class="item-seat childitem" style="left:438px; top:536px;">5</div>
         <div seatline="1" data-id="132" data-seat="J6" id="132" class="item-seat childitem" style="left:502px; top:536px;">6</div>
         <div seatline="2" data-id="133" data-seat="J7" id="133" class="item-seat childitem" style="left:603px; top:536px;">7</div>
         <div seatline="2" data-id="134" data-seat="J8" id="134" class="item-seat childitem" style="left:667px; top:536px;">8</div>
         <div seatline="2" data-id="135" data-seat="J9" id="135" class="item-seat childitem" style="left:731px; top:536px;">9</div>
         <div seatline="2" data-id="136" data-seat="J10" id="136" class="item-seat childitem" style="left:795px; top:536px;">10</div>
         <div seatline="2" data-id="137" data-seat="J11" id="137" class="item-seat childitem" style="left:858px; top:536px;">11</div>
         <div seatline="2" data-id="138" data-seat="J12" id="138" class="item-seat childitem" style="left:922px; top:536px;">12</div>
         <div seatline="2" data-id="139" data-seat="J13" id="139" class="item-seat childitem" style="left:986px; top:536px;">13</div>
         <div seatline="2" data-id="140" data-seat="J14" id="140" class="item-seat childitem" style="left:1050px; top:536px;">14</div>
      </div>
      <div class="container">
         <span class="delimeter-line"></span>
         <div class="content-type">
            <div class="div-seat">
               <ul>
                  <li class="item-seat"></li>
                  <li class="content-booked">:
                    @lang('user/booking.empty_seat')
                  </li>
               </ul>
               <div class="clear">
               </div>
            </div>
            <div class="div-seat">
               <ul>
                  <li class="item-seat-booked"></li>
                  <li class="content-booked">:
                    @lang('user/booking.selected_seat')
                  </li>
               </ul>
               <div class="clear">
               </div>
            </div>
            <div class="div-seat">
               <ul>
                  <li class="item-seat-selected-show"></li>
                  <li class="content-booked">:
                    @lang('user/booking.selecting_seat')
                  </li>
               </ul>
               <div class="clear">
               </div>
            </div>
            <div style="clear: both">
            </div>
         </div>
      </div>
      <section class="step-2-navigator">
         <div class="container back-and-forward">
            <div class="row">
               <div class="col-xs-12">
                  <a id="btnChangeTime" class="pull-left btn-changeschedule">@lang('user/booking.back')</a>
                  <a id="btnNext" class="pull-right btn-continue">@lang('user/booking.continue')</a>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
@endsection
@section('js')
<script src="js/public/order.js"></script>
@endsection
