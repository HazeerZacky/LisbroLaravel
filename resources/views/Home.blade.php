<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                    <!-- <form role="form" action="/adduser" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="UName" class="form-label">Name</label>
                            <input type="text" class="form-control" name="UName" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label for="UEmail" class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="UEmail" placeholder="Enter e-mail address">
                        </div>
                        <div class="form-group">
                            <label for="UPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="UPassword" placeholder="Enter password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Save changes</button>
                </div>
            </div>
            </form> -->
            
        </div>
        </div>
  <!-- Add Model End -->



<div class="card">
              <!-- Table part start -->
              <div class="card-body">
                <!-- Add Button Part Start -->
                <div class="row">
                            <div class="col-md-12 text-end">
                              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddClass">Add New Class</button>
                            </div>
                </div>
                <br>
                <!-- Add Button Part End -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th scope="col">User ID</th>
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
                        <td><b><center><i class='fas fa-eye-slash'></i></center></b></td> <!-- {{$use->password}} -->
                        <td>
                          <input type="hidden" id="id<?php echo $k; ?>" value="{{$use->id}}">
                          <input type="hidden" id="name<?php echo $k; ?>" value="{{$use->name}}">
                          <input type="hidden" id="email<?php echo $k; ?>" value="{{$use->email}}">
                          <input type="hidden" id="pw<?php echo $k; ?>" value="{{$use->password}}">
                            
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteUser">Delete</button>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="edit(<?php echo $k; ?>)" data-target="#EditUser">Edit</button>
                        </td>
                      </tr>
                      <?php $k++; ?>
                        <!-- Delete Conformation Model Start -->
                        <div class="modal fade" id="DeleteUser">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">&#11088;Delete Confirmation</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p><b>Are you sure you want to delete?</b></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
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
  

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>