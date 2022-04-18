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
                <h5 class="modal-title" id="exampleModalLabel">&#9776; Class Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- form start -->
                    <form role="form" action="/addclass" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">Class Name</label>
                            <input type="text" class="form-control"name="CName" placeholder="Enter class name">
                        </div>
                        <div class="form-group">
                        <label>Class Type</label>
                            <select class="form-control select2" name="CType" data-placeholder="Select an option">
                                <option value="" selected disabled hidden>(select an option)</option>
                                <option value="GCE-A/L"><b>GCE Advanced Level</b></option>
                                <option value="GCE-O/L"><b>GCE Ordinary Level</b></option>
                                <option value="SecondaryLevel"><b>Secondary Level</b></option>
                                <option value="PrimaryLevel"><b>Primary Level</b></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">Status</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline1" value="Active" name="CStatus" class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2" value="Deactive" name="CStatus" class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline2">Deactive</label>
                            </div>
                        </div>
                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary ">Save changes</button>
                                </div> 
                            </div>
                    </form>
            
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