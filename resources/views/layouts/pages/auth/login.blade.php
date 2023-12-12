@extends('layouts.auth')

@section('body')
  <section class="bg-gray vh-100">
    <div class="container h-100 pt-5">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-3">
          <a href="" class="nav-link mb-5 text-center">
            <img class="h-32px" src="{{ url('assets/images/logo.png') }}" alt="Logo">
          </a>

          <div class="card mb-5">  
            <form action="">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" autocomplete="off" autofocus>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control border-end-0 pe-0 rounded-start-0" id="password" name="password">
                  <span class="input-group-text bg-white border-start-0 pe-auto"><a href="javascript:;" id="password-toggle"><img src="{{ url('assets/images/eye-slash.png') }}" alt="password toogle" id="password-toggle-img"></a></span>
                </div>
              </div>
            </form>
            <div class="mb-3 d-grid">
              <button type="submit" class="btn btn-primary rounded-2">Login</button>
            </div>
          </div>
          <div class="text-center">
            Don't Have an account ? <a href="#" class="text-underline"><u>Sign Up</u></a>
          </div>

        </div>
      </div>
    </div>
  </section>

@endsection

@section('after-script')
    <script>
      var isPasswordRevealed = false;

      $('#password-toggle').on('click', function(e) {
        isPasswordRevealed = !isPasswordRevealed;

        if(isPasswordRevealed) {
          $('#password-toggle-img').attr('src', "{{ url('assets/images/eye.png') }}");
          $('#password').attr('type', 'text');
        } else {
          $('#password-toggle-img').attr('src', "{{ url('assets/images/eye-slash.png') }}");
          $('#password').attr('type', 'password');

        }
      });
    </script>
@endsection