<?php

class M_transaksi extends CI_Model
{
    public function tambah_stok_barangbaru($data)
    {
        $ci = get_instance();
        $idd = $ci->session->userdata('email');
        $queryId = $ci->db->get_where('tb_user', ['email' => $idd])->row_array();

        $qty = $data['qty'];
        $id = $data['id_barang'];

        if ($queryId['id_wilayah'] == 1) {
            $sql = "UPDATE tb_stokgudang SET whjember = whjember + '$qty' WHERE id_barang = '$id'";
        }
        if ($queryId['id_wilayah'] == 2) {
            $sql = "UPDATE tb_stokgudang SET soinvjemkotin = soinvjemkotin + '$qty' WHERE id_barang = '$id'";
        }
        if ($queryId['id_wilayah'] == 3) {
            $sql = "UPDATE tb_stokgudang SET soinvjemkotout = soinvjemkotout + '$qty' WHERE id_barang = '$id'";
        }

        $this->db->query($sql);
    }

    public function lap_barangbaru($post)
    {
        $ci = get_instance();
        $idd = $ci->session->userdata('email');
        $queryId = $ci->db->get_where('tb_user', ['email' => $idd])->row_array();

        if ($queryId['id_wilayah'] == 1) {
            $param = [
                'tanggal' => $post['date'],
                'id_barang' => $post['id_barang'],
                'nama' => $post['nama'],
                'tipe' => $post['jenis'],
                'satuan' => $post['satuan'],
                'jumlah' => $post['qty'],
                'pengirim' => $post['pengirim'],
                'keterangan' => $post['item_name'],
                'graf' => 1
            ];
            $this->db->insert('tb_lapbarmas', $param);
        }

        if ($queryId['id_wilayah'] == 2) {
            $param = [
                'tanggal' => $post['date'],
                'id_barang' => $post['id_barang'],
                'nama' => $post['nama'],
                'tipe' => $post['jenis'],
                'satuan' => $post['satuan'],
                'jumlah' => $post['qty'],
                'pengirim' => $post['pengirim'],
                'keterangan' => $post['item_name'],
                'graf' => 1
            ];
            $this->db->insert('tb_lapbarmas2', $param);
        }

        if ($queryId['id_wilayah'] == 3) {
            $param = [
                'tanggal' => $post['date'],
                'id_barang' => $post['id_barang'],
                'nama' => $post['nama'],
                'tipe' => $post['jenis'],
                'satuan' => $post['satuan'],
                'jumlah' => $post['qty'],
                'pengirim' => $post['pengirim'],
                'keterangan' => $post['item_name'],
                'graf' => 1
            ];
            $this->db->insert('tb_lapbarmas3', $param);
        }
    }

    function get_nofrak()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(nofrak,6)) AS kd_max FROM tb_lapbarkel WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "000001";
        }
        return date('dmy') . $kd;
    }

    public function kurang($nofrak)
    {
        $ci = get_instance();
        $idd = $ci->session->userdata('email');
        $queryId = $ci->db->get_where('tb_user', ['email' => $idd])->row_array();

        if ($queryId['id_wilayah'] == 1) {
            foreach ($this->cart->contents() as $item) {
                $data = array(
                    'nofrak' => $nofrak,
                    'tanggal' => $item['date'],
                    'id_barang' => $item['id'],
                    'namatek' => $item['namak'],
                    'nama' => $item['name'],
                    'tipe' => $item['price'],
                    'satuan' => $item['satuan'],
                    'jumlah' => $item['qty'],
                    'keterangan' => $item['keterangan'],
                    'graf' => 1
                );

                $this->db->insert('tb_lapbarkel', $data);
                $this->db->query("update tb_stokgudang set whjember = whjember-'$item[qty]' where id_barang = '$item[id]'");
            }
        }

        if ($queryId['id_wilayah'] == 2) {
            foreach ($this->cart->contents() as $item) {
                $data = array(
                    'nofrak' => $nofrak,
                    'tanggal' => $item['date'],
                    'id_barang' => $item['id'],
                    'namatek' => $item['namak'],
                    'nama' => $item['name'],
                    'tipe' => $item['price'],
                    'satuan' => $item['satuan'],
                    'jumlah' => $item['qty'],
                    'keterangan' => $item['keterangan'],
                    'graf' => 1
                );

                $this->db->insert('tb_lapbarkel2', $data);
                $this->db->query("update stok_gudang set soinvjemkotin = soinvjemkotin-'$item[qty]' where id_barang = '$item[id]'");
            }
        }

        if ($queryId['id_wilayah'] == 3) {
            foreach ($this->cart->contents() as $item) {
                $data = array(
                    'nofrak' => $nofrak,
                    'tanggal' => $item['date'],
                    'id_barang' => $item['id'],
                    'namatek' => $item['namak'],
                    'nama' => $item['name'],
                    'tipe' => $item['price'],
                    'satuan' => $item['satuan'],
                    'jumlah' => $item['qty'],
                    'keterangan' => $item['keterangan'],
                    'graf' => 1
                );

                $this->db->insert('tb_lapbarkel3', $data);
                $this->db->query("update stok_gudang set soinvjemkotout = soinvjemkotout-'$item[qty]' where id_barang = '$item[id]'");
            }
        }
    }
}
