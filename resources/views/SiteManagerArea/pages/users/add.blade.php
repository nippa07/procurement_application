@extends('SiteManagerArea.layouts.app')

@section('header-content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-dark d-inline-block mb-0">Add Supplier</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siteManager.suppliers.all') }}">Suppliers</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Add Supplier</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card">
            <div class="card-body">
                <form action="{{ route('siteManager.suppliers.store') }}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name"><b>Name </b> </label>
                                <input id="name" class="form-control" type="text" name="name" required>
                                <span class="invalid-feedback" id="email_msg"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email"><b>Email </b> </label>
                                <input id="inp_email" class="form-control" type="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="company_name"><b>Company</b> </label>
                                <input id="company_name" class="form-control" type="text" name="company_name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone"><b>Phone</b> </label>
                                <input id="phone" class="form-control" type="text" name="phone" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address_1"><b>Address Line 1 </b> </label>
                                <input id="address_1" class="form-control" type="text" name="address_1" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address_2"><b>Address Line 2 </b> </label>
                                <input id="address_2" class="form-control" type="text" name="address_2" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address_3"><b>Address Line 3</b> </label>&nbsp;<sup
                                    class="text-danger">*optional</sup>
                                <input id="address_3" class="form-control" type="text" name="address_3">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label><b>New Password</b></label>
                                <a href="javascript:void(0)" id="passGen">&nbsp;Generate</a>
                                <input id="password" minlength="8" type="password" onkeyup="conf_rule_validator()"
                                    class="responsive-moblile form-control @error('password') is-invalid @enderror"
                                    name="password" autocomplete="new-password" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><b>{{ __('Confirm Password') }}<sup class="text-danger"></sup></b></label>
                                <i id="eye" onclick="showPassword()" class="far fa-eye"></i>
                                <input id="password-confirm" minlength="8" type="password"
                                    class="responsive-moblile form-control" name="password_confirmation"
                                    onkeyup="conf_rule_validator()" autocomplete="new-password" required>
                                <span class="invalid-feedback text-danger" id="conf_password_msg"
                                    style="display:block;">
                                </span>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">

                                <h6 class="text-center responsive-moblile">
                                    <button type="submit" class="btn btn-primary di">
                                        Add Supplier
                                    </button>
                                </h6>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {});

    $('#passGen').on('click', function () {
        var pass = Math.random().toString(36).slice(-8);
        $('#password').val(pass);
        $('#password-confirm').val(pass);
        conf_rule_validator();
        validsubmit();
    });

    var password;
    var password2;
    var conf_password_valid = false;
    var email_valid = false;

    function conf_rule_validator() {
        password = $('#password');
        password2 = $('#password-confirm');
        if (!password.val() || !password2.val()) {
            $('#conf_password_msg').html('');
            conf_password_valid = false;
            $('#password-confirm').removeClass("is-invalid").removeClass("is-valid");
        } else if (((password.val() != password2.val()))) {
            $('#password-confirm').addClass("is-invalid").removeClass("is-valid");
            $('#conf_password_msg').html("<strong>Password Mismatch</strong>");
            $('#conf_valid_password').val(0);
            conf_password_valid = false;
        } else if (password.val() == password2.val()) {
            $('#password-confirm').addClass("is-valid").removeClass("is-invalid");
            $('#conf_password_msg').html("");
            conf_password_valid = true;
            $('#conf_valid_password').val(1);
        }
        validsubmit();
    };

    function showPassword() {
        var type = $('#password').attr('type')
        if (type == 'password') {
            $('#password').attr('type', 'text');
            $('#password-confirm').attr('type', 'text');
            $('#eye').removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            $('#password').attr('type', 'password');
            $('#password-confirm').attr('type', 'password');
            $('#eye').removeClass("fa-eye-slash").addClass("fa-eye");
        }
    }

    function validsubmit() {
        if (!$('#inp_email').val()) {
            $('#inp_email').addClass("is-invalid").removeClass("is-valid");
            $('#email_msg').html("<strong class='text-danger'>Email is required</strong>");
            email_valid = false;
        }
        if (conf_password_valid === true && email_valid === true) {
            $('#submit-btn').prop('disabled', false);
        } else {
            $('#submit-btn').prop('disabled', true);
        }
    }

</script>
@endsection
