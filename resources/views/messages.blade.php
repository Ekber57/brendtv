@extends("app")
@section("content")
<div class="table-responsive">
    <table class="table table-hover mb-0">
       <tbody>
          <tr class="active">
             <td class="wd-5p">
                <div class="mg-l-15 d-flex custom-control custom-checkbox">
                   <input type="checkbox" class="custom-control-input" id="customCheck1">
                   <label class="custom-control-label" for="customCheck1"></label>
                </div>
             </td>
             <td class="wd-5p"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star wd-16"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></a></td>
             <td class="wd-15p">Peter, me (3)</td>
             <td><a href="mailbox-message.html"><span class="badge badge-outline-warning mr-2">Important</span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit Lorem ipsum dolor...</a></td>
             <td class="wd-15p">
                <p class="mb-0 tx-10 tx-gray-500">01-02-2019, 11:46AM</p>
             </td>
          </tr>

      
       </tbody>
    </table>
 </div>
 </div>
@endsection