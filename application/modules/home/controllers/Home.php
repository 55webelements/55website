<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('sql');
		
	}
	public function index()
	{
		$metatags="metatags";
		$pagetype = 1;
		$data['contact'] = $this->sql->getTableRowDataOrder("contact",array('status' => 1),"id","ASC");
		$data['careers'] = $this->sql->getTableRowDataOrder("careers",array('status' => 1),"id","ASC");
		$data['aservices'] = $this->sql->getTableRowDataOrder("serviceitems",array('status' => 1),"id","ASC");
		$metatags=$this->sql->getTableRowData("pages",array('pAlias' => 'home','status' => 1));
		$data['metatags']=$metatags;
		$banners = $this->sql->getTableRowDataOrder("banners",array('status' => 1),"id","ASC");
		$sections = $this->sql->getTableRowDataOrder("sections",array('status' => 1),"id","ASC");
		$wework = $this->sql->getTableRowDataOrder("wework",array('status' => 1),"id","ASC");
		$blogs = $this->sql->getTableRowDataOrderLimit("blogs",array('status' => 1),8,"id","DESC");
		$testimonials = $this->sql->getTableRowDataOrder("testimonials",array('status' => 1),"id","DESC");
		$works = $this->sql->getTableRowDataOrderLimit("works",array('status' => 1),3,"id","DESC");
		$json=array(
			'banners' => $banners,
			'sections' => $sections,
			'wework' => $wework,
			'blogs' => $blogs,
			'testimonials' => $testimonials,
			'works' => $works,
		);
		$data['rec'] = @json_encode($json);
		$data['services'] = $this->sql->getTableRowDataOrder("services",array('status' => 1),"id","ASC");
		$data['menu'] = 'home';
		$this->load->view('header',$data);
		//print_r($data['home']);die();
		$this->load->view('index',$data);
		$this->load->view('footer',$data);
	}
	public function about()
	{
		$metatags="metatags";
		$pagetype = 1;
		$metatags=$this->sql->getTableRowData("pages",array('pAlias' => 'about','status' => 1));
		$data['metatags']=$metatags;
		$data['contact'] = $this->sql->getTableRowDataOrder("contact",array('status' => 1),"id","ASC");
		$data['careers'] = $this->sql->getTableRowDataOrder("careers",array('status' => 1),"id","ASC");
		$data['aservices'] = $this->sql->getTableRowDataOrder("serviceitems",array('status' => 1),"id","ASC");
		$whoweare = $this->sql->getTableRowDataOrder("about",array('status' => 1,"aType" => 'whoweare'),"id","ASC");
		$whatwedo = $this->sql->getTableRowDataOrder("about",array('status' => 1,"aType" => 'whatwedo'),"id","ASC");
		$process = $this->sql->getTableRowDataOrder("about",array('status' => 1,"aType" => 'process'),"id","ASC");
		$json=array(
			'whoweare' => $whoweare,
			'whatwedo' => $whatwedo,
			'process' => $process,
		);
		$data['rec'] = @json_encode($json);
		$data['services'] = $this->sql->getTableRowDataOrder("services",array('status' => 1),"id","ASC");
		$data['menu'] = 'about';
		$this->load->view('header',$data);
		//print_r($data['home']);die();
		$this->load->view('about',$data);
		$this->load->view('footer',$data);
	}
	public function contact()
	{
		$metatags="metatags";
		$pagetype = 1;
		$metatags=$this->sql->getTableRowData("pages",array('pAlias' => 'contact','status' => 1));
		$data['metatags']=$metatags;
		
		$data['contact'] = $this->sql->getTableRowDataOrder("contact",array('status' => 1),"id","ASC");
		$data['careers'] = $this->sql->getTableRowDataOrder("careers",array('status' => 1),"id","ASC");
		$data['aservices'] = $this->sql->getTableRowDataOrder("serviceitems",array('status' => 1),"id","ASC");
		$data['services'] = $this->sql->getTableRowDataOrder("services",array('status' => 1),"id","ASC");
		$data['menu'] = 'contact';
		$this->load->view('header',$data);
		//print_r($data['home']);die();
		$this->load->view('contact',$data);
		$this->load->view('footer',$data);
	}
	public function work()
	{
		$metatags="metatags";
		$pagetype = 1;
		$data['contact'] = $this->sql->getTableRowDataOrder("contact",array('status' => 1),"id","ASC");
		$data['careers'] = $this->sql->getTableRowDataOrder("careers",array('status' => 1),"id","ASC");
		$data['aservices'] = $this->sql->getTableRowDataOrder("serviceitems",array('status' => 1),"id","ASC");
		$metatags=$this->sql->getTableRowData("pages",array('pAlias' => 'portfolio','status' => 1));
		$data['metatags']=$metatags;
		$works = $this->sql->getTableRowDataOrder("works",array('status' => 1),"orderpos","ASC");
		$json=array(
			'works' => $works,
		);
		$data['rec'] = @json_encode($json);
		$data['services'] = $this->sql->getTableRowDataOrder("services",array('status' => 1),"id","ASC");
		$data['menu'] = 'work';
		$this->load->view('header',$data);
		//print_r($data['home']);die();
		$this->load->view('web-design-portfolio',$data);
		$this->load->view('footer',$data);
	}
	
	public function services($serviceid)
	{
		$metatags="metatags";
		$pagetype = 1;
		$data['contact'] = $this->sql->getTableRowDataOrder("contact",array('status' => 1),"id","ASC");
		$data['careers'] = $this->sql->getTableRowDataOrder("careers",array('status' => 1),"id","ASC");
		$data['aservices'] = $this->sql->getTableRowDataOrder("serviceitems",array('status' => 1),"id","ASC");
		$metatags=$this->sql->getTableRowData("services",array('id' => $serviceid,'status' => 1));
		$data['metatags']=$metatags;
		$serviceitems = $this->sql->getTableRowDataOrder("serviceitems",array('status' => 1,"serviceid" => $serviceid),"id","ASC");
		$json=array(
			'serviceitems' => $serviceitems,
		);
		$data['rec'] = @json_encode($json);
		$data['serviceid'] = $serviceid;
		
		$data['services'] = $this->sql->getTableRowDataOrder("services",array('status' => 1),"id","ASC");
		$this->load->view('header',$data);
		//print_r($data['home']);die();
		$this->load->view('web-design-development',$data);
		$this->load->view('footer',$data);
	}
	
	public function serviceItem($itemid)
	{
		$item=$this->sql->getTableRowData("serviceitems",array('id' => $itemid));
		$data['serviceitem'] = $item;
		$data['itemid'] = $itemid;
		$metatags="metatags";
		$pagetype = 1;
		$data['contact'] = $this->sql->getTableRowDataOrder("contact",array('status' => 1),"id","ASC");
		$data['careers'] = $this->sql->getTableRowDataOrder("careers",array('status' => 1),"id","ASC");
		$data['aservices'] = $this->sql->getTableRowDataOrder("serviceitems",array('status' => 1),"id","ASC");
		$metatags=$this->sql->getTableRowData("serviceitems",array('id' => $itemid,'status' => 1));
		$data['metatags']=$metatags;
		$serviceitems = $this->sql->getTableRowDataOrder("servicecontents",array('status' => 1,"serviceitemid" => $itemid),"id","DESC");
		$allitems = $this->sql->getTableRowDataOrder("serviceitems",array('status' => 1,"serviceid" => $item[0]->serviceid),"id","ASC");
		$json=array(
			'contents' => $serviceitems,
			'allitems' => $allitems,
		);
		$data['rec'] = @json_encode($json);
		$data['serviceid'] = $item[0]->serviceid;
		$data['services'] = $this->sql->getTableRowDataOrder("services",array('status' => 1),"id","ASC");
		$this->load->view('header',$data);
		//print_r($data['home']);die();
		$this->load->view('website-design',$data);
		$this->load->view('footer',$data);
	}
	
	
	public function blogs()
	{
	    $data['menu'] = 'blogs';
		$metatags=$this->sql->getTableRowData("pages",array('pAlias' => 'about','status' => 1));
		$data['metatags']=$metatags;
		$data['contact'] = $this->sql->getTableRowDataOrder("contact",array('status' => 1),"id","ASC");
		$data['careers'] = $this->sql->getTableRowDataOrder("careers",array('status' => 1),"id","ASC");
		$data['aservices'] = $this->sql->getTableRowDataOrder("serviceitems",array('status' => 1),"id","ASC");
		$blogs = $this->sql->getTableRowDataOrder("blogs",array('status' => 1),"id","DESC");
	
		$data['services'] = $this->sql->getTableRowDataOrder("services",array('status' => 1),"id","ASC");
		$this->load->view('header',$data);
		
		$data["blogs"]=$blogs;
		$this->load->view('blogs',$data);
		$this->load->view('footer',$data);
	}
	
	public function viewBlog($rowid)
	{
		$metatags=$this->sql->getTableRowData("pages",array('pAlias' => 'about','status' => 1));
		$data['metatags']=$metatags;
		$data['contact'] = $this->sql->getTableRowDataOrder("contact",array('status' => 1),"id","ASC");
		$data['careers'] = $this->sql->getTableRowDataOrder("careers",array('status' => 1),"id","ASC");
		$data['aservices'] = $this->sql->getTableRowDataOrder("serviceitems",array('status' => 1),"id","ASC");
		$blog = $this->sql->getTableRowDataOrder("blogs",array('status' => 1,"id" => $rowid),"id","ASC");
	
		$data['services'] = $this->sql->getTableRowDataOrder("services",array('status' => 1),"id","ASC");
		$this->load->view('header',$data);
		
		$data["blog"]=$blog;
		$this->load->view('blog',$data);
		$this->load->view('footer',$data);
	}
	
	public function blogInfo(){
		
		$blog="blog";
		$data['contact'] = $this->sql->getTableRowDataOrder("contact",array('status' => 1),"id","ASC");
		$data['careers'] = $this->sql->getTableRowDataOrder("careers",array('status' => 1),"id","ASC");
		$data['aservices'] = $this->sql->getTableRowDataOrder("serviceitems",array('status' => 1),"id","ASC");
		$blogs=$this->home_model->getBlogTotalInfo($blog);
		$data["blogs"]=$blogs;
		$this->load->view('getvalues',$data);
	}

		
	public function storeContactInfo()
	{
		$firstname=$this->input->post('cName');
		$email=$this->input->post('cEmail');
		$phone=$this->input->post('cMobile');
		$message=$this->input->post('cMessage');
		
		$params = array(
			'cName'=>$firstname,
			'cEmail'=>$phone,
			'cMobile'=>$email,
			'cMessage'=>$message,
			'createDate' => @date("Y-m-d H:i:s"),	
		);
		$table = "enquiries";
		
		$stored=$this->sql->storeItems("enquiries",$params);
		
		if($stored > 0)
		{
			$from=$email;
			$superadmin=$this->sql->getTableRowData("contact",array('status' => 1));
			$to=$superadmin[0]->cEmail;
			//echo $to; die();
			$subject="contact";
			
			 $message = '<table  border="1" style="text-align:center;"><tr><td style="padding: 15px;">Name:</td><td style="padding: 15px;">'.$firstname.' </td></tr><tr><td style="padding: 15px;">Telephone:</td><td style="padding: 15px;">'.$phone.'</td></tr><tr><td style="padding: 15px;">Email :</td><td style="padding: 15px;">'.$email.'</td></tr><tr><td style="padding: 15px;">Message:</td><td style="padding: 15px;">'.$message.'</td></tr></table>'; 
			
			
			//echo $message;die();
			$send=$this->_send($to,$from,$subject,$message);
			
			
			$success_banners=array(
					'scontact' => "Succesfully Submitted. We will contact you soon"
			);
			$this->session->set_userdata($success_banners);
			redirect(base_url()."index.php/home/contact");
		}
		else{
			
			$err_banners=array(
					'fcontact' => "Failed to Submit. Please Try Again"
				);
			$this->session->set_userdata($err_banners);
			redirect(base_url()."index.php/home/contact");			
		}
	}
	
	public function _send($to,$from,$subject,$message)
	{
		$config = Array(
			  'mailtype' => 'html', 
			  'charset' => 'utf-8',
			  'wordwrap' => TRUE
		);
		  //print_r($to);die();
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from($from);
		$this->email->to($to); 
		$this->email->subject($subject);		
		$this->email->message($message);		
		$this->email->send();		
	}
	
	
	
	
	
	
}

/* End of file users.php */
/* Location: ./application/modules/users/controllers/users.php */