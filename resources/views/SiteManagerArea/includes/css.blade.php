  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
      type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/argonpro.css?v=1.2.0') }}" type="text/css">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

  <!-- Default theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css" />
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css" />
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css" />
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="stylesheet"
      href="  https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css  ">
  <link rel="stylesheet" href="{{ asset('assets/css/sptoast.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
  <style>
      .main-content-height {
          min-height: 400px;
      }

      .d-inline-block {
          display: inline-block;
      }

      .select-box label.error {
          color: red;
          font-size: 0.8rem !important;
          position: absolute !important;
          top: 36px !important;
      }

      .select-box-lg label.error {
          color: red;
          font-size: 0.8rem !important;
          position: absolute !important;
          top: 70px !important;
      }


      .error:before {
          font-family: "Font Awesome 5 Free";
          content: "\f071";
          display: inline-block;
          padding-right: 3px;
          vertical-align: middle;
          font-weight: 900;
      }

      .error {
          margin-top: 0.8rem;
          font-weight: 800;
          font-size: 0.8rem !important;
      }

      /* Data table css */
      .dataTables_length {
          padding-left: 1.5rem;
      }

      .dataTables_filter {
          padding-right: 1.5rem;

      }

      .dataTables_info {
          padding-left: 1.5rem;
      }

      .dataTables_wrapper .dataTables_paginate {
          padding-right: 1.5rem;
      }

      /* Select2 custom style */
      .select2-container--default .select2-selection--single {
          background-color: #fff;
          border-radius: 4px;
          height: calc(2.75rem + 2px);
          box-shadow: 0 1px 3px rgba(50, 50, 93, 0.15), 0 1px 0 rgba(0, 0, 0, 0.02);
          border: 0;
          transition: box-shadow .15s ease;
          line-height: 1.5rem;
          font-size: 0.875rem;
          padding: 0.625rem 0.75rem;
      }

      .select2-dropdown {
          box-shadow: 0 1px 3px rgba(50, 50, 93, 0.15), 0 1px 0 rgba(0, 0, 0, 0.02);
          border: 0;
          transition: box-shadow .15s ease;
      }


      .select2-container--default .select2-selection--single .select2-selection__arrow b {
          margin-top: 6px;
      }

      .select2-selection.select2-selection--single {
          transition: box-shadow .15s ease;
          border: 0;
          box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
          font-size: .875rem;
          height: calc(1.5em + 1.25rem + 5px);
          line-height: 1.875rem;
      }

      .avatar img {
          height: 100% !important;
          width: 100% !important;
      }

      a.disabled {

          color: gray;
          pointer-events: none;
      }

      @media (max-width: 767.98px) {

          .main-content-height {
              min-height: 100%;
          }
      }

      #loader {
          position: fixed;
          top: 0px;
          bottom: 0px;
          left: 0px;
          right: 0px;
          width: 100vw;
          height: 100vh;
          background-color: rgba(255, 255, 255, 0.98);
          z-index: 10000;
      }

      .animate {
          position: absolute;
          left: 40%;
          top: 50%;
          justify-content: center;
          align-items: center;
          height: 100%;
          margin: auto;
          font-family: Helvetica, sans-serif, Arial;
          animation: load 1.2s infinite 0s ease-in-out;
          animation-direction: alternate;
          text-shadow: 0 0 1px white;
      }

      .breadcrumb-dark .breadcrumb-item a {
          color: #2b2c5ab0;
      }

      .breadcrumb-dark .breadcrumb-item.active {
          color: #2b2c5ab0;
      }

      .breadcrumb-dark .breadcrumb-item+.breadcrumb-item::before {
          color: #2b2c5ab0;
      }

      .footer .copyright {
          font-size: .8rem;
      }

      .badge-top {
          position: relative;
          top: -15px;
          left: -15px;
          border: 1px solid black;
          border-radius: 50%;
      }

      .notification .badge {
          position: absolute;
          top: 1px;
          right: 6px;
          width: 15px;
          height: 15px;
          padding-top: 4px;
          border-radius: 53%;
          font-size: 6px;

      }

      .notification_2 .badge {
          position: absolute;
          top: 1px;
          right: 5px;
          width: 15px;
          height: 15px;
          padding-top: 4px;
          border-radius: 53%;
          font-size: 6px;

      }

      .badge-yellow {
          color: #fac108;
          background-color: #faefb0;
      }

      .badge-green {
          color: #008d18;
          background-color: #a8dab0;
      }

  </style>
  @yield('css')
