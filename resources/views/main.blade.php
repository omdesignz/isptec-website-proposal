@extends('layouts.front')

@section('content')

@include('layouts.includes.home_slider3')

@include('layouts.includes.latest_news')
@include('layouts.includes.education_offer')
@include('layouts.includes.ccd_offer')
<br>
@include('layouts.includes.latest_events')
@include('layouts.includes.ijournal')
<br>
<div class="bg-white pt-16 pb-20 px-4 sm:px-6 lg:pt-12 lg:pb-12 lg:px-8">
  <div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 lg:max-w-7xl flex items-center">
<iframe src=https://www.umultirank.org/university-performance-charts/polytechnic-institute-of-technologies-and-sciences-isptec-rankings scrolling=no style="height:274px;width:300px;border:none; padding-left: 0px; padding-top: 0px;"/>

  </div>
</div>



<div class="" style="padding-top: 56.25%">
  <div>
    <iframe class="" src="https://www.youtube-nocookie.com/embed/FMrtSHAAPhM" frameborder="0"></iframe>
  </div>
</div>


@endsection

@section('footer_scripts')

<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>

<script>
  let swiper = new Swiper(".mySwiper", {
        loop:true,
        autoplay: {
        delay: 5500,
        disableOnInteraction: false,
        },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
  });
</script>

@endsection