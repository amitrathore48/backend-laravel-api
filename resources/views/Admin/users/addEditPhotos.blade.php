@extends('layouts.Admin.app')
@section('content')

 <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Update Photos</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Photos</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <!--   <a href="{{url('/admin/host-profiles')}}" class="btn btn-sm btn-neutral">Host Photo updates</a> -->
              <!-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
         <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Update Photos </h3>
                </div>
              </div>
            </div>
              <div class="col-md-8">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                   {!! \Session::get('success') !!}
                </div>
                @endif
                 @if (\Session::has('error'))
                <div class="alert alert-danger">
                    {!! \Session::get('error') !!}
                </div>
                @endif
             </div>
            <div class="card-body">
             <form role="form" method="POST" action="{{url('admin/update-profile-photos')}}" enctype="multipart/form-data" autocomplete="off">
                 @csrf            
                <div class="pl-lg-4">
                  <div class="row">
                  
                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Ban Female Profile ID</label>
                        <input type="text" id="input-ban_profile_id" name="ban_profile_id" class="form-control" placeholder="ban profile id" value="" required>
                      </div>
                    </div> 


                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-mobile_no">New Female Profile ID</label>
                        <input type="text" id="input-new_profile_id" name="new_profile_id" class="form-control" placeholder="new profile id" value="">
                      </div>
                    </div>  
                  </div>


                 <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4"> 
                      <a href="{{url('/admin/host-profiles')}}" class="btn btn-round btn-secondary">Cancel</a>
                      <input type="submit" name="submit"  class="btn btn-round btn-primary">                      
                    </div>
                    <div class="col-lg-4"></div>
                  </div>


                </div>


             
               </form>
            </div>
          </div>
        </div>



<script>
 $(document).ready(function(){
     $('.alert-success').fadeIn('fast').delay(4000).fadeOut('fast');
     $('.alert-danger').fadeIn('fast').delay(4000).fadeOut('fast');
  });
</script>

@endsection