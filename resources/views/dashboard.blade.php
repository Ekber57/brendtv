@extends("app")
@section("content")
<div class="col-md-6 col-lg-6 col-xl-3">
   <div class="card mg-b-30">
      <div class="card-body">
         <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Connections</h5>
         <div class="d-flex justify-content-between align-items-center">
            <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">{{$connections_count}}</h2>
         </div>
         {{-- <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+1,551</span>since last day</div> --}}
      </div>
   </div>
</div>
<div class="col-md-6 col-lg-6 col-xl-3">
   <div class="card mg-b-30">
      <div class="card-body">
         <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Lines</h5>
         <div class="d-flex justify-content-between align-items-center">
            <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">{{$lines}}</h2>
         </div>
         {{-- <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+1,551</span>since last day</div> --}}
      </div>
   </div>
</div>
<div class="col-md-6 col-lg-6 col-xl-3">
   <div class="card mg-b-30">
      <div class="card-body">
         <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Streams</h5>
         <div class="d-flex justify-content-between align-items-center">
            <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">46760</h2>
         </div>
         {{-- <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+1,551</span>since last day</div> --}}
      </div>
   </div>
</div>

@endsection