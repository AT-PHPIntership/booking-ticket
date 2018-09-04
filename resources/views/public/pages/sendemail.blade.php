@extends('public.layout.master')
@section('title', __('user/resetpassword.title'))
@section('content')
  <!-- mail -->
    <div class="send-mail form-reset">
      <div class="container">
        <div class="content">
          <h2>{{ __('user/resetpassword.title') }}</h2>

          <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            <form id="send_reset_mail_form">
              <div class="alert alert-success" hidden></div>
              <div class="alert alert-danger" hidden></div>
              <input id="email_receive_mail" type="email" placeholder="{{ __('user/login.form.email_hint') }}" required="">
              <input id="send_reset_mail_btn" type="submit" value="{{ __('user/resetpassword.email_form.send_email_btn') }}">
            </form>
          </div>
        </div>
      </div>
    </div>
  <!-- //mail -->
@endsection
@section('js')
<script src="/js/public/resetpassword.js"></script>
@endsection