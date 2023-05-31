@extends('layouts.Admin.app')
@section('content')

<style type="text/css">
  .grayclass {color: gray}
  .blueclass {color:blue;}
</style>

 <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Host Profiles</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Host</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{url('/admin/host-profiles')}}" class="btn btn-sm btn-neutral">Host List</a>
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
                  <h3 class="mb-0">Add/Edit profile </h3>
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
              <form  enctype="multipart/form-data" autocomplete="off" action="" method="POST">
                 @csrf
                <div class="pl-lg-4">
                  <div class="row">


                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" name="username" class="form-control" placeholder="Username" value="{{ old('username', $profile->username) }}" required readonly="readonly">
                      </div>
                    </div> 

                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="text" readonly="" id="input-email" name="email" class="form-control" placeholder="email@example.com" maxlength="256" value="{{ old('email', $profile->email) }}" required>
                      </div>
                    </div>  


                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-password">Password</label>
                        <input type="text" id="input-last-name" name="password" class="form-control" placeholder="Password" maxlength="256" value="{{ old('text_password', $profile->text_password) }}" required>
                      </div>
                    </div>


                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-mobile_no">Mobile</label>
                        <input type="text" id="input-mobile_no" name="mobile_no" class="form-control" placeholder="Mobile" value="{{ old('mobile_no', $profile->mobile_no) }}">
                      </div>
                    </div> 
                </div>
               
                  <div class="row">
                     <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-date_of_birth">Host Age</label>
                         <select class="form-control" name="date_of_birth">
                            <option value="18" <?php if($profile->date_of_birth==18){ echo "selected";}?>>18</option>
                            <option value="19" <?php if($profile->date_of_birth==19){ echo "selected";}?>>19</option>
                            <option value="20" <?php if($profile->date_of_birth==20){ echo "selected";}?>>20</option>                                        
                            <option value="21" <?php if($profile->date_of_birth==21){ echo "selected";}?>>21</option>
                            <option value="22" <?php if($profile->date_of_birth==22){ echo "selected";}?>>22</option>
                            <option value="23" <?php if($profile->date_of_birth==23){ echo "selected";}?>>23</option>
                            <option value="24" <?php if($profile->date_of_birth==14){ echo "selected";}?>>24</option>
                            <option value="25" <?php if($profile->date_of_birth==25){ echo "selected";}?>>25</option>
                            <option value="26" <?php if($profile->date_of_birth==26){ echo "selected";}?>>26</option>
                            <option value="27" <?php if($profile->date_of_birth==27){ echo "selected";}?>>27</option>
                            <option value="28" <?php if($profile->date_of_birth==28){ echo "selected";}?>>28</option>
                            <option value="29" <?php if($profile->date_of_birth==29){ echo "selected";}?>>29</option>
                            <option value="30" <?php if($profile->date_of_birth==30){ echo "selected";}?>>30</option>
                        </select>
                      </div>
                    </div>  


                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Location</label>
                        <select class="form-control" name="city">
                            <option value="{{ old('city', $profile->city) }}" selected="selected">{{ old('city', $profile->city) }}</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Karnataka">Karnataka</option>                                        
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>       
                            <option value="ArunachalPradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>                                 
                            <option value="Haryana">Haryana</option>
                            <option value="HimachalPradesh">Himachal Pradesh</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="MadhyaPradesh">Madhya Pradesh</option>
                            <option value="Mumbai">Mumbai</option> 
                            <option value="NewDelhi">New Delhi</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="TamilNadu">Tamil Nadu</option>
                            <option value="Kerala">Kerala</option>                                        
                            <option value="AndhraPradesh">Andhra Pradesh</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="TripuraAgartala">Tripura Agartala</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Hyderabad">Hyderabad</option>
                            <option value="UttarPradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="Bhopal">Bhopal</option>
                            <option value="WestBengal">West Bengal</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="DadraandNagarHaveli">Dadra and Nagar Haveli</option>
                            <option value="JammuAndKashmir">Jammu and Kashmir</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="NULL">--Select Location--</option>
                        </select>
                      </div>
                    </div>   


                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Choose Agency</label>
                        <select name="agency_id" class="form-control" id="agency_id">
                            <option value="1">--- Select Agency ---</option>
                            @foreach ($agenciesList as $agencyget)
                            <option value="{{$agencyget->id}}" <?php if($profile->agency_id==$agencyget->id){ echo "selected";}?>>{{$agencyget->username}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-image_profile">Select Images</label>
                        <input type="file" id="input-image_profile" name="image_profile[]" class="form-control" placeholder="Select Image" value="" multiple>
                      </div>
                    </div>
                  </div>

                <div class="row">
                  <div class="col-lg-6">
                      @foreach($languagesList as $languageget)
                         <?php $host_lenguages = explode(',', $profile->host_lenguages); 
                              if (in_array($languageget->id, $host_lenguages)) {
                                $checkbox=1;
                              } else {
                                 $checkbox=0;
                              }
                          ?>
                        <label for="{{$languageget->id}}">
                        <input type="checkbox" value="{{ $languageget->id }}" <?php if($checkbox==1){echo "checked";} ?> data-lang="{{$languageget}}"  name="languages[]" id="{{$languageget->id}}" class="language">{{$languageget->language}}
                        </label>
                        @endforeach  
                  </div>

                  <div class="col-lg-3"> 
                   <div class="form-group">
                      <label class="form-control-label" for="input-image_profile">About Us</label>
                      <textarea class="form-control" name="about">{{ old('about', $profile->about) }}</textarea>
                   </div> 
                  </div>

                   <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-rating">Host Rating</label>
                         <select class="form-control" name="rating">
                            <option value="3.8" <?php if($profile->rating=="3.8"){ echo "selected";}?>>3.8</option>
                            <option value="4.0" <?php if($profile->rating=="4"){ echo "selected";}?>>4.0</option>
                            <option value="4.5" <?php if($profile->rating=="4.5"){ echo "selected";}?>>4.5</option>
                            <option value="5.0" <?php if($profile->rating=="5"){ echo "selected";}?>>5.0</option>
                            <option value="3.5" <?php if($profile->rating=="3.5"){ echo "selected";}?>>3.5</option>                           
                        </select>
                      </div>
                    </div>
                </div>


                 <div class="row">
                  <div class="col-lg-6"> 
                    <div class="form-group">

                    @foreach ($profileImagesList as $imagelist)  
                     <?php $assestId = $imagelist->id; ?> 
                    <div class="col-lg-1" id="imageDiv{{$imagelist->id}}">
                      <div style="position:relative; margin-bottom: 17px;">
                        <a onclick="imageDeletebyAdmin(<?php echo $assestId; ?>)" style="right: -2px; top: 5px; position: relative;">
                          <span class="fas fa-times-circle" title="select profile as pic"></span>
                        </a>
                        <a onclick="setProfileImage(<?php echo $assestId; ?>)" style="left:29px; bottom:-15px; position: absolute;">
                        <?php $is_profile_image = $imagelist->is_profile_image;
                            if($imagelist->is_profile_image==1){
                              $classProfile = 'blueclass';
                            } else {
                              $classProfile = 'grayclass';
                            }
                         ?> 
                        <span id="setProfileImageSpan<?php echo $assestId; ?>" class="fas fa-check-circle setProfileImage <?php echo $classProfile; ?>"></span>
                        </a>
                        <img src="{{$imagelist->media_url}}" alt="Profile Image0" width="70">
                     </div>
                   </div>
                      @endforeach

                       
                      </div>
                  </div>

                  <div class="col-lg-6"> 
                    <div class="form-group">                       
                         @foreach($countryList as $countryget)   
                         <?php $host_country = explode(',', $profile->host_country); 
                              if (in_array($countryget->id, $host_country)) {
                                $checkbox=1;
                              } else {
                                 $checkbox=0;
                              }
                          ?>                     
                          <label for="country{{$countryget->id}}">
                          <input type="checkbox" value="{{ $countryget->id }}" name="country[]"  <?php if($checkbox==1){echo "checked";} ?>  data-lang="{{$countryget}}" name="country[]"  id="country{{$countryget->id}}" class="country"> {{$countryget->country}}
                          </label>
                        @endforeach
                      </div>
                  </div>
                </div>


                 <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4"> 
                      <a href="{{url('/admin/host-profiles')}}" class="btn btn-round btn-secondary">Cancel</a>
                      <input type="submit" name="Update" value="Update"  class="btn btn-round btn-primary">                      
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

  function setProfileImage(id) {     
      $.ajax({
          type: 'GET',
          url: "{{url('admin/set-profile-image')}}",
          data: {
              id: id
          },
          success: function(data) {
               var x = document.getElementsByClassName("setProfileImage");
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].style.color = "gray";
                }
                document.getElementById("setProfileImageSpan" + id).style.color = "blue";
            }
      });
  }

  function imageDeletebyAdmin(id) {       
        $.ajax({
            type: 'GET',
            url: "{{url('admin/delete-profile-image')}}",
            data: {
                id: id
            },
            success: function(data) {
               document.getElementById("imageDiv" + id).remove();             
            }
        });
    }
</script>

@endsection