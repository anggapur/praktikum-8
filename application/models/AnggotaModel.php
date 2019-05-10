<?php

class AnggotaModel extends CI_Model {

		public $table = "anggota";
        public function getData($limit=10,$from=0,$search = null)
        {
                if($search !== null)
                {
                    $this->db->or_like(
                        [
                            'nama' => $search,
                            'prodi' => $search,
                            'jenjang' => $search,
                            'alamat' => $search
                        ]
                    );
                }
                $q = $this->db->get($this->table,$limit,$from);
                return $q->result();;
        }
        public function allData($search = null)
        {
            if($search !== null)
            {
                $this->db->or_like(
                    [
                        'nama' => $search,
                        'prodi' => $search,
                        'jenjang' => $search,
                        'alamat' => $search
                    ]
                );
            }
            $q = $this->db->get($this->table);
            return $q->num_rows();
        }

        public function insertData($data)
        {
        	$q = $this->db->insert($this->table,$data);
        	return $q;
        }
        public function deleteData($where)
        {
        	$q = $this->db->where($where)->delete($this->table);
        	return $q;
        }

        public function getOneData($where)
        {
               return $this->db->get_where($this->table,$where)->result();
        }


		public function updateData($where,$data){
			$q = $this->db->where($where)->update($this->table,$data);
			return $q;
		}	

        public function insertDataPeminjaman($data)
        {
            $dataPeminjaman = [
                'kd_anggota' => $data['kd_anggota'],
                'kd_petugas' => $this->session->userdata('kd_petugas')
            ];
            $q = $this->db->insert('peminjaman',$dataPeminjaman);

            $insert_id = $this->db->insert_id();

            $dataPeminjaman = [
                'kd_register' => $data['kd_register'],
                'kd_pinjam' => $insert_id,
                'tanggal_pinjam' => $data['tanggal_pinjam'],
                'tanggal_kembali' => null
            ];
            $q = $this->db->insert('detil_pinjam',$dataPeminjaman);

            return $q;
        }

        public function updateDataPeminjaman($where,$data)
        {
            $dataPeminjaman = [
                'kd_anggota' => $data['kd_anggota'],
                'kd_petugas' => $this->session->userdata('kd_petugas')
            ];
            $q =  $this->db->where($where)->update('peminjaman',$dataPeminjaman);


            $dataPeminjaman = [
                'kd_register' => $data['kd_register'],
                'tanggal_pinjam' => $data['tanggal_pinjam'],
                'tanggal_kembali' => $data['tanggal_kembali'],
            ];
            $q = $this->db->where($where)->update('detil_pinjam',$dataPeminjaman);

            return $q;
        }
         public function updateLastLogin()
        {   
            $where = ['kd_anggota' => $this->session->userdata('kd_anggota')];
            $data = ['last_login' => date('Y-m-d H:i:s')];
            $q = $this->db->where($where)->update($this->table,$data);
            return $q;
        }
}