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
                  <li class="breadcrumb-item active" aria-current="page">Host List</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
             
             <!--  <a href="#" class="btn btn-sm btn-neutral changeUserStatus">Filters</a> -->
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
              <h3 class="mb-0">Host list</h3>
            </div>

            <div class="card-body">
             <form class="form-inline" id="search" onSubmit="return false">
              <div class="col-lg-2">  
                <div class="form-group">
                    <input type="text" class="form-control" id="keyword" placeholder="Search Profile">
                </div>
               </div>

              <div class="col-lg-2">  
              <div class="form-group"> 
                <select id="status" class="form-control mr-2">
                        <option value="">--Filter Status--</option>
                        <option value="1">Active </option>
                        <option value="0">Inactive </option>
                 </select>
                </div> 
              </div>
                &nbsp; &nbsp;
               <div class="col-lg-3"> 
                <div class="form-group">
                    <button type="submit" id="filter" class="btn btn-info btn-fill mr-2">Filter</button>
                    <button id="reset_button" class="btn btn-info btn-fill mr-2">Reset</button>
                </div>
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
     // alert("check");
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
        });
        $('#usersjtable').jtable({
                title: 'User List',
                paging: true, //Enable paging
                pageSize: 10, //Set page size (default: 10)
                sorting: true, //Enable sorting
                defaultSorting: 'Name ASC', //Set default sorting
                actions: {
                    listAction: "{{ route('admin.host.userlist') }}",
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
                        title: 'User ID',
                        width: '5%',
                    }, 
              card_no: {
                        title: 'Card No.',
                        width: '10%',
                    },
              first_name: {
                        title: 'First Name',
                        width: '10%',
                    },

               last_name: {
                        title: 'Last Name',
                        width: '10%',
                    },

                /* 
              image_url: {
                    title: 'Image',
                    width: '7%',
                    sorting: false, //This column is not sortable!
                    display:function(data)
                    {
                      if(data.record.image_url !=''){
                       return "<label ><img src='"+data.record.image_url+"' style='width:60px; height:60px; border-radius: 50%;'></label>";
                      } 
                    }
              },  
*/
              email: {
                        title: 'Email',
                        width: '10%',
                    },
              text_password: {
                        title: 'Password',
                        width: '10%',
                    },
              mobile: {
                        title: 'Mobile',
                        width: '10%',
                    },
               status: {
                    title: 'Status',
                    width: '10%',
                    sorting: true, //This column is not sortable!
                    display:function(data)
                    {
                      if(data.record.status == 0){
                       return "Inactive";
                      } else if (data.record.status == 1) {
                         return "Active"; 
                      }
                    }
                 },  
         
                }
            });
     
            //Load Category list from server
            $('#usersjtable').jtable('load');
            $('#filter').click(function (e) {
                e.preventDefault();
                $('#usersjtable').jtable('load', {
                    keyword: $('#keyword').val(),
                    status: $('#status').val(),
                    card_no: $('#card_no').val(),
                    
                    
                });
            });             
              $('#reset_button').click(function (e) {
               $('#usersjtable').jtable('load');
               $('#search')[0].reset();
           });             
            
        }); 
      </script>

@endsection