<?php

class staff_model extends CI_Model {

    public function pesquisa_usuarioS($nome){
        $this->db->like('nome', $nome);
        $this->db->order_by("nome");
        return $this->db->get('comissaotecnica');
    }

    public function pesquisa_usuarios_pagS($limite, $pag, $nome){
        $this->db->like('nome', $nome);
        $this->db->order_by("nome");
        $this->db->limit($limite, $pag);
        return $this->db->get('comissaotecnica');
    }

    public function getPage($limite, $pag) {
        $this->db->order_by('nome');
        $this->db->limit($limite, $pag);
        return $this->db->get('comissaotecnica');
    }

    public function getStaffers(){
        $sql = "SELECT * FROM comissaotecnica ORDER BY nome";
        $result = $this->db->query($sql);
        $array_resultado = $result->result_array();
        return $array_resultado;
        
    }


    public function get($id = null){
        if ($id) {
            $this->db->where('id', $id);
        }
        $this->db->order_by("nome");
        return $this->db->get('comissaotecnica');
    }


        public function gravarS($dados = null, $id = null)
        {
            if ($id ){
                $this->db->where('id', $id);
                if($this->db->update('comissaotecnica', $dados)) {
                    return true;
                }
                else {
                    return false;
                }
            }
            
            if($this->db->insert('comissaotecnica', $dados)) {
                return true;
            }
            else {
                return false;
            }
        }

        public function excluirS($id = null) {
            if ($id ){
                $this->db->where('id', $id);
                if($this->db->delete('comissaotecnica')) {
                    return true;
                }
                else {
                    return false;
                }
            }
        }

}

?>