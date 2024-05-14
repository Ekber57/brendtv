@extends('app')
@section('content')

    <div class="col-md-12 col-lg-12">
        <div class="card mg-b-30">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-header-title tx-13 mb-0">{{$user->name}} melumatlarinin deyisilmesi</h6>
                    </div>
                    
                </div>
            </div>


            @if (session()->has('data'))
                @php
                    $data = session()->get('data');
                @endphp

                {{-- Access your data here --}}

                <div class="alert alert-success alert-bordered pd-y-15" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close tx-16"></i></span>
                    </button>
                    <div class="d-sm-flex align-items-center justify-content-start">
                        <i class="ti-crown alert-icon tx-50 mg-r-20 tx-success"></i>
                        <div class="mg-t-20 mg-sm-t-0">
                            <h5 class="mg-b-2 tx-success"> {{ $data}}</h5>
                            <p class="mg-b-0 tx-gray">.</p>
                        </div>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="sl" action="/system/user/edit" method="POST">

         
                        @csrf

                        <div class="row mg-t-20">
                            <div class="col-lg">
                                <input type="hidden" name="user_id" class="form-control form-control-sm"
                                value="{{$user->id}}"
                                    placeholder=" {{ __('messages.name') }}" type="text">
                                <input name="name" class="form-control form-control-sm"
                                value="{{$user->name}}"
                                    placeholder=" {{ __('messages.name') }}" type="text">
                            </div>
                            <div class="col-lg">
                                <input  value="{{$user->username}}" name="username"
                                    class="form-control form-control-sm" placeholder=" {{ __('messages.username') }}"
                                    type="text">
                            </div>
                            <!-- col -->
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <input value="{{$user->phone}}"" name="phone" class="form-control form-control-sm"
                                    placeholder=" {{ __('messages.phone') }}" type="text">
                            </div>

                        </div>
                        <div class="row mg-t-20">
                            <div class="col-lg">
                                <input value="{{$user->email}}" name="mail" class="form-control form-control-sm"
                                    placeholder=" {{ __('messages.mail') }}" type="text">
                            </div>
                            <div class="col-lg">
                                <input value="{{$user->balance}}" name="balance" class="form-control form-control-sm"
                                    placeholder=" {{ __('messages.balance') }}" type="text">
                            </div>
                    
                      
          







                            </div> 
                            <!-- col -->
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <input name="password" class="form-control form-control-sm"
                                    placeholder=" {{ __('messages.password') }}" type="text">
                            </div>

                        </div>
                    </div>


                    <input value="[]" id="bouquet_names" name="bouquet_names" type="hidden">
                    <button class="form-control form-control-sm  bg-success" style="color: white"
                        placeholder=" {{ __('messages.create_new_account') }}"
                        type="submit">{{ __('messages.create_new_account') }}</button>
            </form>

        </div>
        </form>
        <!-- col -->
    

@endsection
