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
                  <li class="breadcrumb-item"><a href="{{url('/admin/host-profiles')}}">Host List</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Gift History</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{url('/admin/host-profiles')}}" class="btn btn-sm btn-neutral">Back</a>

              <a href="{{url('/admin/call-history', [$profile->id])}}" class="btn btn-sm btn-neutral">Call History</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
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


            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0"><i class='fa fa-gift' style='font-size:20px;'></i> Gift History of  {{  $profile->username }}</h3>
            </div>

            <div class="card-body">
             <form class="form-inline" id="search" onSubmit="return false">
              <div class="col-lg-4">  
                <div class="form-group"><b>Profile ID:</b> &nbsp;  {{  $profile->id }} </div>
                <div class="form-group"><b>Username:</b> &nbsp; {{  $profile->username }} </div>
                <div class="form-group"><b>Email ID:</b> &nbsp; {{  $profile->email }} </div>
               </div>

              <div class="col-lg-4">  
                <div class="form-group"> <b>Current Week Minutes:</b> &nbsp;  {{  $totalcurrntWeek }} </div> 
                <div class="form-group"> <b>Last Week Minutes:</b>  &nbsp; {{  $totalLastWeek }} </div> 
              </div>

              <div class="col-lg-4">  
                <div class="form-group"> <b>Current Week Gift Coins:</b> &nbsp;  {{  $totalGiftCoins->total_point }} </div> 
                <div class="form-group"> <b>Last Week Gift Coins:</b>  &nbsp; {{  $totallastWeekgiftCoins->total_point }} </div> 
              </div>
              
            </form>
            </div>


            <div class="card-body">
            <!-- Light table -->
            <div class="table-responsive">
              <div id="usersjtable"></div>
            </div>
           </div>
        </div>
      </div>
    </div>

<script>
 $(document).ready(function(){
     $('.alert-success').fadeIn('fast').delay(4000).fadeOut('fast');
     $('.alert-danger').fadeIn('fast').delay(4000).fadeOut('fast');
  });
</script>
<script type="text/javascript">        
     $(document).ready(function () {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
        });
        $('#usersjtable').jtable({
                title: 'Library List',
                paging: true, //Enable paging
                pageSize: 10, //Set page size (default: 10)
                sorting: true, //Enable sorting
                defaultSorting: 'Name ASC', //Set default sorting
                actions: {
                    listAction: "{{ url('admin/ajaxgifthistory', [$profile->id]) }}",
                },
                fields: {
              sno: { 
                    key: true,
                    create: false,
                    edit: false,
                    list: true,
                    sorting: false,                
                    title: 'S.no',
                    width: '3%'
                },
                id: {
                        title: 'ID',
                        width: '5%',
                    },
                credit: {
                        title: 'Received Gift Coins',
                        width: '5%',
                    },                 
                 image_url: {
                    title: 'Image',
                    width: '7%',
                    sorting: false, //This column is not sortable!
                    display:function(data)
                    {
                      if(data.record.image_url !=''){
                       return "<label ><img src='"+data.record.image_url+"' style='width:60px;'></label>";
                      } 
                    }
                }, 
                created_at: {
                    title: 'Created At',
                    width: '10%',
                    sorting: false, //This column is not sortable!                   
                  },
                                          
               /* Action: {
                    title: 'Action',
                    width: '10%',
                    sorting: false, //This column is not sortable!
                    display:function(data)
                    {                             
                       return "<a title='Delete User' class='deletecallHistory'   data-id1='1' data-id='"+data.record.id+"' href='javascript:void(0)'><i class='fa fa-trash-o' style='font-size:20px;'></i></a> &nbsp;&nbsp;";
                       
                    }
                  },*/ 
                }
            });
     
            //Load Category list from server
            $('#usersjtable').jtable('load');
            $('#filter').click(function (e) {
                e.preventDefault();
                $('#usersjtable').jtable('load', {
                    keyword: {{  $profile->id }},
                    status: $('#status').val(),
                    is_company_id: $('#is_company_id').val(),
                    
                    
                });
            });             
              $('#reset_button').click(function (e) {
               $('#usersjtable').jtable('load');
               $('#search')[0].reset();
           });             
            
        }); 
      </script>

@endsection