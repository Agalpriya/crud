<?php
class Product_model extends CI_Model{

	function product_list(){
		$hasil=$this->db->get('product');
		return $hasil->result();
	}

	function save_product(){
		$data = array(
				'product_code' 	=> $this->input->post('product_code'), 
				'product_name' 	=> $this->input->post('product_name'), 
				'product_price' => $this->input->post('price'), 
			);
		$result=$this->db->insert('product',$data);
		return $result;
	}

	function update_product(){
		$product_code=$this->input->post('product_code');
		$product_name=$this->input->post('product_name');
		$product_price=$this->input->post('price');

		$this->db->set('product_name', $product_name);
		$this->db->set('product_price', $product_price);
		$this->db->where('product_code', $product_code);
		$result=$this->db->update('product');
		return $result;
	}

	function delete_product(){
		$product_code=$this->input->post('product_code');
		$this->db->where('product_code', $product_code);
		$result=$this->db->delete('product');
		return $result;
	}
	//Employee Controller
	function save_emp(){
		$data = array(
				'emp_department' 	=> $this->input->post('product_name'), 
				'emp_name' 	=> $this->input->post('product_code'), 
				'emp_age' => $this->input->post('price'), 
			);
		$result=$this->db->insert('employee',$data);
		return $result;
	}
	function employee_list(){
		$emp_result=$this->db->get('employee');
		return $emp_result->result();
	}
	function delete_employee(){
		$product_code=$this->input->post('product_code');
		$this->db->where('id', $product_code);
		$result=$this->db->delete('employee');
		return true;

	}
	function update_employee(){
		$id=$this->input->post('id');
		$product_code=$this->input->post('product_code');
		$product_name=$this->input->post('product_name');
		$product_price=$this->input->post('price');

		$this->db->set('emp_department', $product_name);
		$this->db->set('emp_age', $product_price);
		$this->db->where('id', $id);
		$result=$this->db->update('employee');
		return $result;
	}
	
}