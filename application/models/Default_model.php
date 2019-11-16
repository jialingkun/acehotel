<?php
class Default_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	//GET DATABASE
	public function get_data_admin($filter = NULL){
		$this->db->select('*');
		$this->db->from('admin');
		if ($filter == NULL){
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->where($filter);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function get_data_owner($filter = NULL){
		$this->db->select('*');
		$this->db->from('owner');
		if ($filter == NULL){
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->where($filter);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function get_data_hotel($filter = NULL){
		$this->db->select('*');
		$this->db->from('hotel');
		$this->db->join('owner', 'hotel.username_owner = owner.username_owner', 'left');
		if ($filter == NULL){
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->where($filter);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function get_data_receptionist($filter = NULL){
		$this->db->select('*');
		$this->db->from('receptionist');
		$this->db->join('hotel', 'receptionist.id_hotel = hotel.id_hotel', 'left');
		if ($filter == NULL){
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->where($filter);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function get_data_kamar($filter = NULL){
		$this->db->select('*');
		$this->db->from('kamar');
		$this->db->join('hotel', 'kamar.id_hotel = hotel.id_hotel', 'left');
		if ($filter == NULL){
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->where($filter);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function get_data_order($filter = NULL){
		$this->db->select('*');
		$this->db->from('order');
		if ($filter == NULL){
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->where($filter);
			$query = $this->db->get();
			return $query->result_array();
		}
	}


	//INSERT DATABASE
	public function insert_admin($data){
		$this->db->insert('admin', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function insert_owner($data){
		$this->db->insert('owner', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function insert_hotel($data){
		$this->db->insert('hotel', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function insert_receptionist($data){
		$this->db->insert('receptionist', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function insert_kamar($data){
		$this->db->insert('kamar', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function insert_order($data){
		$this->db->insert('order', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}




	//UPDATE DATABASE
	public function update_admin($id, $data){
		$this->db->where('username_admin', $id);
		$this->db->update('admin', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function update_owner($id, $data){
		$this->db->where('username_owner', $id);
		$this->db->update('owner', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function update_hotel($id, $data){
		$this->db->where('id_hotel', $id);
		$this->db->update('hotel', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function update_receptionist($id, $data){
		$this->db->where('username_receptionist', $id);
		$this->db->update('receptionist', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function update_kamar($id, $data){
		$this->db->where('id_kamar', $id);
		$this->db->update('kamar', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function update_order($id, $data){
		$this->db->where('id_order', $id);
		$this->db->update('order', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}


	//DELETE DATABASE
	public function delete_admin($id){
		$this->db->where('username_admin', $id);
		$this->db->delete('admin');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function delete_owner($id){
		$this->db->where('username_owner', $id);
		$this->db->delete('owner');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function delete_hotel($id){
		$this->db->where('id_hotel', $id);
		$this->db->delete('hotel');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function delete_receptionist($id){
		$this->db->where('username_receptionist', $id);
		$this->db->delete('receptionist');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function delete_kamar($id){
		$this->db->where('id_kamar', $id);
		$this->db->delete('kamar');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function delete_order($id){
		$this->db->where('id_order', $id);
		$this->db->delete('order');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}
	
}