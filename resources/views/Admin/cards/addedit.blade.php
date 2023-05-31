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
                  <li class="breadcrumb-item"><a href="#">Host Profiles</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Host</li>
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
           <!--  <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Add/Edit profile </h3>
                </div>
              </div>
            </div> -->
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
              <form  enctype="multipart/form-data" autocomplete="off" action="{{url('admin/add-update-host')}}" method="POST">
                 @csrf            
                <div class="pl-lg-4">
                  <div class="row">
                  
                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" name="username" class="form-control" placeholder="Username" value="" required>
                      </div>
                    </div> 


                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-mobile_no">Mobile</label>
                        <input type="text" id="input-mobile_no" name="mobile_no" class="form-control" placeholder="Mobile" value="">
                      </div>
                    </div>   


                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-date_of_birth">Host Age</label>
                         <select class="form-control" name="date_of_birth">
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20" selected="selected">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                        </select>
                      </div>
                    </div>  

                     <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-image_profile">Select Images</label>
                        <input type="file" id="input-image_profile" name="image_profile[]" class="form-control" placeholder="Select Image" value="" multiple required>
                      </div>
                    </div> 
                   
                  </div>



                  <div class="row">
                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Location</label>
                        <select class="form-control" name="city">
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
                            <option value="{{$agencyget->id}}" >{{$agencyget->username}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                   

                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-interested_topic">Interested Topics</label>
                         <select class="form-control" name="interested_topic">
                            <option value="Privacy Secret, Travel, Host Gossip, Desire, Hangout">Privacy Secret, Travel, Host Gossip etc.</option>
                            <option value="Video chat, Emotional topics, Dating, Privacy secret, Travel">Video chat, Emotional topics, Dating etc.</option>
                            <option value="Hot gossip, Video chat">Hot gossip, Video chat</option>
                            <option value="Love experience, Hot gossip">Love experience, Hot gossip</option>
                            <option value="Emotional topics, Love experience, Hang out, Travel, Video chat">Emotional topics, Love experience etc.</option>
                            <option value="Privacy secret, Emotional topics, Desire, Love experience">Privacy secret, Emotional topics, Desire etc.</option>
                            <option value="Dating, Privacy secret, Hot gossip, Love experience, Emotional topics">Dating, Privacy secret, Hot gossip etc.</option>
                        </select>
                      </div>
                    </div> 


                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-i_want">I Want</label>
                         <select class="form-control" name="i_want">
                            <option value="Long-term dating">Long-term dating</option>
                            <option value="Video chat">Video chat</option>
                            <option value="Call me">Call me</option>
                            <option value="New friends">New friends</option>
                            <option value="Cam chat">Cam chat</option>                           
                        </select>
                      </div>
                    </div> 
                    
                  </div>



                  <div class="row">
                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-i_want_you_are">I Want you're</label>
                         <select class="form-control" name="i_want_you_are">
                            <option value="Handsome, Smart, Easy-going">Handsome, Smart, Easy-going</option>
                            <option value="Humor, Generous, Easy-going">Humor, Generous, Easy-going</option>
                            <option value="Handsome, Loving, Caring">Handsome, Loving, Caring</option>
                            <option value="Generous, Rich, Ative">Generous, Rich, Ative</option>
                            <option value="Active, Humor, Smart, Easy-going">Active, Humor, Smart, Easy-going</option>
                            <option value="Romantic, Humor, Handsome">Romantic, Humor, Handsome</option>
                            <option value="Loving, Caring">Loving, Caring</option>
                        </select>
                      </div>
                    </div> 


                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-describe_myself">Describe myself</label>
                         <select class="form-control" name="describe_myself">
                            <option value="Hot, Romantic, Active">Hot, Romantic, Active</option>
                            <option value="Beautyfull, Loving, Caring">Beautybull, Loving, Caring</option>
                            <option value="Humor, Romantic, Active">Humor, Romantic, Active</option>
                            <option value="Love experience, Hot gossip">Love experience, Hot gossip</option>
                            <option value="Active, Humor, Loving, Easy-going">Active, Humor, Loving, Easy-going</option>
                            <option value="Pretty, Independent, Active">Pretty, Independent, Active</option>
                            <option value="Pretty, Humor, Active">Pretty, Humor, Active</option>
                            <option value="Generous, Loving, Easy-going">Generous, Loving, Easy-going</option>
                        </select>
                      </div>
                    </div> 


                     <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-body_type">Body Type</label>
                         <select class="form-control" name="body_type">
                            <option value="Slim">Slim</option>
                            <option value="Athletic">Athletic</option>
                            <option value="Average">Average</option>
                            <option value="Muscular">Muscular</option>
                            <option value="Curvy">Curvy</option>
                            <option value="A little extra">A little extra</option>
                            <option value="Secret">Secret</option>
                            <option value="Fit">Fit</option>
                        </select>
                      </div>
                    </div> 

                    <div class="col-lg-3">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-education">Education</label>
                         <select class="form-control" name="education">
                            <option value="High School">High School</option>
                            <option value="Some College">Some College</option>
                            <option value="Bachelors Degree">Bachelors Degree</option>
                            <option value="Specialization">Specialization</option>
                            <option value="Certification">Certification</option>                           
                        </select>
                      </div>
                    </div> 
                   </div> 


                   <div class="row">

                    <div class="col-lg-2">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-rating">Host Rating</label>
                         <select class="form-control" name="rating">
                            <option value="3.8">3.8</option>
                            <option value="4.0">4.0</option>
                            <option value="4.5" selected="selected">4.5</option>
                            <option value="5.0">5.0</option>
                            <option value="3.5">3.5</option>                           
                        </select>
                      </div>
                    </div>  

                    <div class="col-lg-2">                    
                      <div class="form-group">
                        <label class="form-control-label" for="input-date_of_birth">Profession</label>
                         <select class="form-control" name="profession">
                            <option value="Freelancer">Freelancer</option>
                            <option value="Student">Student</option>
                            <option value="Clerk">Clerk</option>
                            <option value="Beautician">Beautician</option>
                            <option value="Modeling">Modeling </option>                           
                        </select>
                      </div>
                    </div> 

                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-image_profile">About Us</label>
                        <textarea class="form-control" name="about"></textarea>
                      </div>
                    </div>

                    <div class="col-lg-5">
                      <div class="form-group">                       
                        @foreach($languagesList as $languageget)
                        <label for="{{$languageget->id}}">
                        <input type="checkbox" value="{{ $languageget->id }}"  name="languages[]" data-lang="{{$languageget}}" id="{{$languageget->id}}" class="language">{{$languageget->language}}
                        </label>
                        @endforeach
                      </div>
                    </div>
                   </div>



                  <div class="row">
                    <div class="col-lg-5">
                      <div class="form-group">                       
                        @foreach($countryList as $countryget)
                        <label for="country{{$countryget->id}}">
                        <input type="checkbox" value="{{ $countryget->id }}" name="country[]" data-lang="{{$countryget}}" id="country{{$countryget->id}}" class="country"> {{$countryget->country}}
                        </label>
                        @endforeach
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