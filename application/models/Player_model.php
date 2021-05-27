<?php

class player_model extends CI_Model {

    public function pesquisa_usuarioP($nome){
        $this->db->like('nome', $nome);
        $this->db->order_by("nome");
        return $this->db->get('players');
    }

    public function pesquisa_usuarios_pagP($limite, $pag, $nome){
        $this->db->like('nome', $nome);
        $this->db->order_by("nome");
        $this->db->limit($limite, $pag);
        return $this->db->get('players');
    }

    public function getPage($limite, $pag) {
        $this->db->order_by('nome');
        $this->db->limit($limite, $pag);
        return $this->db->get('players');
    }

    public function getPlayers(){
        $sql = "SELECT * FROM players ORDER BY nome";
        $result = $this->db->query($sql);
        $array_resultado = $result->result_array();
        return $array_resultado;
        
    }

    public function get($id = null){
        if ($id) {
            $this->db->where('id', $id);
        }
        $this->db->order_by("nome");
        return $this->db->get('players');
    }

        // public function gravarP($dados = null, $id = null)
        // {
        //     if($this->db->insert('players', $dados)) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }

        public function gravarP($dados = null, $id = null)
        {
            if ($id ){
                $this->db->where('id', $id);
                if($this->db->update('players', $dados)) {
                    return true;
                }
                else {
                    return false;
                }
            }
            
            if($this->db->insert('players', $dados)) {
                return true;
            }
            else {
                return false;
            }
        }

        public function excluirP($id = null) {
            if ($id ){
                $this->db->where('id', $id);
                if($this->db->delete('players')) {
                    return true;
                }
                else {
                    return false;
                }
            }
        }

}

?>