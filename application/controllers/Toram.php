<?php 

class Toram extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Toram_model');
	}

	public function index(){
		$data['artikel'] = null;
		$data['info'] = null;
		$data['nf'] = null;
		$data['home'] = null;
		$data['home2'] = true;
		$data['title'] = 'Toram Online - ';
		$data['latestArtikel'] = $this->Toram_model->toramHome();
		$this->load->view('header', $data);
		$this->load->view('Toram_home_view', $data);
		$this->load->view('footer');
	}

	public function search(){
		$data['artikel'] = null;
		$data['info'] = null;
		$data['nf'] = null;
		$data['home'] = null;
		$data['home2'] = true;
		$data['title'] = 'Toram Online - ';
		$data['cari'] = $this->Toram_model->cari();
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
		$this->load->view('header', $data);
		$this->load->view('Pencarian_view', $data);
		$this->load->view('footer');
	}

	public function guide(){
		if ($data['artikel'] = $this->Toram_model->getGuide($this->uri->rsegment(3)) != null) {
			$sc = $this->input->post("var[4]");
			$sc2 = $this->input->post("var[5]");
			$data['error1'] = null;
			$data['error2'] = null;
			$data['success'] = null;
			if ($this->input->post('var') != null && $sc==null && ($sc2=='sword' || $sc2=='Sword')) {
				$this->Toram_model->add($this->input->post('var'));
					$data['success'] = 'Posted';
				redirect($this->uri->uri_string());
			}else{
				if ($this->input->post('var') != null && $sc!=null){
					$data['error1'] = 'There is an error, Please try again next time :)';
				}
				if ($this->input->post('var') != null && ($sc2!='sword' || $sc2!='Sword')){
					$data['error2'] = 'Wrong answer';
				}
			}
			$data['artikel'] = $this->Toram_model->getGuide($this->uri->rsegment(3));
			$data['id'] = $this->Toram_model->getID($this->uri->rsegment(3));
			$data['latest'] = $this->Toram_model->getLatest($data['id'], $this->Toram_model->count_Guide());
			$data['komentar'] = $this->Toram_model->getKomentar($this->uri->rsegment(3));
			$data['jumlahKomentar'] = $this->Toram_model->count_Komentar($this->uri->rsegment(3));
			$data['info'] = null;
			$data['results'] = null;
			$data['title'] = '- Toram | ';
		}else{
			if ($this->uri->rsegment(3) == null || $this->uri->rsegment(3) == 'page') {
				$data['info'] = $this->Toram_model->retrieveGuide();
				$data['artikel'] = null;
				$data['title'] = 'Guide - Toram | ';
				$config                 = array();
    			$this->load->library('pagination');
    			$config["base_url"]     = "/toram/guide/page/".$this->uri->segment(5);
    			$config["total_rows"]   = $this->Toram_model->count_Guide();
			    $config["per_page"]     = 4;
			    $config['uri_segment']  = 4;
			    $config['use_page_numbers'] = TRUE;
			    $this->pagination->initialize($config);

			    if($this->uri->segment(4) > 0)
				    $offset = ($this->uri->segment(4) + 0)*$config['per_page'] - $config['per_page'];
				else
				    $offset = $this->uri->segment(4);   
				$data['results'] = $this->Toram_model->getExpensesGuide($config['per_page'], $offset);
			    $this->data["links"]    = $this->pagination->create_links();
			}else{
				$data['nf'] = TRUE;
				$data['info'] = null;
				$data['results'] = null;
				$data['title'] = 'Page Not Found - ';
			}
		}
		$data['home'] = null;
		$this->load->view('header',$data);
		$this->load->view('Guide_view',$data);
		$this->load->view('footer');
	}

	public function boss(){
		if ($data['artikel'] = $this->Toram_model->getBoss($this->uri->rsegment(3)) != null) {
			$sc = $this->input->post("var[4]");
			$sc2 = $this->input->post("var[5]");
			$data['error1'] = null;
			$data['error2'] = null;
			$data['success'] = null;
			if ($this->input->post('var') != null && $sc==null && ($sc2=='sword' || $sc2=='Sword')) {
				$this->Toram_model->add($this->input->post('var'));
					$data['success'] = 'Posted';
				redirect($this->uri->uri_string());
			}else{
				if ($this->input->post('var') != null && $sc!=null){
					$data['error1'] = 'There is an error, Please try again next time :)';
				}
				if ($this->input->post('var') != null && ($sc2!='sword' || $sc2!='Sword')){
					$data['error2'] = 'Wrong answer';
				}
			}
			$data['artikel'] = $this->Toram_model->getBoss($this->uri->rsegment(3));
			$data['komentar'] = $this->Toram_model->getKomentar($this->uri->rsegment(3));
			$data['jumlahKomentar'] = $this->Toram_model->count_Komentar($this->uri->rsegment(3));
			$data['info'] = null;
			$data['results'] = null;
			$data['title'] = '- Toram Boss | ';
		}else{
			if ($this->uri->rsegment(3) == null || $this->uri->rsegment(3) == 'page') {
				$data['info'] = $this->Toram_model->retrieveBoss();
				$data['artikel'] = null;
				$data['title'] = 'Boss - Toram | ';
				$config                 = array();
    			$this->load->library('pagination');
    			$config["base_url"]     = "/toram/boss/page/".$this->uri->segment(5);
    			$config["total_rows"]   = $this->Toram_model->count_Boss();
			    $config["per_page"]     = 4;
			    $config['uri_segment']  = 4;
			    $config['use_page_numbers'] = TRUE;
			    $this->pagination->initialize($config);

			    if($this->uri->segment(4) > 0)
				    $offset = ($this->uri->segment(4) + 0)*$config['per_page'] - $config['per_page'];
				else
				    $offset = $this->uri->segment(4);   
				$data['results'] = $this->Toram_model->getExpensesBoss($config['per_page'], $offset);
			    $this->data["links"]    = $this->pagination->create_links();
			}else{
				$data['nf'] = TRUE;
				$data['info'] = null;
				$data['results'] = null;
				$data['title'] = 'Page Not Found - ';
			}
			
		}
		$data['home'] = null;
		$this->load->view('header',$data);
		$this->load->view('Boss_view',$data);
		$this->load->view('footer');
	}

	public function mini_boss(){
		if ($data['artikel'] = $this->Toram_model->getMiniBoss($this->uri->rsegment(3)) != null) {
			$sc = $this->input->post("var[4]");
			$sc2 = $this->input->post("var[5]");
			$data['error1'] = null;
			$data['error2'] = null;
			$data['success'] = null;
			if ($this->input->post('var') != null && $sc==null && ($sc2=='sword' || $sc2=='Sword')) {
				$this->Toram_model->add($this->input->post('var'));
					$data['success'] = 'Posted';
				redirect($this->uri->uri_string());
			}else{
				if ($this->input->post('var') != null && $sc!=null){
					$data['error1'] = 'There is an error, Please try again next time :)';
				}
				if ($this->input->post('var') != null && ($sc2!='sword' || $sc2!='Sword')){
					$data['error2'] = 'Wrong answer';
				}
			}
			$data['artikel'] = $this->Toram_model->getMiniBoss($this->uri->rsegment(3));
			$data['komentar'] = $this->Toram_model->getKomentar($this->uri->rsegment(3));
			$data['jumlahKomentar'] = $this->Toram_model->count_Komentar($this->uri->rsegment(3));
			//$data['info'] = null;
			$data['info'] = null;
			$data['results'] = null;
			$data['title'] = '- Toram Mini Boss | ';
		}else{
			if ($this->uri->rsegment(3) == null || $this->uri->rsegment(3) == 'page') {
				$data['info'] = $this->Toram_model->retrieveMiniBoss();
				$data['artikel'] = null;
				$data['title'] = 'Mini Boss - Toram | ';
				$config                 = array();
    			$this->load->library('pagination');
    			$config["base_url"]     = "/toram/mini-boss/page/".$this->uri->segment(5);
    			$config["total_rows"]   = $this->Toram_model->count_MiniBoss();
			    $config["per_page"]     = 4;
			    $config['uri_segment']  = 4;
			    $config['use_page_numbers'] = TRUE;
			    $this->pagination->initialize($config);

			    if($this->uri->segment(4) > 0)
				    $offset = ($this->uri->segment(4) + 0)*$config['per_page'] - $config['per_page'];
				else
				    $offset = $this->uri->segment(4);   
				$data['results'] = $this->Toram_model->getExpensesMiniBoss($config['per_page'], $offset);
			    $this->data["links"]    = $this->pagination->create_links();
			}else{
				$data['nf'] = TRUE;
				$data['results'] = null;
				//$data['info'] = null;
				$data['info'] = null;
				$data['title'] = 'Page Not Found - ';
			}
			
		}
		$data['home'] = null;
		$this->load->view('header', $data);
		$this->load->view('Miniboss_view',$data);
		$this->load->view('footer');
	}

}

?>