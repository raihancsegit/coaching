@extends('admin.master')
@section('main-content')
  <!--Slider Start-->

  @if(Session::get('message'))
      <div class="alert alert-primary" role="alert">
          {{ Session::get('message') }}
      </div>
  @endif

  @if(Session::get('error_msg'))
      <div class="alert alert-danger" role="alert">
          {{ Session::get('error_msg') }}
      </div>
  @endif

  <section class="container-fluid">
      <div class="row">
          <div class="col-12 pl-0 pr-0">
              <div class="owl-carousel">
                  @foreach($slides as $slide)
                      <div class="item">
                          <img src="{{asset('/')}}{{$slide->slide_image}}" alt="">
                          <div class="slide-caption">
                              <h2>this is slider title</h2>
                              <p>description</p>
                          </div>
                      </div>
                  @endforeach

              </div>
          </div>
      </div>
  </section>
  <!--Slider End-->
@endsection
