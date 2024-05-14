@extends("app")

@section("content")
<div class="col-md-12 col-lg-12">
    <div class="card mg-b-30">
       <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
             <div>
                <h6 class="card-header-title tx-13 mb-0">Paketler</h6>
             </div>
       
             </div>
          </div>
       </div>
       <div class="card-body pd-0">
       <div class="table-responsive">
          <table class="table">
             <thead>
                <tr>
                   <th>id</th>
                   <th>name</th>
                   <th>orjinal qiymet</th>
                   <th>sexsi qiymet </th>
                </tr>
             </thead>
             <tbody>
                <form action="/reseller/packages/edit" method="POST">
                @csrf
                @foreach ($packages as $index =>  $package )
                <tr>
                    <th scope="row">
                     @if(isset($package->id))
                        {{$package->id}}
                     @else
                        {{$package->original_package_id}}
                     @endif

                    </th>
                    <td>{{$package->package_name}}</td>
                    @if (isset($package->official_credits))
                    <td>{{$package->official_credits}} kredit</td>
                    
                 
                    @else
                    <td>{{$package->officialCredits}} kredit</td>
              
                    @endif
                    
                 
                    <td>
                     @php
                        $ofc = 0;
                        if(isset( $custom_packages[$index]->officialCredits)) {
                           $ofc = $custom_packages[$index]->officialCredits;
                        }
                     @endphp
                    
                <input width="2" type="number" value="{{$ofc}}" name="offical_credits[]"> kredit
                <input type="hidden" value="
                @if(isset($package->original_package_id))
                    {{$package->original_package_id}}
                @else
                    {{$package->id}}
                @endif"  name="original_package_id[]">
                <input type="hidden" value="{{$package->package_name}}" name="package_name[]">
                @php $bouquets =  json_encode($package->bouquets); @endphp
                <input type="hidden" value="{{$bouquets}}" name="bouquets[]">
                <input type="hidden" value="{{$package->id}}" name="package_id[]">
           

                @if (isset($package->officialCredits)) 
                @if (count($custom_packages) > 0)
                <input type="hidden" value="{{$custom_packages[$index]->officialCredits}}" name="original_official_credits[]">
                @else 
                <input type="hidden" value="0" name="original_official_credits[]">
                @endif
                @else
                <input type="hidden" value="{{$package->official_credits}}" name="original_official_credits[]">
                @endif

              
                    </td>
                 </tr>
              
                @endforeach
           
             </tbody>   
          </table>
          <button class="btn-primary"> qeyd et </button>
        </form>
       </div>
       </div>
    </div>
 </div>

@endsection