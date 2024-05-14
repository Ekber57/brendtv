@extends("app")
@section("content")

<div class="col-md-6 col-lg-6 col-xl-3">
    <div class="card mg-b-30">
       <div class="card-body">
          <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">User {{$user->username}}</h5>
          <div class="d-flex justify-content-between align-items-center">
             <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">{{$user->name}}</h2>
          </div>
          {{-- <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+1,551</span>since last day</div> --}}
       </div>
    </div>
 </div>
 <div class="col-md-6 col-lg-6 col-xl-3">
    <div class="card mg-b-30">
       <div class="card-body">
          <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Balans</h5>
          <div class="d-flex justify-content-between align-items-center">
             <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">{{$user->balance}} kredit</h2>
          </div>
          {{-- <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+1,551</span>since last day</div> --}}
       </div>
    </div>
 </div>
 @if (!is_null($line))
 
 @if ($line->package_id  > 0)
     
 <div class="col-md-6 col-lg-6 col-xl-3">
    <div class="card mg-b-30">
       <div class="card-body">
          <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Paket</h5>
          <div class="d-flex justify-content-between align-items-center">
             <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">{{$line->package_name}} </h2>
          </div>
          {{-- <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+1,551</span>since last day</div> --}}
       </div>
    </div>
 </div>
 @endif
 @endif
 
<div class="container">
    <div class="row card-header d-flex align-items-center">
      
       @foreach ($packages as $p )
       @if (!$p->is_trial)
       <div class="col">
            
        <div class="card" style="width: 18rem; margin-top:3%">
            <img class="card-img-top" src="pac.png" height="250" alt="Card image cap">
            <div class="card-body">
                    <h5 class="card-title">{{$p->package_name}}</h5>
              <p class="card-text "><button type="button" class="btn btn-success">Success</button></p>
            </div>
          </div>
      </div>
       @endif

       @endforeach
  </div>
  </div>
  @endsection