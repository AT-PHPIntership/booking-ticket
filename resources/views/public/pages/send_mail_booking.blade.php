<h2>@lang('user/mail.booking.thanks')</h2>
<h3>@lang('user/mail.booking.title')</h3>
@lang('user/mail.booking.id') {{ $booking_id }} <br>
@lang('user/mail.booking.room') {{ $film->room }} <br>
@lang('user/mail.booking.film') {{ $film->film }} <br>
@lang('user/mail.booking.total_price') {{ $totalPrice }} <br>
@lang('user/mail.booking.start_time') {{  $film->start_time }} <br>
@lang('user/mail.booking.seat') {{ $seats }}