<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {


	public function index()
	{

	}

	public function lista_usuarios_simples()
	{
		//carregar o modelo aqui
		$this->load->model('usuario_model');
		$resultado = $this->usuario_model->getUsuarios();
		$dado = array('usuarios'=>$resultado);
		$this->load->view('view_menu');
		$this->load->view('usuario/lista_simples', $dado);
	}

	public function lista($pag=0){
		$this->load->model('usuario_model');
		$limite = 5;
		
	}

	public function novo(){
		$this->load->view('view_menu');
		$this->load->view('usuario/novo');	
	}

	public function gravar($id = null){

		$this->load->library('form_validation');

		$this->load->model('usuario_model');

		$regras = array(
			array('field' => 'nome', 'label' => 'nome', 'rules' => 'required'),
			array('field' => 'email', 'label' => 'email', 'rules' => 'required|valid_email'),
			array('field' => 'senha', 'label' => 'senha', 'rules' => 'required'),
			array('field' => 'aniversario', 'label' => 'aniversario', 'rules' => 'required'),
			array('field' => 'cpf', 'label' => 'cpf', 'rules' => 'required|exact_length[11]'),
			array('field' => 'genero', 'label' => 'genero', 'rules' => 'required|in_list[Masculino,Feminino]'),
			array('field' => 'estado', 'label' => 'estado', 'rules' => 'required|exact_length[2]'),
			array('field' => 'cidade', 'label' => 'cidade', 'rules' => 'required'),
			array('field' => 'tipo', 'label' => 'tipo', 'rules' => 'required')
		);

		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == false) {
			echo "erro de validação"; 
			$this->load->view('view_menu');
			$this->load->view('usuario/novo');
		}

		else {
		
		$id = $this->input->post('id');
		$dados = array(
			"nome" => $this->input->post('nome'),
			"email" => $this->input->post('email'),
			"senha" => sha1($this->input->post('senha')),
			"aniversario" => $this->input->post('aniversario'),
			"genero" => $this->input->post('genero'),
			"cpf" => $this->input->post('cpf'),
			"estado" => $this->input->post('estado'),
			"cidade" => $this->input->post('cidade'),
			"tipo" => $this->input->post('tipo')
		);

		//echo var_dump($dados);

		$this->load->view('view_menu');
		if($this->usuario_model->gravar($dados, $id)){
			$msg['mensagem'] = "Dados gravados com sucesso!";
			$this->load->view('msg_sucesso', $msg);
		}
		else {
			echo "Erro ao gravar os dados";
		}

	}
		
	}

		public function lista_players($pag=0){
			//criar model de usuarios e carregar aqui
			$this->load->model('player_model');
			$limite = 5;
			$dados['total'] = count($this->player_model->get()->result());
			$resultado['players'] = $this->player_model->getPage($limite, $pag);

			
			$this->load->library('pagination');
			$this->load->config('pagination');
			$config = $this->config->item('pagination_config');
			$config['base_url'] = base_url('listaP');
			$config['total_rows'] = $dados['total'];
			$config['per_page'] = $limite;
			
			$this->pagination->initialize($config);
			//$resultado['players'] = $this->player_model->get();
			
			$this->load->view('view_menu');
			$this->load->view('usuario/lista_players', $resultado);
		}

		// public function lista(){
		// 	$this->load->model('usuario_model');
		// 	$resultado['usuarios'] = $this->usuario_model->get();
		// 	$this->load->view('view_menu');
		// 	$this->load->view('usuario/lista', $resultado);
		// }

		//---------------------------------------------------------------
		public function lista_staff($pag=0){
			//criar model de usuarios e carregar aqui
			$this->load->model('staff_model');
			$limite = 5;
			$dados['total'] = count($this->staff_model->get()->result());
			$resultado['comissaotecnica'] = $this->staff_model->getPage($limite, $pag);

			
			$this->load->library('pagination');
			$this->load->config('pagination');
			$config = $this->config->item('pagination_config');
			$config['base_url'] = base_url('listaS');
			$config['total_rows'] = $dados['total'];
			$config['per_page'] = $limite;
			
			$this->pagination->initialize($config);

			//$resultado['comissaotecnica'] = $this->staff_model->get();


			$this->load->view('view_menu');
			$this->load->view('usuario/lista_staff', $resultado);
		}
		//----------------------------------------------------------------------------

		public function editar($id = null)
		{
			if ($id) {
				$this->load->model('usuario_model');
				$dados = $this->usuario_model->get($id);
				if ($dados->num_rows() > 0) {
					$valores['id'] = $dados->row()->id;
					$valores['email'] = $dados->row()->email;
					$valores['senha'] = null;
					$valores['aniversario'] = $dados->row()->aniversario;
					$valores['genero'] = $dados->row()->genero;
					$valores['cpf'] = $dados->row()->cpf;
					$valores['estado'] = $dados->row()->estado;
					$valores['cidade'] = $dados->row()->cidade;
					$valores['nome'] = $dados->row()->nome;
				}
				$this->load->view('view_menu');
				$this->load->view('usuario/novo', $valores);
			}
			else {
				echo "Nao tem";
				}
		}

		public function excluir($id = null)
		{
			if ($id) {
				$this->load->model('usuario_model');
				if ($this->usuario_model->excluir($id)) {
					$this->load->view('view_menu');
					echo "Excluído com Sucesso";
				}
				else {
					echo "Falha ao Excluir";
				}
			}
		}
		//=====================================================================================//
		public function novoP()
		{
			$this->load->view('view_menu');
			$this->load->view('usuario/novoP');
		}

		public function gravarP()
		{
			$this->load->library('form_validation');
			$this->load->view('view_menu');
			$this->load->model('player_model');

			$regras = array(
				array('field' => 'nome', 'label' => 'nome', 'rules' => 'required'),
				array('field' => 'email', 'label' => 'email', 'rules' => 'required|valid_email'),
				array('field' => 'apelido', 'label' => 'apelido', 'rules' => 'required'),
				array('field' => 'diasContrato', 'label' => 'diasContrato', 'rules' => 'required'),
				array('field' => 'anosExperiencia', 'label' => 'anosExperiencia', 'rules' => 'required'),
				array('field' => 'genero', 'label' => 'genero', 'rules' => 'required'),
				array('field' => 'titulos', 'label' => 'estado', 'titulos' => 'required')
			);

			$this->form_validation->set_rules($regras);

			if ($this->form_validation->run() == false) {
				echo "erro de validação"; 
				$this->load->view('view_menu');
				$this->load->view('usuario/novoP');
			}

			else {

			$id = $this->input->post('id');
			$dados = array(
				"nome" => $this->input->post('nome'),
				"apelido" => $this->input->post('apelido'),
				"diasContrato" => $this->input->post('diasContrato'),
				"genero" => $this->input->post('genero'),
				"email" => $this->input->post('email'),
				"anosExperiencia" => $this->input->post('anosExperiencia'),
				"titulos" => $this->input->post('titulos'),

			);

			}

			// echo var_dump($dados);
			
			if($this->player_model->gravarP($dados, $id)){
				$msg['mensagem'] = "Dados gravados com sucesso!";
				$this->load->view('msg_sucesso', $msg);
			}
			else {
				echo "Erro ao gravar os dados";
			}
		}

		
		//----------------------------------------------------------------//
		public function novoS()
		{
			$this->load->view('view_menu');
			$this->load->view('usuario/novoS');
		}

		public function gravarS()
		{
			$this->load->library('form_validation');
			$this->load->view('view_menu');
			$this->load->model('staff_model');

			$regras = array(
				array('field' => 'nome', 'label' => 'nome', 'rules' => 'required'),
				array('field' => 'apelido', 'label' => 'apelido', 'rules' => 'required'),
				array('field' => 'diasContrato', 'label' => 'diasContrato', 'rules' => 'required'),
				array('field' => 'genero', 'label' => 'genero', 'rules' => 'required'),
				array('field' => 'email', 'label' => 'email', 'rules' => 'required|valid_email'),
				array('field' => 'anosExperiencia', 'label' => 'anosExperiencia', 'rules' => 'required'),
				array('field' => 'funcao', 'label' => 'estado', 'funcao' => 'required')
			);

			$this->form_validation->set_rules($regras);

			if ($this->form_validation->run() == false) {
				echo "erro de validação"; 
				$this->load->view('view_menu');
				$this->load->view('usuario/novoS');
			}

			else {

			$id = $this->input->post('id');
			$dados = array(
				"nome" => $this->input->post('nome'),
				"apelido" => $this->input->post('apelido'),
				"diasContrato" => $this->input->post('diasContrato'),
				"genero" => $this->input->post('genero'),
				"email" => $this->input->post('email'),
				"anosExperiencia" => $this->input->post('anosExperiencia'),
				"funcao" => $this->input->post('funcao'),

			);

			}

			// echo var_dump($dados);
			
			if($this->staff_model->gravarS($dados, $id)){
				$msg['mensagem'] = "Dados gravados com sucesso!";
				$this->load->view('msg_sucesso', $msg);
			}
			else {
				echo "Erro ao gravar os dados";
			}
		}

		//--------------------------------------------------------------------------------//

		public function editarP($id = null)
		{
			if ($id) {
				$this->load->model('player_model');
				$dados = $this->player_model->get($id);
				if ($dados->num_rows() > 0) {
					$valores['id'] = $dados->row()->id;
					$valores['email'] = $dados->row()->email;
					$valores['nome'] = $dados->row()->nome;
					$valores['apelido'] = $dados->row()->apelido;
					$valores['genero'] = $dados->row()->genero;
					$valores['titulos'] = $dados->row()->titulos;
					$valores['diasContrato'] = $dados->row()->diasContrato;
					$valores['anosExperiencia'] = $dados->row()->anosExperiencia;
				}
				$this->load->view('view_menu');
				$this->load->view('usuario/novoP', $valores);
			}
			else {
				echo "Nao tem";
				}
		}

		public function excluirP($id = null)
		{
			if ($id) {
				$this->load->model('player_model');
				if ($this->player_model->excluirP($id)) {
					$this->load->view('view_menu');
					echo "Excluído com Sucesso";
				}
				else {
					echo "Falha ao Excluir";
				}
			}
		}

		//------------------------------------------------------------//

		public function editarS($id = null)
		{
			if ($id) {
				$this->load->model('staff_model');
				$dados = $this->staff_model->get($id);
				if ($dados->num_rows() > 0) {
					$valores['id'] = $dados->row()->id;
					$valores['nome'] = $dados->row()->nome;
					$valores['apelido'] = $dados->row()->apelido;
					$valores['funcao'] = $dados->row()->funcao;
					$valores['diasContrato'] = $dados->row()->diasContrato;
					$valores['genero'] = $dados->row()->genero;
					$valores['email'] = $dados->row()->email;
					$valores['anosExperiencia'] = $dados->row()->anosExperiencia;
				}
				$this->load->view('view_menu');
				$this->load->view('usuario/novoS', $valores);
			}
			else {
				echo "Nao tem";
				}
		}

		public function excluirS($id = null)
		{
			if ($id) {
				$this->load->model('staff_model');
				if ($this->staff_model->excluirS($id)) {
					$this->load->view('view_menu');
					echo "Excluído com Sucesso";
				}
				else {
					echo "Falha ao Excluir";
				}
			}
		}

		//-------------------------------------------

		public function pesquisa($nome=null,$pag=0) {
			$this->load->model('usuario_model');
			$limite = 5;

			if(isset($_GET['nome'])) {
				$nome = $_GET['nome'];
			}

			$dados['total'] = count($this->usuario_model->pesquisa_usuario($nome)->result());
			$resultado['usuarios'] = $this->usuario_model->pesquisa_usuarios_pag($limite, $pag, $nome);

			$this->load->library('pagination');
			$this->load->config('pagination');
			$config = $this->config->item('pagination_config');
			$config['base_url'] = base_url('usuario/pesquisa/'.$nome);
			$config['total_rows'] = $dados['total'];
			$config['per_page'] = $limite;

			$this->pagination->initialize($config);

			//$resultado['usuarios'] = $this->usuario_model->get();


			$this->load->view('view_menu');
			$this->load->view('usuario/lista', $resultado);
			
			}

			public function exporta(){
				//get table
				$usuarios = $this->db->get('usuarios');
		
				//load library
				$this->load->library('MY_Export');
		
				//export data
				$this->my_export->to_excel($usuarios, 'Usuários');
			}

		//----------------------------------------------------

		public function exportaP(){
			//get table
			$players = $this->db->get('players');
	
			//load library
			$this->load->library('MY_Export');
	
			//export data
			$this->my_export->to_excel($players, 'Players');
		}

		

		//-----------------------------------------------------

		public function pesquisaP($nome=null,$pag=0) {
			$this->load->model('player_model');
			$limite = 5;

			if(isset($_GET['nome'])) {
				$nome = $_GET['nome'];
			}

			$dados['total'] = count($this->player_model->pesquisa_usuarioP($nome)->result());
			$resultado['players'] = $this->player_model->pesquisa_usuarios_pagP($limite, $pag, $nome);

			$this->load->library('pagination');
			$this->load->config('pagination');
			$config = $this->config->item('pagination_config');
			$config['base_url'] = base_url('usuario/pesquisaP/'.$nome);
			$config['total_rows'] = $dados['total'];
			$config['per_page'] = $limite;

			$this->pagination->initialize($config);

			//$resultado['usuarios'] = $this->usuario_model->get();


			$this->load->view('view_menu');
			$this->load->view('usuario/lista_players', $resultado);
			
			}

			public function pesquisaS($nome=null,$pag=0) {
				$this->load->model('staff_model');
				$limite = 5;
	
				if(isset($_GET['nome'])) {
					$nome = $_GET['nome'];
				}
	
				$dados['total'] = count($this->staff_model->pesquisa_usuarioS($nome)->result());
				$resultado['usuarios'] = $this->staff_model->pesquisa_usuarios_pagS($limite, $pag, $nome);
	
				$this->load->library('pagination');
				$this->load->config('pagination');
				$config = $this->config->item('pagination_config');
				$config['base_url'] = base_url('usuario/pesquisaS/'.$nome);
				$config['total_rows'] = $dados['total'];
				$config['per_page'] = $limite;
	
				$this->pagination->initialize($config);
	
				//$resultado['usuarios'] = $this->usuario_model->get();
	
	
				$this->load->view('view_menu');
				$this->load->view('usuario/lista_staff', $resultado);
				
				}

				public function exportaS(){
					//get table
					$staffers = $this->db->get('comissaotecnica');
			
					//load library
					$this->load->library('MY_Export');
			
					//export data
					$this->my_export->to_excel($staffers, 'Staffers');
				}

	}