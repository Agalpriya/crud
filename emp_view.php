<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Employee List</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
<style>
    
   
    .error input {
    border-color: red;
    border-width: 2px;
}

.success input {
    border-color: green;
    border-width: 2px;
}

.error span {
    color: red;
}

.success span {
    color: green;
}

span.error {
    color: red;
}

i {
    font-weight: 900;
    font-family: 'Font Awesome 5 Free';
}
</style>
    </head>
<body>
<div class="container">
	<!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h1>Employee
                    <small>List</small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>
                </h1>
            </div>
            
            <table class="table table-striped" id="mydata">
               
                <tbody id="show_data">
                    
                </tbody>
            </table>
        </div>
    </div>
        
</div>

<!-- MODAL ADD -->
            <form id="firstform">
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Employee Name</label>
                            <div class="col-md-9">
                              <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Enter Employee Name">
                               <span class="error" id="name_err"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Department</label>
                            <div class="col-md-9">
                              <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Department">
                               <span class="error" id="dept_err"> </span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Age</label>
                            <div class="col-md-9">
                              <input type="text" name="price" id="price" class="form-control" placeholder="Enter Age">
                            <span class="error" id="price_err"> </span>

                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->

<form id="deleteEmpForm" method="post">
    <div class="modal fade" id="deleteEmpModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
               <strong>Are you sure to delete this record?</strong>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="deleteEmpId" id="deleteEmpId" class="form-control">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </div>
    </div>
</form>


 <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->
        <!-- MODAL EDIT -->
        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                                            <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product Code</label>
                            <div class="col-md-10">
                                <input type="hidden" name="product_code_id" id="product_code_id" class="form-control" placeholder="Product Code" readonly>
                              <input type="text" name="product_code_edit" id="product_code_edit" class="form-control" placeholder="Product Code" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product Name</label>
                            <div class="col-md-10">
                              <input type="text" name="product_name_edit" id="product_name_edit" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                              <input type="text" name="price_edit" id="price_edit" class="form-control" placeholder="Price">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->

	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//show_product();
        listEmployee();
		// Data table 
	$('#mydata').dataTable();	
	//Save
	$('#btn_save').on('click',function(){

            var product_code = $('#product_code').val();
            var product_name = $('#product_name').val();
            var price        = $('#price').val();
            if (product_code=="") {

            $('#name_err').html("required");
            }
             if (product_name=="") {
            $('#dept_err').html("required");
            }
             if (price=="") {
            $('#price_err').html("required");
            }
    else{
     $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/product/emp_save')?>",
                dataType : "JSON",
                data : {product_code:product_code , product_name:product_name, price:price},
                success: function(data){
                            
                     swal({
                      title: "Good job!",
                      text: "Successfully Submitted the form!",
                      icon: "success",
                      button: "OK!",
                    });
                    $('[name="titleName"]').val("");
                    $('[name="chapterName"]').val("");
                    $('[name="yearName"]').val("");
                    $('#Modal_Add').modal('hide');
                   // popupalert();
                    
                   listEmployee(); 
                }
            });}
           return false;
        });
//-------------------------------
  function listEmployee(){
    $.ajax({
        type  : 'ajax',
        url   : '<?php echo base_url('index.php/product/employee_data')?>',
        async : false,
        dataType : 'json',
        success : function(data){
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html += '<tr id="'+data[i].id+'">'+
                        '<td>'+data[i].emp_name+'</td>'+
                        '<td>'+data[i].emp_age+'</td>'+
                        '<td>'+data[i].emp_department+'</td>'+                              
                        '<td>'+
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit editRecord" data-id="'+data[i].id+'" data-name="'+data[i].emp_name+'" data-age="'+data[i].emp_age+'" data-department="'+data[i].emp_department+'" >Edit</a>'+' '+
                            '<a class="btn btn-danger btn-sm item_delete deleteRecord" data-id="'+data[i].id+'">Delete</a>'+
                        '</td>'+
                        '</tr>';
            }
            $('#show_data').html(html);                   
        }
    });
}
   //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var product_code = $(this).data('id');
           
            $('#Modal_Delete').modal('show');
            $('[id="product_code_delete"]').val(product_code);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
            
            var product_code = $('#product_code_delete').val();
           
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/emp_delete')?>",
                dataType : "JSON",
                data : {product_code:product_code},
                success: function(data){
                  if(data.status=1){
                     
                     
                    $('[name="product_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');

                    listEmployee();
                  }
                }
            });
            return false;
        });


//--------------



//------------------------------
//Edit & Update
 //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            /// alert("price");
            var id = $(this).data('id');
            var product_code = $(this).data('name');
            var product_name = $(this).data('department');
            var price        = $(this).data('age');
            alert(product_code);
            $('#Modal_Edit').modal('show');
            $('[name="product_code_id"]').val(id); 
            $('[name="product_code_edit"]').val(product_code);
            $('[name="product_name_edit"]').val(product_name);
            $('[name="price_edit"]').val(price);
        });

        $('#btn_update').on('click',function(){
            alert("hr");

            var id = $('#product_code_id').val();
            var product_code = $('#product_code_edit').val();
            var product_name = $('#product_name_edit').val();
            var price        = $('#price_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/emp_update')?>",
                dataType : "JSON",
                data : {id:id, product_code:product_code , product_name:product_name, price:price},
                success: function(data){
                     swal("Done!", "It was succesfully updated!", "success");                    
                     $('[name="product_code_id"]').val("");
                    $('[name="product_code_edit"]').val("");
                    $('[name="product_name_edit"]').val("");
                    $('[name="price_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    listEmployee();
                }
            });
            return false;
        });

        //----------------------------

    
//------------------------------------
		});


     

	</script>
</body>
</html>