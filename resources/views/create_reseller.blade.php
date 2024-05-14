@extends('app')
@section('content')

    <div class="col-md-12 col-lg-12">
        <div class="card mg-b-30">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-header-title tx-13 mb-0">Basic Form</h6>
                    </div>
                    <div class="text-right">
                        <div class="d-flex">
                            <a href="" class="mr-3"><i class="ti-reload"></i></a>
                            <div class="dropdown" data-toggle="dropdown">
                                <a href=""><i class="ti-more-alt"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-info wd-16 mr-2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="16" x2="12" y2="12"></line>
                                            <line x1="12" y1="8" x2="12" y2="8"></line>
                                        </svg>View Details</a>
                                    <a href="" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-share wd-16 mr-2">
                                            <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                            <polyline points="16 6 12 2 8 6"></polyline>
                                            <line x1="12" y1="2" x2="12" y2="15"></line>
                                        </svg>Share</a>
                                    <a href="" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-download wd-16 mr-2">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="7 10 12 15 17 10"></polyline>
                                            <line x1="12" y1="15" x2="12" y2="3"></line>
                                        </svg>Download</a>
                                    <a href="" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-copy wd-16 mr-2">
                                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2">
                                            </rect>
                                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                        </svg>Copy to</a>
                                    <a href="" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-folder wd-16 mr-2">
                                            <path
                                                d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z">
                                            </path>
                                        </svg>Move to</a>
                                    <a href="" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-edit wd-16 mr-2">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>Rename</a>
                                    <a href="" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-trash wd-16 mr-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                        </svg>Delete</a>
                                </div>
                            </div>
                        </div>
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
                            <h5 class="mg-b-2 tx-success"> {{ $data['message'] }}</h5>
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
            <form id="sl" action="/reseller/create" method="POST">

         
                        @csrf

                        <div class="row mg-t-20">
                            <div class="col-lg">
                                <input name="name" class="form-control form-control-sm"
                                    placeholder=" {{ __('messages.name') }}" type="text">
                            </div>
                            <div class="col-lg">
                                <input readonly value="user{{ random_int(1000, 10000000) }}" name="username"
                                    class="form-control form-control-sm" placeholder=" {{ __('messages.username') }}"
                                    type="text">
                            </div>
                            <!-- col -->
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <input name="phone" class="form-control form-control-sm"
                                    placeholder=" {{ __('messages.phone') }}" type="text">
                            </div>

                        </div>
                        <div class="row mg-t-20">
                            <div class="col-lg">
                                <input name="mail" class="form-control form-control-sm"
                                    placeholder=" {{ __('messages.mail') }}" type="text">
                            </div>
                            <div class="col-lg">
                                <input name="balance" class="form-control form-control-sm"
                                    placeholder=" {{ __('messages.balance') }}" type="text">
                            </div>
                    
                            <div class="col-lg">
                                <select id="group_id"  name="group_id"  class="custom-select" required="">
                                    <option  >{{ __('messages.select_role_for_selection') }}</option>
                                    @foreach ($groups as $group)
                                    <option value="{{$group["group_id"]}}">{{$group["group_name"]}}</option>
                                    @endforeach
                                 </select>
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
