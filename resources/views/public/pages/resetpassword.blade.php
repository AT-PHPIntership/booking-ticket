@extends('public.layout.master')
@section('title', __('user/resetpassword.title'))
@section('content')
  <!-- mail -->
    <div class="reset-pass form-reset">
      <div class="container">
        <div class="content">
        <h2>{{ __('user/resetpassword.title') }}</h2>

          <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            <form id="reset_password_form">
              <div class="alert alert-success" hidden></div>

              <input id="reset_token" type="hidden" name="token" value="{{ $token }}">

              <input id="email_account" type="email" placeholder="{{ __('user/login.form.email_hint') }}" value="{{ $email }}" required="">

              <div class="alert alert-danger invalid-feedback-email" hidden></div>

              <input id="new_password" type="password" placeholder="{{ __('user/login.form.password_hint') }}" required="">

              <div class="alert alert-danger invalid-feedback-password" hidden></div>

              <input id="new_password_confirm" type="password" placeholder="{{ __('user/login.form.repassword') }}" required="">

              <input id="reset_password_btn" type="submit" value="{{ __('user/resetpassword.reset_form.reset_password_btn') }}">
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