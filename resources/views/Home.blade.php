<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('plugins')}}/bootstrap/css/bootstrap.min.css" >
    <script src="{{asset('plugins')}}/bootstrap/js/bootstrap.bundle.min.js" ></script>

    <!-- jquery -->
    <script src="{{asset('plugins')}}/jquery/jquery.min.js"></script>

    <!-- toastr -->
  	<link rel="stylesheet" type="text/css" href="{{asset('plugins')}}/toastr/toastr.min.css">
    <script src="{{asset('plugins')}}/toastr/toastr.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <title>Test</title>
</head>

<body>

  <!-- Model Start   -->
  <!-- Add Model Start -->
  <div class="modal fade" id="AddClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">&#9776; User Add Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <!-- form start -->
                    <form role="form" action="/adduser" method="post">
                    @csrf
                        <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="UName" id="exampleInputName">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="UEmail" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="UPassword" id="exampleInputPassword1">
                        </div>
                        </div>
                                <div class="modal-footer">
                                    
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </div> 
                            </div>
                    </form>
            
        </div>
        </div>
  <!-- Add Model End -->

  <!-- Edit Model Start -->
  <div class="modal fade" id="EditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">&#9776; Users Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">
            <!-- form start -->
                    <form role="form" action="/edituser" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">ID</label>
                            <input type="text" class="form-control" id="EUID" name="EUID" placeholder="Enter class name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">Name</label>
                            <input type="text" class="form-control" id="EUName" name="EUName" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="EUEmail" name="EUEmail" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="EUPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="EUPassword" name="EUPassword" placeholder="Enter password">
                        </div>
              </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div> 
                            </div>
                    </form>
        </div>
        </div>

        <!-- Edit Model Get Function Start-->
        <script>
          function edit(i) {
            var id = document.getElementById('id' +i).value;
            var name = document.getElementById('name' +i).value;
            var email = document.getElementById('email' +i).value;
            var pw = document.getElementById('pw' +i).value;


            document.getElementById('EUID').value = id;
            document.getElementById('EUName').value = name;
            document.getElementById('EUEmail').value = email;
            document.getElementById('EUPassword').value = pw;
          }
        </script>
        <!-- Edit Model Get Function End-->

  <!-- Edit Model End -->



<div class="card">
              <!-- Table part start -->
              <div class="card-body">
                <!-- Add Button Part Start -->
                <div class="row">
                            <div class="col-md-12 text-end">
                              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddClass">Add New Class</button>
                              <a href="/logout" class="btn btn-dark">Logout</a>
                            </div>
                </div>
                <br>
                <!-- Add Button Part End -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th style="width:  12%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $k = 0; ?> <!-- identify row number -->
                      @foreach($users as $use)
                      <tr>
                        <td>{{$use->id}}</td>
                        <td>{{$use->name}}</td>
                        <td>{{$use->email}}</td>
                        <td><b>Hiddne</b></td> 
                        <td>
                          <input type="hidden" id="id<?php echo $k; ?>" value="{{$use->id}}">
                          <input type="hidden" id="name<?php echo $k; ?>" value="{{$use->name}}">
                          <input type="hidden" id="email<?php echo $k; ?>" value="{{$use->email}}">
                          <input type="hidden" id="pw<?php echo $k; ?>" value="{{$use->password}}">
                            
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#DeleteUser">Delete</button>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" onclick="edit(<?php echo $k; ?>)" data-bs-target="#EditUser">Edit</button>
                        </td>
                      </tr>
                      <?php $k++; ?>
                        <!-- Delete Conformation Model Start -->
                        
                        
                        <div class="modal fade" id="DeleteUser">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">&#11088;Delete Confirmation</h4>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p><b>Are you sure you want to delete?</b></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">No</button>
                                      <a  href="{{route('deleteuser',$use->id)}}" class="btn btn-danger btn-sm">Yes</a> <!-- $cls->id = passing variable-->
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                          <!-- Delete Conformation Model End-->
                      @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th style="width:  12%">Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
  </div>
  

    <!-- Alert Part Start -->

    @if(Session::has('message'))
  <script>
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    </script>
    @endif
        @if($errors->any())
          @foreach($errors->all()  as $error)
          <script>
            toastr.info("{{$error}}");
          </script>
          @endforeach
        @endif
<!-- Alert Part End -->

    



</body>

</html>