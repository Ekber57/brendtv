@extends("app")
{{-- @section('panel_name')
Reseller List
@endsection --}}
@section("content")
<div class="col-md-12 col-lg-12">
    <div class="card mg-b-30">
       <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
             <div>
                <h6 class="card-header-title tx-13 mb-0">Paketler</h6>
             </div>
             <div class="text-right">
                <div class="d-flex">
                </div>
             </div>
          </div>
       </div>
       <div class="card-body pd-0">
       <div class="table-responsive">
          <table class="table">
             <thead>
                <tr>
                   <th>#</th>
                   <th>Name</th>
                   <th>Username</th>
                   <th>Mail</th>
                   <th>Phone</th>
                   <th>Balance</th>
                </tr>
             </thead>
             <tbody>
                @foreach ($users as $user )
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->balance}}</td>



                    <td><div class="text-right">
                        <div class="d-flex">
                           {{-- <a href="" class="mr-3"><i class="ti-reload"></i></a> --}}
                           <div class="dropdown" data-toggle="dropdown" aria-expanded="false">
                              <a href=""><i class="ti-more-alt"></i></a>
                              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(14px, 21px, 0px); top: 0px; left: 0px; will-change: transform;">
                                  <a onclick="editUser({{$user->id}})" href="" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info wd-16 mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line></svg>Guncelle</a>
                              </div>
                           </div>
                        </div>
                     </div></td>
                 </tr>
              
                @endforeach
           
             </tbody>
          </table>
       </div>
       </div>
    </div>
    </div>
    </div>

    {{$users->links('helper.paginator')}}

<script>
function editUser(userId) {
   window.location.href = "{{url('/')}}"+"/reseller/edit/" + userId
}
</script>
@endsection

