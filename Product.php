<?php
class Product extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
	}
	function index(){
		$this->load->view('product_view');
	}

	function product_data(){
		$data=$this->product_model->product_list();
		echo json_encode($data);
	}

	function save(){
		$data=$this->product_model->save_product();
		echo json_encode($data);
	}

	function update(){
		$data=$this->product_model->update_product();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->product_model->delete_product();
		$data['status']=1;
		echo json_encode($data);
	}
//Employee
	function emp_home(){
		$this->load->view('emp_view');
	}
	function emp_save(){
		$this->load->library('form_validation');
		  $this->form_validation->set_rules('product_code', 'Name', 'required');
		  $this->form_validation->set_rules('product_name', 'Department', 'required|valid_email');
		  $this->form_validation->set_rules('price', 'Price', 'required');
		  
		  if($this->form_validation->run())
		  {
		   $array = array(
		    'success' => '<div class="alert alert-success">Thank you for Contact Us</div>'
		   );
		  }
		  else
		  {
		$data=$this->product_model->save_emp();
		echo json_encode($data);
	}
	}
	function employee_data(){
		$data=$this->product_model->employee_list();
		
		echo json_encode($data);
	}
	function emp_delete(){
		$data=$this->product_model->delete_employee();
		$data['status']=1;
		echo json_encode($data);
	}
	function emp_update(){
		$data=$this->product_model->update_employee();
		echo json_encode($data);
	}
	public function itemForm()
   {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
           echo json_encode(['success'=>'Record added successfully.']);
        }
    }

}