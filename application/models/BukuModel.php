<?php

class BukuModel extends CI_Model {

		public $table = "buku";
        public function getData()
        {
                $q = $this->db->get($this->table)->result();
                return $q;
        }
        public function getDataPinjamAnggota()
        {   
            $where = ['kd_anggota' => $this->session->userdata('kd_anggota')];
                $q = $this->db
                ->where($where)
                ->join('detil_pinjam', 'peminjaman.kd_pinjam = detil_pinjam.kd_pinjam')
                ->join('petugas', 'peminjaman.kd_petugas = petugas.kd_petugas')
                ->join('buku', 'buku.kd_register = detil_pinjam.kd_register')
                ->select('buku.*,petugas.*,detil_pinjam.*,petugas.nama as namaPetugas')
                ->get('peminjaman')
                ->result();
                return $q;
        }

        public function getDataPinjamAnggotaByPetugas()
        {   
                $q = $this->db
                ->join('detil_pinjam', 'peminjaman.kd_pinjam = detil_pinjam.kd_pinjam')
                ->join('petugas', 'peminjaman.kd_petugas = petugas.kd_petugas')
                ->join('anggota', 'peminjaman.kd_anggota = anggota.kd_anggota')
                ->join('buku', 'buku.kd_register = detil_pinjam.kd_register')
                ->select('buku.*,petugas.*,detil_pinjam.*,petugas.nama as namaPetugas,anggota.nama as namaAnggota')
                ->get('peminjaman')
                ->result();
                return $q;
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

        public function deleteDataPinjam($where)
        {
            $q1 = $this->db->where($where)->delete('peminjaman');
            $q2 = $this->db->where($where)->delete('detil_pinjam');
            return ($q1 and $q2);
        }

        public function getOneDataPinjaman($where)
        {
                $q = $this->db
                ->join('detil_pinjam', 'peminjaman.kd_pinjam = detil_pinjam.kd_pinjam')
                ->join('petugas', 'peminjaman.kd_petugas = petugas.kd_petugas')
                ->join('anggota', 'peminjaman.kd_anggota = anggota.kd_anggota')
                ->join('buku', 'buku.kd_register = detil_pinjam.kd_register')
                ->select('peminjaman.*,buku.*,petugas.*,detil_pinjam.*,petugas.nama as namaPetugas,anggota.nama as namaAnggota')
                ->where($where)
                ->get('peminjaman')
                ->result();
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
}