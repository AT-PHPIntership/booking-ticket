@extends('public.layout.master')
@section('title', __('user/title.title.login'))
@section('content')
<div class="wrap">
  <div class="content">
    <div class="content_top">
        <div class="seat-wrap">
        <div class="seat-count-box">
            <h4 class="pull-left">Vui lòng chọn số lượng ghế </h4>
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
                <div style="float: left; padding-right: 10px;">
                  <span style="color: #3B3B3B">
                  Phim: <b style="text-transform: uppercase">
                  Chang Vo Cua Em</b> </span>
                </div>
                <div style="float: left; padding-right: 10px;">
                  <span style="color: #3B3B3B">
                  Ngày chiếu: <b>
                  23-08-2018</b></span>
                </div>
                <div style="float: left; padding-right: 10px;">
                  <span style="color: #3B3B3B">
                  Lịch chiếu phim: <b>
                  20:30</b></span>
                </div>
              </div>
              <div style="float: left; padding-right: 10px;">
                <span style="color: #3B3B3B">
                Tổng ghế:
                <b>
                <span id="num_of_seat" data-seattotallabel="">1</span></b></span>
              </div>
              <div style="float: left; padding-right: 10px;">
                <span style="color: #3B3B3B">Tổng cộng: <b>
                <span id="total_price" data-totalprice="">60,000</span></b></span>
              </div>
              <div style="clear: both">
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="content_top">
      <div><h3 style="font-size: 25px; color: red">Bookings closes in <span id="time"></span> minutes!</h3></div>
    </div>
        <div class="div-seat-booing" id="sodoghe">
            <strong class="screen_tit">
            <font>
                <font class="">Màn hình</font>
            </font>
            </strong>
            <div seatline="1" id="A1" class="item-seat line-seat" style="margin-left:50px; top:137px;">A</div>
            <div seatline="1" data-id="1" id="1" class="item-seat childitem" style="left:183px; top:138px;">1</div>
            <div seatline="1" data-id="2" id="2" class="item-seat childitem" style="left:247px; top:138px;">2</div>
            <div seatline="1" data-id="3" id="3" class="item-seat childitem" style="left:311px; top:138px;">3</div>
            <div seatline="1" data-id="4" id="4" class="item-seat childitem" style="left:375px; top:138px;">4</div>
            <div seatline="1" data-id="5" id="5" class="item-seat childitem" style="left:438px; top:138px;">5</div>
            <div seatline="1" data-id="6" id="6" class="item-seat childitem" style="left:502px; top:138px;">6</div>
            <div seatline="2" data-id="7" id="7" class="item-seat childitem" style="left:603px; top:138px;">7</div>
            <div seatline="2" data-id="8" id="8" class="item-seat childitem" style="left:667px; top:138px;">8</div>
            <div seatline="2" data-id="9" id="9" class="item-seat childitem" style="left:731px; top:138px;">9</div>
            <div seatline="2" data-id="10" id="10" class="item-seat childitem" style="left:795px; top:138px;">10</div>
            <div seatline="2" data-id="11" id="11" class="item-seat childitem" style="left:858px; top:138px;">11</div>
            <div seatline="2" data-id="12" id="12" class="item-seat childitem" style="left:922px; top:138px;">12</div>
            <div seatline="2" data-id="13" id="13" class="item-seat childitem" style="left:986px; top:138px;">13</div>
            <div seatline="2" data-id="14" id="14" class="item-seat childitem" style="left:1050px; top:138px;">14</div>
            <div seatline="1" id="B1" class="item-seat line-seat" style="margin-left:50px; top:181px;">B</div>
            <div seatline="1" data-id="15" id="15" class="item-seat childitem" style="left:183px; top:182px;">1</div>
            <div seatline="1" data-id="16" id="16" class="item-seat childitem" style="left:247px; top:182px;">2</div>
            <div seatline="1" data-id="17" id="17" class="item-seat childitem" style="left:311px; top:182px;">3</div>
            <div seatline="1" data-id="18" id="18" class="item-seat childitem" style="left:375px; top:182px;">4</div>
            <div seatline="1" data-id="19" id="19" class="item-seat childitem" style="left:438px; top:182px;">5</div>
            <div seatline="1" data-id="20" id="20" class="item-seat childitem" style="left:502px; top:182px;">6</div>
            <div seatline="2" data-id="21" id="21" class="item-seat childitem" style="left:603px; top:182px;">7</div>
            <div seatline="2" data-id="22" id="22" class="item-seat childitem" style="left:667px; top:182px;">8</div>
            <div seatline="2" data-id="23" id="23" class="item-seat childitem" style="left:731px; top:182px;">9</div>
            <div seatline="2" data-id="24" id="24" class="item-seat childitem" style="left:795px; top:182px;">10</div>
            <div seatline="2" data-id="25" id="25" class="item-seat childitem" style="left:858px; top:182px;">11</div>
            <div seatline="2" data-id="26" id="26" class="item-seat childitem" style="left:922px; top:182px;">12</div>
            <div seatline="2" data-id="27" id="27" class="item-seat childitem" style="left:986px; top:182px;">13</div>
            <div seatline="2" data-id="28" id="28" class="item-seat childitem" style="left:1050px; top:182px;">14</div>
            <div seatline="1" id="C1" class="item-seat line-seat" style="margin-left:50px; top:226px;">C</div>
            <div seatline="1" data-id="29" id="29" class="item-seat childitem" style="left:183px; top:227px;">1</div>
            <div seatline="1" data-id="30" id="30" class="item-seat childitem" style="left:247px; top:227px;">2</div>
            <div seatline="1" data-id="31" id="31" class="item-seat childitem" style="left:311px; top:227px;">3</div>
            <div seatline="1" data-id="32" id="32" class="item-seat childitem" style="left:375px; top:227px;">4</div>
            <div seatline="1" data-id="33" id="33" class="item-seat childitem" style="left:438px; top:227px;">5</div>
            <div seatline="1" data-id="34" id="34" class="item-seat childitem" style="left:502px; top:227px;">6</div>
            <div seatline="2" data-id="35" id="35" class="item-seat childitem" style="left:603px; top:227px;">7</div>
            <div seatline="2" data-id="36" id="36" class="item-seat childitem" style="left:667px; top:227px;">8</div>
            <div seatline="2" data-id="37" id="37" class="item-seat childitem" style="left:731px; top:227px;">9</div>
            <div seatline="2" data-id="38" id="38" class="item-seat childitem" style="left:795px; top:227px;">10</div>
            <div seatline="2" data-id="39" id="39" class="item-seat childitem" style="left:858px; top:227px;">11</div>
            <div seatline="2" data-id="40" id="40" class="item-seat childitem" style="left:922px; top:227px;">12</div>
            <div seatline="2" data-id="41" id="41" class="item-seat childitem" style="left:986px; top:227px;">13</div>
            <div seatline="2" data-id="42" id="42" class="item-seat childitem" style="left:1050px; top:227px;">14</div>
            <div seatline="1" id="D1" class="item-seat line-seat" style="margin-left:50px; top:270px;">D</div>
            <div seatline="1" data-id="43" id="43" class="item-seat childitem" style="left:183px; top:271px;">1</div>
            <div seatline="1" data-id="44" id="44" class="item-seat childitem" style="left:247px; top:271px;">2</div>
            <div seatline="1" data-id="45" id="45" class="item-seat childitem" style="left:311px; top:271px;">3</div>
            <div seatline="1" data-id="46" id="46" class="item-seat childitem" style="left:375px; top:271px;">4</div>
            <div seatline="1" data-id="47" id="47" class="item-seat childitem" style="left:438px; top:271px;">5</div>
            <div seatline="1" data-id="48" id="48" class="item-seat childitem" style="left:502px; top:271px;">6</div>
            <div seatline="2" data-id="49" id="49" class="item-seat childitem" style="left:603px; top:271px;">7</div>
            <div seatline="2" data-id="50" id="50" class="item-seat childitem" style="left:667px; top:271px;">8</div>
            <div seatline="2" data-id="51" id="51" class="item-seat childitem" style="left:731px; top:271px;">9</div>
            <div seatline="2" data-id="52" id="52" class="item-seat childitem" style="left:795px; top:271px;">10</div>
            <div seatline="2" data-id="53" id="53" class="item-seat childitem" style="left:858px; top:271px;">11</div>
            <div seatline="2" data-id="54" id="54" class="item-seat childitem" style="left:922px; top:271px;">12</div>
            <div seatline="2" data-id="55" id="55" class="item-seat childitem" style="left:986px; top:271px;">13</div>
            <div seatline="2" data-id="56" id="56" class="item-seat childitem" style="left:1050px; top:271px;">14</div>
            <div seatline="1" id="E1" class="item-seat line-seat" style="margin-left:50px; top:314px;">E</div>
            <div seatline="1" data-id="57" id="57" class="item-seat childitem" style="left:183px; top:315px;">1</div>
            <div seatline="1" data-id="58" id="58" class="item-seat childitem" style="left:247px; top:315px;">2</div>
            <div seatline="1" data-id="59" id="59" class="item-seat childitem" style="left:311px; top:315px;">3</div>
            <div seatline="1" data-id="60" id="60" class="item-seat childitem" style="left:375px; top:315px;">4</div>
            <div seatline="1" data-id="61" id="61" class="item-seat childitem" style="left:438px; top:315px;">5</div>
            <div seatline="1" data-id="62" id="62" class="item-seat childitem" style="left:502px; top:315px;">6</div>
            <div seatline="2" data-id="63" id="63" class="item-seat childitem" style="left:603px; top:315px;">7</div>
            <div seatline="2" data-id="64" id="64" class="item-seat childitem" style="left:667px; top:315px;">8</div>
            <div seatline="2" data-id="65" id="65" class="item-seat childitem" style="left:731px; top:315px;">9</div>
            <div seatline="2" data-id="66" id="66" class="item-seat childitem" style="left:795px; top:315px;">10</div>
            <div seatline="2" data-id="67" id="67" class="item-seat childitem" style="left:858px; top:315px;">11</div>
            <div seatline="2" data-id="68" id="68" class="item-seat childitem" style="left:922px; top:315px;">12</div>
            <div seatline="2" data-id="69" id="69" class="item-seat childitem" style="left:986px; top:315px;">13</div>
            <div seatline="2" data-id="70" id="70" class="item-seat childitem" style="left:1050px; top:315px;">14</div>
            <div seatline="1" id="F1" class="item-seat line-seat" style="margin-left:50px; top:358px;">F</div>
            <div seatline="1" data-id="71" id="71" class="item-seat childitem" style="left:183px; top:359px;">1</div>
            <div seatline="1" data-id="72" id="72" class="item-seat childitem" style="left:247px; top:359px;">2</div>
            <div seatline="1" data-id="73" id="73" class="item-seat childitem" style="left:311px; top:359px;">3</div>
            <div seatline="1" data-id="74" id="74" class="item-seat childitem" style="left:375px; top:359px;">4</div>
            <div seatline="1" data-id="75" id="75" class="item-seat childitem" style="left:438px; top:359px;">5</div>
            <div seatline="1" data-id="76" id="76" class="item-seat childitem" style="left:502px; top:359px;">6</div>
            <div seatline="2" data-id="77" id="77" class="item-seat childitem" style="left:603px; top:359px;">7</div>
            <div seatline="2" data-id="78" id="78" class="item-seat childitem" style="left:667px; top:359px;">8</div>
            <div seatline="2" data-id="79" id="79" class="item-seat childitem" style="left:731px; top:359px;">9</div>
            <div seatline="2" data-id="80" id="80" class="item-seat childitem" style="left:795px; top:359px;">10</div>
            <div seatline="2" data-id="81" id="81" class="item-seat childitem" style="left:858px; top:359px;">11</div>
            <div seatline="2" data-id="82" id="82" class="item-seat childitem" style="left:922px; top:359px;">12</div>
            <div seatline="2" data-id="83" id="83" class="item-seat childitem" style="left:986px; top:359px;">13</div>
            <div seatline="2" data-id="84" id="84" class="item-seat childitem" style="left:1050px; top:359px;">14</div>
            <div seatline="1" id="G1" class="item-seat line-seat" style="margin-left:50px; top:402px;">G</div>
            <div seatline="1" data-id="85" id="85" class="item-seat childitem" style="left:183px; top:403px;">1</div>
            <div seatline="1" data-id="86" id="86" class="item-seat childitem" style="left:247px; top:403px;">2</div>
            <div seatline="1" data-id="87" id="87" class="item-seat childitem" style="left:311px; top:403px;">3</div>
            <div seatline="1" data-id="88" id="88" class="item-seat childitem" style="left:375px; top:403px;">4</div>
            <div seatline="1" data-id="89" id="89" class="item-seat childitem" style="left:438px; top:403px;">5</div>
            <div seatline="1" data-id="90" id="90" class="item-seat childitem" style="left:502px; top:403px;">6</div>
            <div seatline="2" data-id="91" id="91" class="item-seat childitem" style="left:603px; top:403px;">7</div>
            <div seatline="2" data-id="92" id="92" class="item-seat childitem" style="left:667px; top:403px;">8</div>
            <div seatline="2" data-id="93" id="93" class="item-seat childitem" style="left:731px; top:403px;">9</div>
            <div seatline="2" data-id="94" id="94" class="item-seat childitem" style="left:795px; top:403px;">10</div>
            <div seatline="2" data-id="95" id="95" class="item-seat childitem" style="left:858px; top:403px;">11</div>
            <div seatline="2" data-id="96" id="96" class="item-seat childitem" style="left:922px; top:403px;">12</div>
            <div seatline="2" data-id="97" id="97" class="item-seat childitem" style="left:986px; top:403px;">13</div>
            <div seatline="2" data-id="98" id="98" class="item-seat childitem" style="left:1050px; top:403px;">14</div>
            <div seatline="1" id="H1" class="item-seat line-seat" style="margin-left:50px; top:446px;">H</div>
            <div seatline="1" data-id="99" id="99" class="item-seat childitem" style="left:183px; top:447px;">1</div>
            <div seatline="1" data-id="100" id="100" class="item-seat childitem" style="left:247px; top:447px;">2</div>
            <div seatline="1" data-id="101" id="101" class="item-seat childitem" style="left:311px; top:447px;">3</div>
            <div seatline="1" data-id="102" id="102" class="item-seat childitem" style="left:375px; top:447px;">4</div>
            <div seatline="1" data-id="103" id="103" class="item-seat childitem" style="left:438px; top:447px;">5</div>
            <div seatline="1" data-id="104" id="104" class="item-seat childitem" style="left:502px; top:447px;">6</div>
            <div seatline="2" data-id="105" id="105" class="item-seat childitem" style="left:603px; top:447px;">7</div>
            <div seatline="2" data-id="106" id="106" class="item-seat childitem" style="left:667px; top:447px;">8</div>
            <div seatline="2" data-id="107" id="107" class="item-seat childitem" style="left:731px; top:447px;">9</div>
            <div seatline="2" data-id="108" id="108" class="item-seat childitem" style="left:795px; top:447px;">10</div>
            <div seatline="2" data-id="109" id="109" class="item-seat childitem" style="left:858px; top:447px;">11</div>
            <div seatline="2" data-id="110" id="110" class="item-seat childitem" style="left:922px; top:447px;">12</div>
            <div seatline="2" data-id="111" id="111" class="item-seat childitem" style="left:986px; top:447px;">13</div>
            <div seatline="2" data-id="112" id="112" class="item-seat childitem" style="left:1050px; top:447px;">14</div>
            <div seatline="1" id="I1" class="item-seat line-seat" style="margin-left:50px; top:490px;">I</div>
            <div seatline="1" data-id="113" id="113" class="item-seat childitem" style="left:183px; top:491px;">1</div>
            <div seatline="1" data-id="114" id="114" class="item-seat childitem" style="left:247px; top:491px;">2</div>
            <div seatline="1" data-id="115" id="115" class="item-seat childitem" style="left:311px; top:491px;">3</div>
            <div seatline="1" data-id="116" id="116" class="item-seat childitem" style="left:375px; top:491px;">4</div>
            <div seatline="1" data-id="117" id="117" class="item-seat childitem" style="left:438px; top:491px;">5</div>
            <div seatline="1" data-id="118" id="118" class="item-seat childitem" style="left:502px; top:491px;">6</div>
            <div seatline="2" data-id="119" id="119" class="item-seat childitem" style="left:603px; top:491px;">7</div>
            <div seatline="2" data-id="120" id="120" class="item-seat childitem" style="left:667px; top:491px;">8</div>
            <div seatline="2" data-id="121" id="121" class="item-seat childitem" style="left:731px; top:491px;">9</div>
            <div seatline="2" data-id="122" id="122" class="item-seat childitem" style="left:795px; top:491px;">10</div>
            <div seatline="2" data-id="123" id="123" class="item-seat childitem" style="left:858px; top:491px;">11</div>
            <div seatline="2" data-id="124" id="124" class="item-seat childitem" style="left:922px; top:491px;">12</div>
            <div seatline="2" data-id="125" id="125" class="item-seat childitem" style="left:986px; top:491px;">13</div>
            <div seatline="2" data-id="126" id="126" class="item-seat childitem" style="left:1050px; top:491px;">14</div>
            <div seatline="1" id="J1" class="item-seat line-seat" style="margin-left:50px; top:535px;">J</div>
            <div seatline="1" data-id="127" id="127" class="item-seat childitem" style="left:183px; top:536px;">1</div>
            <div seatline="1" data-id="128" id="128" class="item-seat childitem" style="left:247px; top:536px;">2</div>
            <div seatline="1" data-id="129" id="129" class="item-seat childitem" style="left:311px; top:536px;">3</div>
            <div seatline="1" data-id="130" id="130" class="item-seat childitem" style="left:375px; top:536px;">4</div>
            <div seatline="1" data-id="131" id="131" class="item-seat childitem" style="left:438px; top:536px;">5</div>
            <div seatline="1" data-id="132" id="132" class="item-seat childitem" style="left:502px; top:536px;">6</div>
            <div seatline="2" data-id="133" id="133" class="item-seat childitem" style="left:603px; top:536px;">7</div>
            <div seatline="2" data-id="134" id="134" class="item-seat childitem" style="left:667px; top:536px;">8</div>
            <div seatline="2" data-id="135" id="135" class="item-seat childitem" style="left:731px; top:536px;">9</div>
            <div seatline="2" data-id="136" id="136" class="item-seat childitem" style="left:795px; top:536px;">10</div>
            <div seatline="2" data-id="137" id="137" class="item-seat childitem" style="left:858px; top:536px;">11</div>
            <div seatline="2" data-id="138" id="138" class="item-seat childitem" style="left:922px; top:536px;">12</div>
            <div seatline="2" data-id="139" id="139" class="item-seat childitem" style="left:986px; top:536px;">13</div>
            <div seatline="2" data-id="140" id="140" class="item-seat childitem" style="left:1050px; top:536px;">14</div>
        </div>
        <section class="step-2-navigator">
          <div class="container back-and-forward">
            <div class="row">
              <div class="col-xs-12">
                <a id="btnNext" class="pull-right btn-continue">Tiếp tục</a>
              </div>
            </div>
          </div>
        </section>
      </div>
   </div>
@endsection
@section('script')
  <script src="js/public/order.js"></script>
@endsection

