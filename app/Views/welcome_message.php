<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <style>
    a:hover{
            text-decoration:none;
          }
  </style>
</head>
<body>

<!-- student Modal -->
<div class="modal fade" id="studentModal" url="<?= base_url('/store')?>" tabindex="-1" role="dialog" aria-labelledby="StudentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Full Name</label> <span id="error_name" class="text-danger ms-3"></span>
            <input type="text" class="form-control name" placeholder=" Enter your Full Name">
        </div>
        <div class="form-group">
            <label>Email</label> <span id="error_email" class="text-danger ms-3"></span>
            <input type="text" class="form-control email" placeholder=" Enter your Email ">
        </div>
        <div class="form-group">
            <label>Phone</label> <span id="error_phone" class="text-danger ms-3"></span>
            <input type="text" class="form-control phone" placeholder=" Enter your Phone Number">
        </div>
        <div class="form-group">
            <label>Course</label> <span id="error_course" class="text-danger ms-3"></span>
            <input type="text" class="form-control course" placeholder="Enter Your Course">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary ajaxstudent-save">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit student Modal -->
<div class="modal fade" id="editstudentModal" url="<?= base_url('/store')?>" tabindex="-1" role="dialog" aria-labelledby="StudentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Full Name</label> <span id="error_name" class="text-danger ms-3"></span>
            <input type="text" id="edit_name" class="form-control name" placeholder=" Enter your Full Name">
            <input type="hidden" id="edit_id" class="form-control stud_id" placeholder=" hidden id">
        </div>
        <div class="form-group">
            <label>Email</label> <span id="error_email" class="text-danger ms-3"></span>
            <input type="text" id="edit_email" class="form-control email" placeholder=" Enter your Email ">
        </div>
        <div class="form-group">
            <label>Phone</label> <span id="error_phone" class="text-danger ms-3"></span>
            <input type="text" id="edit_phone" class="form-control phone" placeholder=" Enter your Phone Number">
        </div>
        <div class="form-group">
            <label>Course</label> <span id="error_course" class="text-danger ms-3"></span>
            <input type="text" id="edit_course" class="form-control course" placeholder="Enter Your Course">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary ajaxstudent-update">update</button>
      </div>
    </div>
  </div>
</div>

    <div class="container mt-4">
        <div class="row">
            <h2 class="font-weight-bold">AJAX CRUD OPERATION</h2>
            <input type="hidden" id="fetch-data" value="<?= base_url('/fetch')?>">
            <input type="hidden" id="remove-data" value="<?= base_url('/removedata')?>">
            <input type="hidden" id="edit-data" value="<?= base_url('/editdata')?>">
            <input type="hidden" id="update-data" value="<?= base_url('/updatedata')?>">
        </div>
         <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Jquery Ajax CRUD - Student Data<span><a class="btn btn-primary m-2" href="<?= base_url('/imgform')?>">Img</a></span>
                        <a href="#" style="margin-left:510px" data-toggle="modal" data-target="#studentModal" class="btn btn-primary float-end">Add</a>
                    </h4>
                </div>

                <div class="card-body">
                <div id="buttons"></div>
                 <table id="myTable">
                    <thead>
                    <tr>
                        <th>S_ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="studentdata">

                    </tbody>
                
                 </table>
               </div>
            </div>

            
           
         </div>
    </div>

    
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    
      <script>
          function fetchdata(){
          $('#myTable').DataTable({
          "ajax" : $('#fetch-data').val(),
          "columns":[
            {data:'id'},
            {data:'name'},
            {data:'email'},
            {data:'phone'},
            {data:'course'},
            { data: "", render:(data,type,row)=>{ return `<button class="btn btn-warning" onclick='editdata(${row.id});'>Edit</button>`;} },
            { data: "", render:(data,type,row)=>{ return `<button class="btn btn-danger" onclick='removedata(${row.id})'>Delete</button>` ;}}
                     ],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5']
        });
          }
          fetchdata();
      </script>
    
     <script>
      $(document).ready(function(){
        $('.ajaxstudent-update').on('click',function(){
        
          data =
           { 'id' : $('#edit_id').val(),
              'name' : $('#edit_name').val(),
             'email' : $('#edit_email').val(),
             'phone' : $('#edit_phone').val(),
             'course' :$('#edit_course').val()
           };

           $.ajax({
            url:$('#update-data').val(),
            type:"post",
            data:data,
            success:function(response){
              $('#myTable').DataTable().destroy();
              fetchdata();
              console.log(response);
              $('#editstudentModal').modal('hide');
              
            }
           }); 
        });
        
      });
      

     </script>

      <script>
        function editdata(id){
         
        $.ajax({
          url:$('#edit-data').val(),
          type:'post',
          data: {'id':id},
          success:function(response){
          
          $.each(response.records,function(key,value){
            console.log(value['name']);
            $('#edit_id').val(value['id']);
            $('#edit_name').val(value['name']);
            $('#edit_email').val(value['email']);
            $('#edit_phone').val(value['phone']);
            $('#edit_course').val(value['course']);
            $('#editstudentModal').modal('show');
          });
          }
        });
        }
      </script>

    <script>
    function removedata(id){
      
      $.ajax({
        url : $('#remove-data').val(),
        type : 'post',
        data:{'id':id},
        success:function(response){
        $('#myTable').DataTable().destroy();
        fetchdata();
        }
      });
    }
    </script>

          
      <script>
        $(document).ready(function(){
            $('.ajaxstudent-save').on('click',function(){
              
                if($.trim($('.name').val()).length==0){
                   error_name ='Please Enter name';
                   $('#error_name').text(error_name);
                }else{
                    error_name ='';
                   $('#error_name').text(error_name);
                }

                if($.trim($('.email').val()).length==0){
                   error_email ='Please Enter email';
                   $('#error_email').text(error_name);
                }else{
                    error_email ='';
                   $('#error_email').text(error_email);
                }

                if($.trim($('.phone').val()).length==0){
                   error_phone ='Please Enter phone';
                   $('#error_phone').text(error_phone);
                }else{
                    error_phone ='';
                   $('#error_phone').text(error_phone);
                }

                if($.trim($('.course').val()).length==0){
                   error_course ='Please Enter course';
                   $('#error_course').text(error_course);
                }else{
                    error_course ='';
                   $('#error_course').text(error_course);
                }

                if(error_name !='' || error_email !='' || error_phone != '' || error_course != ''){
                     return false;
                }else{
                 
                   var data = {
                             'name' : $('.name').val(),
                             'email' : $('.email').val(),
                             'phone' : $('.phone').val(),
                             'course' : $('.course').val()
                    };
                     $.ajax({
                        url : $('#studentModal').attr('url'),
                        type : 'post',
                        data :data,
                        success:function(response){
                            $('#studentModal').modal('hide');
                            $('#studentModal').find('input').val('');
                            $('#myTable').DataTable().destroy();
                            fetchdata();
                        }
                     });
                }
            });
        });
      </script>

</body>
</html>
