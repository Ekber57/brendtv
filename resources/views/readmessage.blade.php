@extends("app")
@section("content")
<div class="card-body">

    <div class="">
       <div class="row">
          <div class="col-md-6 toolbar-left">
             <!--Sender Information-->
             <div class="d-flex">
                <span class="mg-r-10">
                <img src="assets/images/users-face/1.png" class="img-fluid wd-40 rounded-circle" alt="">
                </span>
                <div class="text-left">
                   <div class="tx-semibold">Ruhul Hasan</div>
                   <span class="tx-12 tx-gray-500">example@mail.com</span>
                </div>
             </div>
          </div>
          <div class="col-md-6 text-md-right hidden-xs">
             <!--Details Information-->
             <p class="mg-0"><small class="tx-gray-500">Monday 12, March 2019</small></p>
             <a href="">
             <i class="fa fa-link"></i>
             <strong>Your-files.zip</strong>
             </a>
          </div>
       </div>
    </div>
    <div class="row mg-t-20 mg-b-15">
       <div class="col-md-12">
          <div class="mg-b-20 bd-b">
             Hey Lisa!
             <p> Lorem ipsum dolor sit amet, ullamco laboris nisi ut aliquip ex ea commodo consequat.<strong>Duis aute irure dolorculpa qui officia deserunt mollit anim id est laborum.</strong></p>
             <p><em>Sed ut perspiciatis unde omnis ugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</em></p>
             <blockquote class="blockquote tx-15">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur dolor sit amet, consectetur adipiscing elit. Integer posuere erat a integer posuere erat a  ante.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
             </blockquote>
             <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non <a href="#">numquam</a> eius modi tempora incidunt ut labore et <a href="">dolore magnam </a>aliquam quaerat voluptatem. Quis autem vel eum iure reprehenderit qui pariatur?</p>
             <address>
                <p class="mg-0">Regards,</p>
                <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">P:</abbr> (123) 456-7890
             </address>
          </div>
       </div>
    
    </div>
 </div>
 @endsection