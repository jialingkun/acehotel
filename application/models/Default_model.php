<?php
class Default_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	//GET DATABASE
	public function get_data_admin($filter = NULL){
		$this->db->select('*');
		$this->db->from('admin');
		if ($filter != NULL){
			$this->db->where($filter);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_owner($filter = NULL){
		$this->db->select('*');
		$this->db->from('owner');
		if ($filter != NULL){
			$this->db->where($filter);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_hotel($filter = NULL){
		$this->db->select('*');
		$this->db->from('hotel');
		$this->db->join('owner', 'hotel.username_owner = owner.username_owner', 'left');
		if ($filter != NULL){
			$this->db->where($filter);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_receptionist($filter = NULL){
		$this->db->select('*');
		$this->db->from('receptionist');
		$this->db->join('hotel', 'receptionist.id_hotel = hotel.id_hotel', 'left');
		if ($filter != NULL){
			$this->db->where($filter);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_kamar($filter = NULL){
		$this->db->select('kamar.*, hotel.*, count(nokamar.no_kamar) as jumlah_kamar');
		$this->db->from('kamar');
		$this->db->join('hotel', 'kamar.id_hotel = hotel.id_hotel', 'left');
		$this->db->join('nokamar', 'kamar.id_kamar = nokamar.id_kamar', 'left');
		$this->db->group_by('kamar.id_kamar');
		if ($filter != NULL){
			$this->db->where($filter);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_nokamar($filter = NULL, $orderby = NULL, $sort = "asc"){
		$this->db->select('*');
		$this->db->from('nokamar');
		$this->db->join('kamar', 'nokamar.id_kamar = kamar.id_kamar', 'left');
		if ($filter != NULL){
			$this->db->where($filter);
		}
		if ($orderby != NULL) {
			$this->db->order_by($orderby, $sort);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_order($filter = NULL, $orderby = NULL, $sort = "asc", $groupby = NULL, $select = NULL, $limit = NULL){
		if ($select != NULL){
			$this->db->select($select);
		}else{
			$this->db->select('*'); //default select
		}
		$this->db->from('orders');
		// $this->db->join('hotel', 'orders.id_hotel = hotel.id_hotel', 'left');
		$this->db->join('kamar', 'orders.id_kamar = kamar.id_kamar', 'left');
		if ($filter != NULL){
			$this->db->where($filter);
		}
		if ($orderby != NULL) {
			$this->db->order_by($orderby, $sort);
		}
		if ($groupby != NULL) {
			$this->db->group_by($groupby);
		}
		if ($limit != NULL) {
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_count_order($filter = NULL){
		$this->db->from('orders');
		if ($filter != NULL){
			$this->db->where($filter);
		}
		$count = $this->db->count_all_results();
		return $count;
	}


	public function get_data_error_log($orderby = NULL, $sort = "asc", $limit = NULL){
		$this->db->select('*');
		$this->db->from('error_log');
		if ($orderby != NULL) {
			$this->db->order_by($orderby, $sort);
		}
		if ($limit != NULL) {
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		return $query->result_array();
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

	public function insert_nokamar($data){
		$this->db->insert('nokamar', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function insert_order($data){
		$this->db->insert('orders', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}


	public function insert_error_log($data){
		$this->db->insert('error_log', $data);
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

	public function update_nokamar($idkamar, $nokamar, $data){
		$this->db->where('id_kamar', $idkamar);
		$this->db->where('no_kamar', $nokamar);
		$this->db->update('nokamar', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function update_order($id, $data){
		$this->db->where('id_order', $id);
		$this->db->update('orders', $data);
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

	public function delete_nokamar($idkamar, $nokamar){
		$this->db->where('id_kamar', $idkamar);
		$this->db->where('no_kamar', $nokamar);
		$this->db->delete('nokamar');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function delete_order($id){
		$this->db->where('id_order', $id);
		$this->db->delete('orders');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}




	//Other
	//Insert or Update
	public function insertOrUpdate($table, $data) {
		if (empty($table) || empty($data)) return false;
		$duplicate_data = array();
		foreach($data AS $key => $value) {
			if ($value!=NULL) {
				$duplicate_data[] = sprintf("%s='%s'", $key, $value);
			}else{
				$duplicate_data[] = sprintf("%s=NULL", $key);
			}
			
		}

		$sql = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string($table, $data), implode(',', $duplicate_data));
		$this->db->query($sql);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}


	public function syncHotel($data, $all){
		$hotelids = array();
		$roomids = array();
		$change = false;
		if ($all) {
			$content = $data->getProperties;
		}else{
			$content = $data->getProperty;
		}
		foreach($content as $row) {
			$insertdata = array(
				'id_hotel' => $row->propId,
				'nama_hotel' => $row->name,
				'alamat_hotel' => $row->address
			);
			$return_message = $this->insertOrUpdate('hotel',$insertdata);
			if ($return_message == "success") {
				$change = true;
			}
			$hotelids[] = $row->propId;

			foreach($row->roomTypes as $row2) {
				$insertdata = array(
					'id_kamar' => $row2->roomId,
					'id_hotel' => $row->propId,
					'nama_kamar' => $row2->name,
					'max_guest' => $row2->maxPeople
				);
				$return_message = $this->insertOrUpdate('kamar',$insertdata);
				if ($return_message == "success") {
					$change = true;
				}
				$roomids[] = $row2->roomId;


				$unitNames = explode("\r\n",$row2->unitNames);

				//NO KAMAR
				for ($i=0; $i < $row2->qty; $i++) { 
					if (empty($unitNames[$i])) {
						$unitNames[$i] = $i+1;
					}

					$insertdata = array(
						'no_kamar' => $i+1,
						'id_kamar' => $row2->roomId,
						'nama_no_kamar' =>$unitNames[$i]
					);
					$return_message = $this->insertOrUpdate('nokamar',$insertdata);
					if ($return_message == "success") {
						$change = true;
					}
				}

				$this->db->where('no_kamar >', $row2->qty);
				$this->db->where('id_kamar', $row2->roomId);
				$this->db->delete('nokamar');
				if ($this->db->affected_rows() > 0 ) {
					$change = true;
				}



			}
		}

		if ($all) {
			$this->db->where_not_in('id_hotel', $hotelids);
			$this->db->delete('hotel');
			if ($this->db->affected_rows() > 0 ) {
				$change = true;
			}

			$this->db->where_not_in('id_kamar', $roomids);
			$this->db->delete('kamar');
			if ($this->db->affected_rows() > 0 ) {
				$change = true;
			}
		}else{
			$this->db->where('id_hotel', $content[0]->propId);
			$this->db->where_not_in('id_kamar', $roomids);
			$this->db->delete('kamar');
			if ($this->db->affected_rows() > 0 ) {
				$change = true;
			}
		}


		if ($change) {
			return "success";
		}else{
			return "failed";
		}

	}




	public function syncBookings($data){
		$change = false;
		foreach($data as $row) {
			$tglcheckinreal = NULL;
			$tglcheckoutreal = NULL;
			foreach ($row->infoItems as $row2) {
				if ($row2->code == "CHECKIN") {
					$tglcheckinreal = date("Y-m-d",strtotime($row2->time));
				}else if ($row2->code == "CHECKOUT"){
					$tglcheckoutreal = date("Y-m-d",strtotime($row2->time));
				}
			}

			if ($row->status == 0) {
				$statusbooking = 'cancelled';
			}else if ($row->status == 4){
				$statusbooking = 'black';
			}else if ($tglcheckoutreal!=NULL) {
				$statusbooking = 'completed';
			}else if($tglcheckinreal!=NULL){
				$statusbooking = 'inhouse';
			}else{
				$statusbooking = 'upcoming';
			}

			$insertdata = array(
				'id_order' => $row->bookId,
				'id_hotel' => $row->propId,
				'id_kamar' => $row->roomId,
				'no_kamar' => ($row->unitId!='0')?$row->unitId:NULL,
				'nama_pemesan' => $row->guestFirstName.",".$row->guestName,
				'telepon_pemesan' => $row->guestMobile.",".$row->guestPhone,
				'email_pemesan' => $row->guestEmail,
				'tanggal_check_in' => $row->firstNight,
				'tanggal_check_out' => date("Y-m-d",strtotime('+1 day', strtotime($row->lastNight))),
				'tanggal_check_in_real' => $tglcheckinreal,
				'tanggal_check_out_real' => $tglcheckoutreal,
				'jumlah_guest' => $row->numAdult,
				'jumlah_room' => $row->roomQty,
				'request_jam_tiba' => $row->guestArrivalTime,
				'total_harga' => $row->price,
				'comments' => $row->guestComments,
				'tanggal_order' => $row->bookingTime,
				'sumber_order' => $row->refererEditable,
				'status_order' => $statusbooking,
				'invoice' => json_encode($row->invoice),
				'tanggal_modified' => $row->modified
			);
			$return_message = $this->insertOrUpdate('orders',$insertdata);
			if ($return_message == "success") {
				$change = true;
			}
			
		}

		if ($change) {
			return "success";
		}else{
			return "failed";
		}
	}
}
