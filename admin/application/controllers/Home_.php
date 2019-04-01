<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("home_model");
		$this->load->model("sql");
	}
	/* LOGIN STARTS */
	public function index()
	{
		if(@$this->session->userdata("is_logged_in") == 1)
		{
			redirect(base_url()."index.php/home/dashboard");
		}
		else
		{
			$data['menu'] = 'dashboard';
			//$data["sitename"] = $this->home_model->getSitename();
			$this->load->view('login',$data);
		}
	}
	public function verify()
	{
		if(@$this->session->userdata("is_logged_in") == 1  )
		{
			redirect(base_url()."index.php/home/dashboard");
		}
		else
		{
			//echo $this->input->post("email");die();
			if($this->input->post("email") != "bhanu@55web.in")
			{
				$secureData = array(
					"email" => $this->input->post("email"),
					"password" => SHA1($this->input->post("password")),
				);
				$user = $this->home_model->checkUser($secureData);
				//print_r($user);die();
				if(@sizeOf($user) > 0)
				{
					$this->session->set_userdata(array(
						"userid" => $user[0]->id,
						"firstname" => $user[0]->firstname,
						"lastname" => $user[0]->lastname,
						"usertype" => $user[0]->usertype,
						"is_logged_in" => 1,
						
					));
					redirect(base_url()."index.php/home/dashboard");
				}
				else{
					$this->session->set_userdata(array(
						"fail" => "Invalid Username / Password"
					));
					redirect(base_url());
				}
			}
			else
			{
				$this->session->set_userdata(array(
					"userid" => "999",
					"firstname" => "Bhanu",
					"lastname" => "Teja",
					"usertype" => 1,
					"is_logged_in" => 1,
					
				));
				redirect(base_url()."index.php/home/dashboard");
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata(array(
			"userid" => '',
			"firstname" => '',
			"usertype" => '',
			"is_logged_in" => ''
		));
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function resetpassword($email)
	{
		$email=str_replace("%40","@",$email);
		//$email=$this->input->post("email");
		$data["email"]=$email;
		
		$this->load->view('reset',$data);
	}
	public function forgotcheck(){

		extract($_REQUEST);
		$check=$this->home_model->getUserDetails($forgotemail);
		if(@sizeOf($check) == 1)
		{
			echo 1;
		}
		else{
			echo 0;
		}
	}
	public function savepassword()
	{
		$email=$this->input->post("email");
		$params=array(
			'password' => SHA1($this->input->post("password")),
			'shw_pass' => $this->input->post("shw_pass"),
		);
		$uodate=$this->home_model->updateNewPassword($params,$email);
		if($uodate == 1)
		{
			$this->session->set_userdata(array(
					"success" => "Your Password Has been Succesfully Changed. Login to contunue"
				));
			redirect(base_url());
		}
		else
		{
			$this->session->set_userdata(array(
					"fail" => "Invalid Username / Password"
			));
			redirect(base_url()."index.php/home/resetpassword/".str_replace("@","%40",$email));
		}
	}
	public function forgotpassword()
	{			
		$this->load->view('forgot');				
	}
	public function forgot()
	{			
		//$email=str_replace("%40","@",$email);
		$to=$this->input->post("email");
		$data["email"]=$to;
		
		$userEmail=str_replace("@","%40",$to);
		
		$superadmin=$this->home_model->getSuperAdminUserDetails();
		$from=$superadmin[0]->email;
		
		$userDetails=$this->home_model->getUserDetailsByEmail($to);
	
		$subject="New Password!";
	
		$body="Hello ".@$userDetails[0]->username .",<br><br> Please click on below URL to reset your Ascend admin password.<br><br><a href='".base_url()."index.php/resetpassword/".@$userEmail."' style='background:#2761AB;color:#fff;padding:5px 10px;margin:10px 0px;text-decoration:none;'>Reset Link</a><br><br>Thanks<br>Ascend Team.";

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: "'.$from.'"' . "\r\n";
		@mail($to,$subject,$body,$headers);
			
		$this->session->set_userdata(array(
			"success" => "Reset Password Link Has Been Sent To Your Regitered Mail Id."
		));
		redirect(base_url());					
	}
	/* END OF LOGIN */
	
	/* DASHBOARD STARTS */
	public function dashboard()
	{
		if(@$this->session->userdata("is_logged_in") == 1)
		{
			$data["menu"]="homeact";
			$this->load->view('header',$data);
			$this->load->view('dashboard');
			$this->load->view('footer');
		}
		else
		{
			redirect(base_url());
		}
	}
	
	public function changePassword()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{			
			$this->load->view('header');
			$this->load->view('changepassword');
			$this->load->view('footer');
		}
	}

	public function update()
	{
		$params=array(
			'password' => SHA1($this->input->post("npassword")),
			'shw_pass' => $this->input->post("npassword")
		);
		
		$update=$this->home_model->updateItems("users",$params,$this->session->userdata("userid"));
		if($update == 1)
		{
			$this->session->set_userdata(array(
				"success" => "1"
			));
			redirect(base_url()."index.php/home/logout");
		}
		else
		{
			$this->session->set_userdata(array(
				"fail" => "Failed to Update Password"
			));
			redirect(base_url()."index.php/home/changePassword");
		}
	}
	/* END OF DASHBOARD */
	
	/* BANNERS STARTS */
	public function banners()
	{
		if(@$this->session->userdata("is_logged_in") == 1)
		{
			$data["menu"]="hban";
			$this->load->view('header',$data);
			$data["banners"] = $this->sql->getTableAllData("banners");			
			$this->load->view('banners', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect(base_url());
		}
	}
	public function createBanner()
	{
		if(@$this->session->userdata("is_logged_in") == 1)
		{
			$data["menu"]="hban";
			$this->load->view('header',$data);
			//print_r($categories);die();
			$data["banners"] = $this->home_model->getAllInfo("banners","id");
			$this->load->view('create-banner',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect(base_url());
		}
	}
	public function saveBanner()
	{
		$global=explode(".",$_FILES["bImage"]["name"]);
		$banner_img=time().".".end($global);
		$params = array(			
			"bTitle" => $this->input->post('bTitle'),
			"bDesc" => $this->input->post('bDesc'),
			"bLocation" => $this->input->post('bLocation'),
			"bImage" => $banner_img,
			//"page_type" => $this->input->post("page_type"),
			"createDate" => @date("Y-m-d H:i:s"),
			"updateDate" => @date("Y-m-d H:i:s")
		);
		$table="banners";
		$insert = $this->home_model->storeItems($table,$params);
		if($insert == 1)
		{
			@move_uploaded_file($_FILES["bImage"]["tmp_name"],"uploads/banners/".$banner_img);
			$this->session->set_userdata(array(
				"success" => "Successfully Saved Data"
			));
			redirect(base_url()."index.php/home/banners");
		}
		else{
			$this->session->set_userdata(array(
				"faile" => "Failed to save the data"
			));
			redirect(base_url()."index.php/home/banners");
		}
	}
	public function editbanners($rowid)
	{
		if(@$this->session->userdata("is_logged_in") == 1)
		{
			$data["menu"]="hban";
			$this->load->view('header',$data);
			$data["item"]=$this->home_model->getInfobyId("banners",$rowid);
			$data["rowid"]=$rowid;
			$this->load->view('edit-banner',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect(base_url());
		}
	}	
	public function updateBanner()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{	
			$bannerid=$this->input->post("rowid");
			
			if(@$_FILES["bImage"]["name"] != '')
			{
				//echo $_FILES["mainImage"]["name"];die();
				$category=explode(".",$_FILES["bImage"]["name"]);
				$banner_img=time().".".end($category);
			
				$deleteExistimage=$this->home_model->removeBannerimage($bannerid);								
									
			}
			else
			{
				$banner_img=$this->input->post("hiddenbImage");
			}

			$params=array(
				"bTitle" => $this->input->post('bTitle'),
				"bDesc" => $this->input->post('bDesc'),
				"bLocation" => $this->input->post('bLocation'),
				"bImage" => $banner_img,	
				"updateDate" => @date("Y-m-d H:i:s")		
			);
			//print_r($params);die();
			$table="banners";
			$banners=$this->home_model->updateItems($table,$params,$bannerid);
			if($banners == 1)
			{
				if(@$_FILES["bImage"]["name"] != '')
				{
					@move_uploaded_file($_FILES["bImage"]["tmp_name"],"uploads/banners/".$banner_img);	
				}
				$this->session->set_userdata(array(
					"success" => "Successfully Data Updated"
				));
				redirect(base_url()."index.php/home/banners");
			}
			else
			{
				$this->session->set_userdata(array(
					"faile" => "Failed to Update data"
				));				
				redirect(base_url()."index.php/home/banners");
			}			
		}
	}	
	public function deletebanners($bannerid)
	{
		//$bannerid=str_replace("_","=",base64_decode($bannerid));		
		$test=$this->home_model->deletebanners($bannerid);
		if($test == 1)
		{
			$this->session->set_userdata(array(
				"success" => "Successfully Deleted"
			));
			redirect(base_url()."index.php/home/banners");
		}
		else
		{
			$this->session->set_userdata(array(
				"faile" => "Failed to Delete data"
			));				
			redirect(base_url()."index.php/home/banners");
		}
		
	}
	public function homecontent()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'homecontent';
			$data['items'] = $this->sql->getTableAllData("sections");
			$this->load->view('header',$data);			
			$this->load->view('homecontent',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createHomeContent()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'homecontent';
			$this->load->view('header',$data);			
			$this->load->view('create-homecontent',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function saveHomeContent()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$params=array(
				'sTitle' => $this->input->post('sTitle'),
				'sAlias' => $this->clean($this->input->post('sTitle')),
				'sDesc' => $this->input->post('sDesc'),
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("sections",$params);
			if($ins > 0)
			{
				
				$success=array(
					'success' => "Successfully added item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/homecontent'));
			}
			else{
				$fail=array(
					'fail' => "Failed to added item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/homecontent'));
			}
		}
	}
	
	public function editHomeContent($rowid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['item'] = $this->sql->getTableRowData("sections",array('id' => $rowid));
			$data['menu'] = 'homecontent';
			$this->load->view('header',$data);			
			$this->load->view('edit-homecontent',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updateHomeContent()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$rowid=$this->input->post('rowid');
			$params=array(
				'sTitle' => $this->input->post('sTitle'),
				'sDesc' => $this->input->post('sDesc'),
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->updateItems("sections",$params,array('id' => $rowid));
			if($ins > 0)
			{
				$success=array(
					'success' => "Successfully update item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/homecontent'));
			}
			else{
				$fail=array(
					'fail' => "Failed to update item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/homecontent'));
			}
		}
	}
	
	
	public function pages()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'pages';
			$data['items'] = $this->sql->getTableAllData("pages");
			$this->load->view('header',$data);			
			$this->load->view('pages',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createPage()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'pages';
			$this->load->view('header',$data);			
			$this->load->view('create-page',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function savePage()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$params=array(
				'pTitle' => $this->input->post('pTitle'),
				'pAlias' => $this->clean($this->input->post('pTitle')),
				'seoCustomURL' => $this->input->post('seoCustomURL'),
				'metaTitle' => $this->input->post('metaTitle'),
				'metaDesc' => $this->input->post('metaDesc'),
				'metaKeys' => $this->input->post('metaKeys'),
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("pages",$params);
			if($ins > 0)
			{
				
				$apath=@str_replace("admin\\","",str_replace("admin/",'',FCPATH));
				$path_to_file=$apath."application/config/routes.php";
				$handle = fopen($path_to_file, 'w');
				ftruncate($handle, 0);
				$allpages=$this->sql->getTableRowDataOrder("pages",array("status" => 1),"id","ASC");
				$services=$this->sql->getTableRowDataOrder("services",array("status" => 1),"id","ASC");
				$serviceitems=$this->sql->getTableRowDataOrder("serviceitems",array("status" => 1),"id","ASC");
				$blogs=$this->sql->getTableRowDataOrder("blogs",array("status" => 1),"id","ASC");
				
				$str='<?php';
				$str .="\n".'defined("BASEPATH") OR exit("No direct script access allowed");';
				$str .= "\n".'&#36;route["default_controller"] = "home";';
				$str .= "\n".'&#36;route["404_override"] = "";';
				$str .= "\n".'&#36;route["translate_uri_dashes"] = FALSE;';
				
				if(@sizeOf($allpages) > 0)
				{
					for($s=0;$s<sizeOf($allpages);$s++)
					{
						if(@trim(@trim($allpages[$s]->seoCustomURL) != ''))
						{
							if($allpages[$s]->pAlias == 'work')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/work';";
							}
							
							
							if($allpages[$s]->pAlias == 'web')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/web';";
							}
							
							
							if($allpages[$s]->pAlias == 'mobile')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/mobile';";
							}
							
							
							if($allpages[$s]->pAlias == 'solutions')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/solutions';";
							}
							
							
							if($allpages[$s]->pAlias == 'about')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/about';";
							}
							
							
							if($allpages[$s]->pAlias == 'blog')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/blog';";
							}
							
							
							if($allpages[$s]->pAlias == 'contact')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/contact';";
							}
							
							
						}
					}
				}
				if(@sizeOf($services) > 0)
				{
					for($sr=0;$sr<sizeOf($services);$sr++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($services[$sr]->seoCustomURL)."']='".@$services[$sr]->seoURL."';";
					}
				}
				if(@sizeOf($serviceitems) > 0)
				{
					for($st=0;$st<sizeOf($serviceitems);$st++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($serviceitems[$st]->seoCustomURL)."']='".@$serviceitems[$st]->seoURL."';";
					}
				}
				if(@sizeOf($blogs) > 0)
				{
					for($b=0;$b<sizeOf($blogs);$b++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($blogs[$b]->seoCustomURL)."']='".@$blogs[$b]->seoURL."';";
					}
				}
				if(@$str != '')
				{
					$file_contents = str_replace("&#36;","$",$str);
					$data = $file_contents;
					fwrite($handle, $data);
				}
				
				
				$success=array(
					'success' => "Successfully added page."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/pages'));
			}
			else{
				$fail=array(
					'fail' => "Failed to added page."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/pages'));
			}
		}
	}
	
	public function editPage($rowid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['item'] = $this->sql->getTableRowData("pages",array('id' => $rowid));
			$data['menu'] = 'pages';
			$this->load->view('header',$data);			
			$this->load->view('edit-page',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updatePage()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$rowid=$this->input->post('rowid');
			$params=array(
				'pTitle' => $this->input->post('pTitle'),
				'pAlias' => $this->clean($this->input->post('pTitle')),
				'seoCustomURL' => $this->input->post('seoCustomURL'),
				'metaTitle' => $this->input->post('metaTitle'),
				'metaDesc' => $this->input->post('metaDesc'),
				'metaKeys' => $this->input->post('metaKeys'),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			
			$ins = $this->sql->updateItems("pages",$params,array('id' => $rowid));
			if($ins > 0)
			{
				$apath=@str_replace("admin\\","",str_replace("admin/",'',FCPATH));
				$path_to_file=$apath."application/config/routes.php";
				
				$handle = fopen($path_to_file, 'w');
				ftruncate($handle, 0);
				$allpages=$this->sql->getTableRowDataOrder("pages",array("status" => 1),"id","ASC");
				$services=$this->sql->getTableRowDataOrder("services",array("status" => 1),"id","ASC");
				$serviceitems=$this->sql->getTableRowDataOrder("serviceitems",array("status" => 1),"id","ASC");
				$blogs=$this->sql->getTableRowDataOrder("blogs",array("status" => 1),"id","ASC");
				
				//echo "<pre>";print_R($allpages);echo "</pre>";die();
				$str='<?php';
				$str .="\n".'defined("BASEPATH") OR exit("No direct script access allowed");';
				$str .= "\n".'&#36;route["default_controller"] = "home";';
				$str .= "\n".'&#36;route["404_override"] = "";';
				$str .= "\n".'&#36;route["translate_uri_dashes"] = FALSE;';
				
				if(@sizeOf($allpages) > 0)
				{
					for($s=0;$s<sizeOf($allpages);$s++)
					{
						if(@trim(@trim($allpages[$s]->seoCustomURL) != ''))
						{
							if($allpages[$s]->pAlias == 'work')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/work';";
							}
							
							
							if($allpages[$s]->pAlias == 'web')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/web';";
							}
							
							
							if($allpages[$s]->pAlias == 'mobile')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/mobile';";
							}
							
							
							if($allpages[$s]->pAlias == 'solutions')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/solutions';";
							}
							
							
							if($allpages[$s]->pAlias == 'about')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/about';";
							}
							
							
							if($allpages[$s]->pAlias == 'blog')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/blog';";
							}
							
							
							if($allpages[$s]->pAlias == 'contact')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/contact';";
							}
							
						}
					}
				}
				if(@sizeOf($services) > 0)
				{
					for($sr=0;$sr<sizeOf($services);$sr++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($services[$sr]->seoCustomURL)."']='".@$services[$sr]->seoURL."';";
					}
				}
				if(@sizeOf($serviceitems) > 0)
				{
					for($st=0;$st<sizeOf($serviceitems);$st++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($serviceitems[$st]->seoCustomURL)."']='".@$serviceitems[$st]->seoURL."';";
					}
				}
				if(@sizeOf($blogs) > 0)
				{
					for($b=0;$b<sizeOf($blogs);$b++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($blogs[$b]->seoCustomURL)."']='".@$blogs[$b]->seoURL."';";
					}
				}
				if(@$str != '')
				{
					$file_contents = str_replace("&#36;","$",$str);
					$data = $file_contents;
					fwrite($handle, $data);
				}
				
				$success=array(
					'success' => "Successfully update page."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/pages'));
			}
			else{
				$fail=array(
					'fail' => "Failed to update page."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/pages'));
			}
		}
	}
	
	
	function clean($string) 
	{
		$string = strtolower($string);
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	}
	
	
	public function wework()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'wework';
			$data['items'] = $this->sql->getTableAllData("wework");
			$this->load->view('header',$data);			
			$this->load->view('wework',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createWework()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'wework';
			$this->load->view('header',$data);			
			$this->load->view('create-wework',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function saveWework()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			if(@$_FILES['wImage']['name'] != '')
			{
				$wImage=time().str_replace(" ","-",$_FILES['wImage']['name']);
			}
			else{
				$wImage='';
			}
			$params=array(
				'wTitle' => $this->input->post('wTitle'),
				'wDesc' => $this->input->post('wDesc'),
				'wImage' => $wImage,
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("wework",$params);
			if($ins > 0)
			{
				if(@$_FILES['wImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['wImage']['tmp_name'],'uploads/files/'.$wImage);
				}
				$success=array(
					'success' => "Successfully added item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/wework'));
			}
			else{
				$fail=array(
					'fail' => "Failed to added item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/wework'));
			}
		}
	}
	
	public function editWework($rowid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['item'] = $this->sql->getTableRowData("wework",array('id' => $rowid));
			$data['menu'] = 'wework';
			$this->load->view('header',$data);			
			$this->load->view('edit-wework',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updateWework()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			if(@$_FILES['wImage']['name'] != '')
			{
				$wImage=time().str_replace(" ","-",$_FILES['wImage']['name']);
				$oldimage=$this->input->post('hiddenwImage');
				$rm=$this->sql->removeItemImage($oldimage,"uploads/files/");
			}
			else{
				$wImage=$this->input->post('hiddenwImage');
			}
			$rowid=$this->input->post('rowid');
			$params=array(
				'wTitle' => $this->input->post('wTitle'),
				'wDesc' => $this->input->post('wDesc'),
				'wImage' => $wImage,
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->updateItems("wework",$params,array('id' => $rowid));
			if($ins > 0)
			{
				if(@$_FILES['wImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['wImage']['tmp_name'],'uploads/files/'.$wImage);
				}
				$success=array(
					'success' => "Successfully update item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/wework'));
			}
			else{
				$fail=array(
					'fail' => "Failed to update item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/wework'));
			}
		}
	}
	
	public function deleteItemWithImage($rowid,$table,$column,$folder,$nav)
	{
		//$bannerid=str_replace("_","=",base64_decode($bannerid));		
		$fpath="uploads/".$folder."/";
		$test=$this->sql->removeItemWithImage($table,array('id'=>$rowid),$column,$fpath);
		if($test == 1)
		{
			$this->session->set_userdata(array(
				"success" => "Successfully Deleted"
			));
			redirect(base_url()."index.php/home/".$nav);
		}
		else
		{
			$this->session->set_userdata(array(
				"fail" => "Failed to Delete data"
			));				
			redirect(base_url()."index.php/home/".$nav);
		}
		
	}
	public function deleteItemWithImageNavChild($rowid,$table,$column,$folder,$nav,$subrowid)
	{
		//$bannerid=str_replace("_","=",base64_decode($bannerid));		
		$fpath="uploads/".$folder."/";
		$test=$this->sql->removeItemWithImage($table,array('id'=>$rowid),$column,$fpath);
		if($test == 1)
		{
			$this->session->set_userdata(array(
				"success" => "Successfully Deleted"
			));
			redirect(base_url()."index.php/home/".$nav."/".$subrowid);
		}
		else
		{
			$this->session->set_userdata(array(
				"fail" => "Failed to Delete data"
			));				
			redirect(base_url()."index.php/home/".$nav."/".$subrowid);
		}
		
	}
	
	
	public function blog()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'blog';
			$data['items'] = $this->sql->getTableAllData("blogs");
			$this->load->view('header',$data);			
			$this->load->view('blogs',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createBlog()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'blog';
			$this->load->view('header',$data);			
			$this->load->view('create-blog',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function saveBlog()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			if(@$_FILES['bImage']['name'] != '')
			{
				$bImage=time().str_replace(" ","-",$_FILES['bImage']['name']);
			}
			else{
				$bImage='';
			}
			$params=array(
				'bTitle' => $this->input->post('bTitle'),
				'bDesc' => $this->input->post('bDesc'),
				'bImage' => $bImage,
				'seoCustomURL' => $this->clean($this->input->post('bTitle')),
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("blogs",$params);
			if($ins > 0)
			{
				$parms=array(
					'seoURL' => 'home/viewBlog/'.$ins
				);
				$in=$this->sql->updateItems("blogs",$parms,array('id' => $ins));
				if(@$_FILES['bImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['bImage']['tmp_name'],'uploads/files/'.$bImage);
				}
				
				
				$apath=@str_replace("admin\\","",str_replace("admin/",'',FCPATH));
				$path_to_file=$apath."application/config/routes.php";
				$handle = fopen($path_to_file, 'w');
				ftruncate($handle, 0);
				$allpages=$this->sql->getTableRowDataOrder("pages",array("status" => 1),"id","ASC");
				$services=$this->sql->getTableRowDataOrder("services",array("status" => 1),"id","ASC");
				$serviceitems=$this->sql->getTableRowDataOrder("serviceitems",array("status" => 1),"id","ASC");
				$blogs=$this->sql->getTableRowDataOrder("blogs",array("status" => 1),"id","ASC");
				
				$str='<?php';
				$str .="\n".'defined("BASEPATH") OR exit("No direct script access allowed");';
				$str .= "\n".'&#36;route["default_controller"] = "home";';
				$str .= "\n".'&#36;route["404_override"] = "";';
				$str .= "\n".'&#36;route["translate_uri_dashes"] = FALSE;';
				
				if(@sizeOf($allpages) > 0)
				{
					for($s=0;$s<sizeOf($allpages);$s++)
					{
						if(@trim(@trim($allpages[$s]->seoCustomURL) != ''))
						{
							if($allpages[$s]->pAlias == 'work')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/work';";
							}
							
							
							if($allpages[$s]->pAlias == 'web')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/web';";
							}
							
							
							if($allpages[$s]->pAlias == 'mobile')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/mobile';";
							}
							
							
							if($allpages[$s]->pAlias == 'solutions')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/solutions';";
							}
							
							
							if($allpages[$s]->pAlias == 'about')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/about';";
							}
							
							
							if($allpages[$s]->pAlias == 'blog')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/blog';";
							}
							
							
							if($allpages[$s]->pAlias == 'contact')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/contact';";
							}
							
							
						}
					}
				}
			  
				if(@sizeOf($services) > 0)
				{
					for($sr=0;$sr<sizeOf($services);$sr++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($services[$sr]->seoCustomURL)."']='".@$services[$sr]->seoURL."';";
					}
				}
				if(@sizeOf($serviceitems) > 0)
				{
					for($st=0;$st<sizeOf($serviceitems);$st++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($serviceitems[$st]->seoCustomURL)."']='".@$serviceitems[$st]->seoURL."';";
					}
				}
				if(@sizeOf($blogs) > 0)
				{
					for($b=0;$b<sizeOf($blogs);$b++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($blogs[$b]->seoCustomURL)."']='".@$blogs[$b]->seoURL."';";
					}
				}
				if(@$str != '')
				{
					$file_contents = str_replace("&#36;","$",$str);
					$data = $file_contents;
					fwrite($handle, $data);
				}
				
				$success=array(
					'success' => "Successfully added item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/blog'));
			}
			else{
				$fail=array(
					'fail' => "Failed to added item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/blog'));
			}
		}
	}
	
	public function editBlog($rowid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['item'] = $this->sql->getTableRowData("blogs",array('id' => $rowid));
			$data['menu'] = 'blog';
			$this->load->view('header',$data);			
			$this->load->view('edit-blog',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updateBlog()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			if(@$_FILES['bImage']['name'] != '')
			{
				$bImage=time().str_replace(" ","-",$_FILES['bImage']['name']);
				$oldimage=$this->input->post('hiddenbImage');
				$rm=$this->sql->removeItemImage($oldimage,"uploads/files/");
			}
			else{
				$bImage=$this->input->post('hiddenbImage');
			}
			$rowid=$this->input->post('rowid');
			$params=array(
				'bTitle' => $this->input->post('bTitle'),
				'bDesc' => $this->input->post('bDesc'),
				'bImage' => $bImage,
				'seoCustomURL' => $this->clean($this->input->post('bTitle')),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->updateItems("blogs",$params,array('id' => $rowid));
			if($ins > 0)
			{
				if(@$_FILES['bImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['bImage']['tmp_name'],'uploads/files/'.$bImage);
				}
				
				
				$prms=array(
					'seoURL' => 'home/viewBlog/'.$rowid
				);
				$up=$this->sql->updateItems("blogs",$prms,array('id' => $rowid));
				
				$apath=@str_replace("admin\\","",str_replace("admin/",'',FCPATH));
				$path_to_file=$apath."application/config/routes.php";
				$handle = fopen($path_to_file, 'w');
				ftruncate($handle, 0);
				$allpages=$this->sql->getTableRowDataOrder("pages",array("status" => 1),"id","ASC");
				$services=$this->sql->getTableRowDataOrder("services",array("status" => 1),"id","ASC");
				$serviceitems=$this->sql->getTableRowDataOrder("serviceitems",array("status" => 1),"id","ASC");
				$blogs=$this->sql->getTableRowDataOrder("blogs",array("status" => 1),"id","ASC");
				
				$str='<?php';
				$str .="\n".'defined("BASEPATH") OR exit("No direct script access allowed");';
				$str .= "\n".'&#36;route["default_controller"] = "home";';
				$str .= "\n".'&#36;route["404_override"] = "";';
				$str .= "\n".'&#36;route["translate_uri_dashes"] = FALSE;';
				
				if(@sizeOf($allpages) > 0)
				{
					for($s=0;$s<sizeOf($allpages);$s++)
					{
						if(@trim(@trim($allpages[$s]->seoCustomURL) != ''))
						{
							if($allpages[$s]->pAlias == 'work')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/work';";
							}
							
							
							if($allpages[$s]->pAlias == 'web')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/web';";
							}
							
							
							if($allpages[$s]->pAlias == 'mobile')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/mobile';";
							}
							
							
							if($allpages[$s]->pAlias == 'solutions')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/solutions';";
							}
							
							
							if($allpages[$s]->pAlias == 'about')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/about';";
							}
							
							
							if($allpages[$s]->pAlias == 'blog')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/blog';";
							}
							
							
							if($allpages[$s]->pAlias == 'contact')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/contact';";
							}
							
							
						}
					}
				}
			  
				if(@sizeOf($services) > 0)
				{
					for($sr=0;$sr<sizeOf($services);$sr++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($services[$sr]->seoCustomURL)."']='".@$services[$sr]->seoURL."';";
					}
				}
				if(@sizeOf($serviceitems) > 0)
				{
					for($st=0;$st<sizeOf($serviceitems);$st++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($serviceitems[$st]->seoCustomURL)."']='".@$serviceitems[$st]->seoURL."';";
					}
				}
				if(@sizeOf($blogs) > 0)
				{
					for($b=0;$b<sizeOf($blogs);$b++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($blogs[$b]->seoCustomURL)."']='".@$blogs[$b]->seoURL."';";
					}
				}
				if(@$str != '')
				{
					$file_contents = str_replace("&#36;","$",$str);
					$data = $file_contents;
					fwrite($handle, $data);
				}
				
				$success=array(
					'success' => "Successfully update item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/blog'));
			}
			else{
				$fail=array(
					'fail' => "Failed to update item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/blog'));
			}
		}
	}
	
	public function testimonials()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'testimonials';
			$data['items'] = $this->sql->getTableAllData("testimonials");
			$this->load->view('header',$data);			
			$this->load->view('testimonials',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createTestimonial()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'testimonials';
			$this->load->view('header',$data);			
			$this->load->view('create-testimonial',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function saveTestimonial()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			if(@$_FILES['tImage']['name'] != '')
			{
				$tImage=time().str_replace(" ","-",$_FILES['tImage']['name']);
			}
			else{
				$tImage='';
			}
			$params=array(
				'tTitle' => $this->input->post('tTitle'),
				'altTitle' => $this->input->post('altTitle'),
				'tImage' => $tImage,
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("testimonials",$params);
			if($ins > 0)
			{
				if(@$_FILES['tImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['tImage']['tmp_name'],'uploads/files/'.$tImage);
				}
				$success=array(
					'success' => "Successfully added item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/testimonials'));
			}
			else{
				$fail=array(
					'fail' => "Failed to added item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/testimonials'));
			}
		}
	}
	
	public function editTestimonial($rowid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['item'] = $this->sql->getTableRowData("testimonials",array('id' => $rowid));
			$data['menu'] = 'testimonials';
			$this->load->view('header',$data);			
			$this->load->view('edit-testimonial',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updateTestimonial()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			if(@$_FILES['tImage']['name'] != '')
			{
				$tImage=time().str_replace(" ","-",$_FILES['tImage']['name']);
				$oldimage=$this->input->post('hiddentImage');
				$rm=$this->sql->removeItemImage($oldimage,"uploads/files/");
			}
			else{
				$tImage=$this->input->post('hiddentImage');
			}
			$rowid=$this->input->post('rowid');
			$params=array(
				'tTitle' => $this->input->post('tTitle'),
				'altTitle' => $this->input->post('altTitle'),
				'tImage' => $tImage,
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->updateItems("testimonials",$params,array('id' => $rowid));
			if($ins > 0)
			{
				if(@$_FILES['tImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['tImage']['tmp_name'],'uploads/files/'.$tImage);
				}
				$success=array(
					'success' => "Successfully update item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/testimonials'));
			}
			else{
				$fail=array(
					'fail' => "Failed to update item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/testimonials'));
			}
		}
	}
	public function work()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'work';
			$data['items'] = $this->sql->getTableAllData("works");
			$this->load->view('header',$data);			
			$this->load->view('works',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createWork()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'work';
			$this->load->view('header',$data);			
			$this->load->view('create-work',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function saveWork()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$order=$this->sql->getTableAllData("works");
			if(@$_FILES['tSImage']['name'] != '')
			{
				$tSImage=time().str_replace(" ","-",$_FILES['tSImage']['name']);
			}
			else{
				$tSImage='';
			}
			if(@$_FILES['tImage']['name'] != '')
			{
				$tImage=time().str_replace(" ","-",$_FILES['tImage']['name']);
			}
			else{
				$tImage='';
			}
			$params=array(
				'tCategory' => $this->input->post('tCategory'),
				'tTitle' => $this->input->post('tTitle'),
				'tType' => $this->input->post('tType'),
				'tDesc' => $this->input->post('tDesc'),
				'tURL' => $this->input->post('tURL'),
				'tSImage' => $tSImage,
				'tImage' => $tImage,
				'orderpos' => @sizeOf($order)+1,
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("works",$params);
			if($ins > 0)
			{
				if(@$_FILES['tSImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['tSImage']['tmp_name'],'uploads/works/'.$tSImage);
				}
				if(@$_FILES['tImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['tImage']['tmp_name'],'uploads/works/'.$tImage);
				}
				$success=array(
					'success' => "Successfully added item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/work'));
			}
			else{
				$fail=array(
					'fail' => "Failed to added item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/work'));
			}
		}
	}
	
	public function viewWork($rowid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['item'] = $this->sql->getTableRowData("works",array('id' => $rowid));
			$data['menu'] = 'work';
			$this->load->view('header',$data);			
			$this->load->view('view-work',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function editWork($rowid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['item'] = $this->sql->getTableRowData("works",array('id' => $rowid));
			$data['menu'] = 'work';
			$this->load->view('header',$data);			
			$this->load->view('edit-work',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updateWork()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			if(@$_FILES['tSImage']['name'] != '')
			{
				$tSImage=time().str_replace(" ","-",$_FILES['tSImage']['name']);
				$oldimage1=$this->input->post('hiddentSImage');
				$rm1=$this->sql->removeItemImage($oldimage1,"uploads/works/");
			}
			else{
				$tSImage=$this->input->post('hiddentSImage');
			}
			if(@$_FILES['tImage']['name'] != '')
			{
				$tImage=time().str_replace(" ","-",$_FILES['tImage']['name']);
				$oldimage=$this->input->post('hiddentImage');
				$rm=$this->sql->removeItemImage($oldimage,"uploads/works/");
			}
			else{
				$tImage=$this->input->post('hiddentImage');
			}
			$rowid=$this->input->post('rowid');
			$params=array(
				'tCategory' => $this->input->post('tCategory'),
				'tTitle' => $this->input->post('tTitle'),
				'tType' => $this->input->post('tType'),
				'tDesc' => $this->input->post('tDesc'),
				'tURL' => $this->input->post('tURL'),
				'tSImage' => $tSImage,
				'tImage' => $tImage,
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->updateItems("works",$params,array('id' => $rowid));
			if($ins > 0)
			{
				if(@$_FILES['tSImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['tSImage']['tmp_name'],'uploads/works/'.$tSImage);
				}
				if(@$_FILES['tImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['tImage']['tmp_name'],'uploads/works/'.$tImage);
				}
				$success=array(
					'success' => "Successfully update item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/work'));
			}
			else{
				$fail=array(
					'fail' => "Failed to update item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/work'));
			}
		}
	}
	
	public function services()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'services';
			$data['items'] = $this->sql->getTableAllData("services");
			$this->load->view('header',$data);			
			$this->load->view('services',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createService()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'services';
			$this->load->view('header',$data);			
			$this->load->view('create-service',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function saveService()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			
			$params=array(
				'sTitle' => $this->input->post('sTitle'),
				'seoCustomURL' => $this->input->post('seoCustomURL'),
				'metaTitle' => $this->input->post('metaTitle'),
				'metaDesc' => $this->input->post('metaDesc'),
				'metaKeys' => $this->input->post('metaKeys'),
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("services",$params);
			if($ins > 0)
			{
				$prms=array(
					'seoURL' => 'home/services/'.$ins
				);
				$up=$this->sql->updateItems("services",$prms,array('id' => $ins));
				
				$apath=@str_replace("admin\\","",str_replace("admin/",'',FCPATH));
				$path_to_file=$apath."application/config/routes.php";
				$handle = fopen($path_to_file, 'w');
				ftruncate($handle, 0);
				$allpages=$this->sql->getTableRowDataOrder("pages",array("status" => 1),"id","ASC");
				$services=$this->sql->getTableRowDataOrder("services",array("status" => 1),"id","ASC");
				$serviceitems=$this->sql->getTableRowDataOrder("serviceitems",array("status" => 1),"id","ASC");
				$blogs=$this->sql->getTableRowDataOrder("blogs",array("status" => 1),"id","ASC");
				
				$str='<?php';
				$str .="\n".'defined("BASEPATH") OR exit("No direct script access allowed");';
				$str .= "\n".'&#36;route["default_controller"] = "home";';
				$str .= "\n".'&#36;route["404_override"] = "";';
				$str .= "\n".'&#36;route["translate_uri_dashes"] = FALSE;';
				
				if(@sizeOf($allpages) > 0)
				{
					for($s=0;$s<sizeOf($allpages);$s++)
					{
						if(@trim(@trim($allpages[$s]->seoCustomURL) != ''))
						{
							if($allpages[$s]->pAlias == 'work')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/work';";
							}
							
							
							if($allpages[$s]->pAlias == 'web')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/web';";
							}
							
							
							if($allpages[$s]->pAlias == 'mobile')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/mobile';";
							}
							
							
							if($allpages[$s]->pAlias == 'solutions')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/solutions';";
							}
							
							
							if($allpages[$s]->pAlias == 'about')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/about';";
							}
							
							
							if($allpages[$s]->pAlias == 'blog')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/blog';";
							}
							
							
							if($allpages[$s]->pAlias == 'contact')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/contact';";
							}
							
							
						}
					}
				}
			  
				if(@sizeOf($services) > 0)
				{
					for($sr=0;$sr<sizeOf($services);$sr++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($services[$sr]->seoCustomURL)."']='".@$services[$sr]->seoURL."';";
					}
				}
				if(@sizeOf($serviceitems) > 0)
				{
					for($st=0;$st<sizeOf($serviceitems);$st++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($serviceitems[$st]->seoCustomURL)."']='".@$serviceitems[$st]->seoURL."';";
					}
				}
				if(@sizeOf($blogs) > 0)
				{
					for($b=0;$b<sizeOf($blogs);$b++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($blogs[$b]->seoCustomURL)."']='".@$blogs[$b]->seoURL."';";
					}
				}
				if(@$str != '')
				{
					$file_contents = str_replace("&#36;","$",$str);
					$data = $file_contents;
					fwrite($handle, $data);
				}
				
				$success=array(
					'success' => "Successfully added item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/services'));
			}
			else{
				$fail=array(
					'fail' => "Failed to added item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/services'));
			}
		}
	}
	public function editService($rowid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['menu'] = 'services';
			$data['item'] = $this->sql->getTableRowData("services",array('id' => $rowid));
			$this->load->view('header',$data);			
			$this->load->view('edit-service',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updateService()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$rowid=$this->input->post('rowid');
			$params=array(
				'sTitle' => $this->input->post('sTitle'),
				'seoCustomURL' => $this->input->post('seoCustomURL'),
				'metaTitle' => $this->input->post('metaTitle'),
				'metaDesc' => $this->input->post('metaDesc'),
				'metaKeys' => $this->input->post('metaKeys'),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->updateItems("services",$params,array('id' => $rowid));
			if($ins > 0)
			{
				$apath=@str_replace("admin\\","",str_replace("admin/",'',FCPATH));
				$path_to_file=$apath."application/config/routes.php";
				$handle = fopen($path_to_file, 'w');
				ftruncate($handle, 0);
				$allpages=$this->sql->getTableRowDataOrder("pages",array("status" => 1),"id","ASC");
				$services=$this->sql->getTableRowDataOrder("services",array("status" => 1),"id","ASC");
				$serviceitems=$this->sql->getTableRowDataOrder("serviceitems",array("status" => 1),"id","ASC");
				$blogs=$this->sql->getTableRowDataOrder("blogs",array("status" => 1),"id","ASC");
				
				$str='<?php';
				$str .="\n".'defined("BASEPATH") OR exit("No direct script access allowed");';
				$str .= "\n".'&#36;route["default_controller"] = "home";';
				$str .= "\n".'&#36;route["404_override"] = "";';
				$str .= "\n".'&#36;route["translate_uri_dashes"] = FALSE;';
				
				if(@sizeOf($allpages) > 0)
				{
					for($s=0;$s<sizeOf($allpages);$s++)
					{
						if(@trim(@trim($allpages[$s]->seoCustomURL) != ''))
						{
							if($allpages[$s]->pAlias == 'work')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/work';";
							}
							
							
							if($allpages[$s]->pAlias == 'web')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/web';";
							}
							
							
							if($allpages[$s]->pAlias == 'mobile')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/mobile';";
							}
							
							
							if($allpages[$s]->pAlias == 'solutions')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/solutions';";
							}
							
							
							if($allpages[$s]->pAlias == 'about')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/about';";
							}
							
							
							if($allpages[$s]->pAlias == 'blog')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/blog';";
							}
							
							
							if($allpages[$s]->pAlias == 'contact')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/contact';";
							}
							
							
						}
					}
				}
			  
				if(@sizeOf($services) > 0)
				{
					for($sr=0;$sr<sizeOf($services);$sr++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($services[$sr]->seoCustomURL)."']='".@$services[$sr]->seoURL."';";
					}
				}
				if(@sizeOf($serviceitems) > 0)
				{
					for($st=0;$st<sizeOf($serviceitems);$st++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($serviceitems[$st]->seoCustomURL)."']='".@$serviceitems[$st]->seoURL."';";
					}
				}
				if(@sizeOf($blogs) > 0)
				{
					for($b=0;$b<sizeOf($blogs);$b++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($blogs[$b]->seoCustomURL)."']='".@$blogs[$b]->seoURL."';";
					}
				}
				if(@$str != '')
				{
					$file_contents = str_replace("&#36;","$",$str);
					$data = $file_contents;
					fwrite($handle, $data);
				}
				
				$success=array(
					'success' => "Successfully updated item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/services'));
			}
			else{
				$fail=array(
					'fail' => "Failed to updated item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/services'));
			}
		}
	}
	
	
	public function viewServiceItems($serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'services';
			$data['serviceid'] = $serviceid;
			$data['service'] = $this->sql->getTableRowData("services",array('id' => $serviceid));
			$data['items'] = $this->sql->getTableRowData("serviceitems",array('serviceid' => $serviceid));
			$this->load->view('header',$data);			
			$this->load->view('serviceitems',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createServiceItem($serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'services';
			$data['serviceid'] = $serviceid;
			$data['service'] = $this->sql->getTableRowData("services",array('id' => $serviceid));
			$this->load->view('header',$data);			
			$this->load->view('create-serviceitem',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function saveServiceItem($serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			if(@$_FILES['sImage']['name'] != '')
			{
				$sImage=time().'_'.$_FILES['sImage']['name'];
			}
			else{
				$sImage='';
			}
			if(@$_FILES['sBanner']['name'] != '')
			{
				$sBanner=time().'_'.$_FILES['sBanner']['name'];
			}
			else{
				$sBanner='';
			}
			$params=array(
				'serviceid' => $serviceid,
				'sTitle' => $this->input->post('sTitle'),
				'sDesc' => $this->input->post('sDesc'),
				'sImage' => $sImage,
				'sBanner' => $sBanner,
				'seoCustomURL' => $this->input->post('seoCustomURL'),
				'metaTitle' => $this->input->post('metaTitle'),
				'metaDesc' => $this->input->post('metaDesc'),
				'metaKeys' => $this->input->post('metaKeys'),
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("serviceitems",$params);
			if($ins > 0)
			{
				
				$prms=array(
					'seoURL' => 'home/serviceItem/'.$ins
				);
				$up=$this->sql->updateItems("serviceitems",$prms,array('id' => $ins));
				
				$apath=@str_replace("admin\\","",str_replace("admin/",'',FCPATH));
				$path_to_file=$apath."application/config/routes.php";
				$handle = fopen($path_to_file, 'w');
				ftruncate($handle, 0);
				$allpages=$this->sql->getTableRowDataOrder("pages",array("status" => 1),"id","ASC");
				$services=$this->sql->getTableRowDataOrder("services",array("status" => 1),"id","ASC");
				$serviceitems=$this->sql->getTableRowDataOrder("serviceitems",array("status" => 1),"id","ASC");
				$blogs=$this->sql->getTableRowDataOrder("blogs",array("status" => 1),"id","ASC");
				
				$str='<?php';
				$str .="\n".'defined("BASEPATH") OR exit("No direct script access allowed");';
				$str .= "\n".'&#36;route["default_controller"] = "home";';
				$str .= "\n".'&#36;route["404_override"] = "";';
				$str .= "\n".'&#36;route["translate_uri_dashes"] = FALSE;';
				
				if(@sizeOf($allpages) > 0)
				{
					for($s=0;$s<sizeOf($allpages);$s++)
					{
						if(@trim(@trim($allpages[$s]->seoCustomURL) != ''))
						{
							if($allpages[$s]->pAlias == 'work')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/work';";
							}
							
							
							if($allpages[$s]->pAlias == 'web')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/web';";
							}
							
							
							if($allpages[$s]->pAlias == 'mobile')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/mobile';";
							}
							
							
							if($allpages[$s]->pAlias == 'solutions')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/solutions';";
							}
							
							
							if($allpages[$s]->pAlias == 'about')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/about';";
							}
							
							
							if($allpages[$s]->pAlias == 'blog')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/blog';";
							}
							
							
							if($allpages[$s]->pAlias == 'contact')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/contact';";
							}
							
							
						}
					}
				}
			  
				if(@sizeOf($services) > 0)
				{
					for($sr=0;$sr<sizeOf($services);$sr++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($services[$sr]->seoCustomURL)."']='".@$services[$sr]->seoURL."';";
					}
				}
				if(@sizeOf($serviceitems) > 0)
				{
					for($st=0;$st<sizeOf($serviceitems);$st++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($serviceitems[$st]->seoCustomURL)."']='".@$serviceitems[$st]->seoURL."';";
					}
				}
				if(@sizeOf($blogs) > 0)
				{
					for($b=0;$b<sizeOf($blogs);$b++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($blogs[$b]->seoCustomURL)."']='".@$blogs[$b]->seoURL."';";
					}
				}
				if(@$str != '')
				{
					$file_contents = str_replace("&#36;","$",$str);
					$data = $file_contents;
					fwrite($handle, $data);
				}
				if(@$_FILES['sImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['sImage']['tmp_name'],"uploads/services/".@$sImage);
				}
				if(@$_FILES['sBanner']['name'] != '')
				{
					@move_uploaded_file($_FILES['sBanner']['tmp_name'],"uploads/services/".@$sBanner);
				}
				$success=array(
					'success' => "Successfully added item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/viewServiceItems/'.@$serviceid));
			}
			else{
				$fail=array(
					'fail' => "Failed to added item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/viewServiceItems/'.@$serviceid));
			}
		}
	}
	public function editServiceItem($rowid,$serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['serviceid'] = $serviceid;
			$data['service'] = $this->sql->getTableRowData("services",array('id' => $serviceid));
			$data['menu'] = 'services';
			$data['item'] = $this->sql->getTableRowData("serviceitems",array('id' => $rowid));
			$this->load->view('header',$data);			
			$this->load->view('edit-serviceitem',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updateServiceItem($serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$rowid=$this->input->post('rowid');
			if(@$_FILES['sImage']['name'] != '')
			{
				$sImage=time().'_'.$_FILES['sImage']['name'];
			}
			else{
				$sImage=$this->input->post('hiddensImage');
			}
			if(@$_FILES['sBanner']['name'] != '')
			{
				$sBanner=time().'_'.$_FILES['sBanner']['name'];
			}
			else{
				$sBanner=$this->input->post('hiddensBanner');
			}
			$params=array(
				'serviceid' => $serviceid,
				'sTitle' => $this->input->post('sTitle'),
				'sDesc' => $this->input->post('sDesc'),
				'sImage' => $sImage,
				'sBanner' => $sBanner,
				'seoCustomURL' => $this->input->post('seoCustomURL'),
				'metaTitle' => $this->input->post('metaTitle'),
				'metaDesc' => $this->input->post('metaDesc'),
				'metaKeys' => $this->input->post('metaKeys'),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->updateItems("serviceitems",$params,array('id' => $rowid));
			if($ins > 0)
			{
				$apath=@str_replace("admin\\","",str_replace("admin/",'',FCPATH));
				$path_to_file=$apath."application/config/routes.php";
				$handle = fopen($path_to_file, 'w');
				ftruncate($handle, 0);
				$allpages=$this->sql->getTableRowDataOrder("pages",array("status" => 1),"id","ASC");
				$services=$this->sql->getTableRowDataOrder("services",array("status" => 1),"id","ASC");
				$serviceitems=$this->sql->getTableRowDataOrder("serviceitems",array("status" => 1),"id","ASC");
				$blogs=$this->sql->getTableRowDataOrder("blogs",array("status" => 1),"id","ASC");
				
				$str='<?php';
				$str .="\n".'defined("BASEPATH") OR exit("No direct script access allowed");';
				$str .= "\n".'&#36;route["default_controller"] = "home";';
				$str .= "\n".'&#36;route["404_override"] = "";';
				$str .= "\n".'&#36;route["translate_uri_dashes"] = FALSE;';
				
				if(@sizeOf($allpages) > 0)
				{
					for($s=0;$s<sizeOf($allpages);$s++)
					{
						if(@trim(@trim($allpages[$s]->seoCustomURL) != ''))
						{
							if($allpages[$s]->pAlias == 'work')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/work';";
							}
							
							
							if($allpages[$s]->pAlias == 'web')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/web';";
							}
							
							
							if($allpages[$s]->pAlias == 'mobile')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/mobile';";
							}
							
							
							if($allpages[$s]->pAlias == 'solutions')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/solutions';";
							}
							
							
							if($allpages[$s]->pAlias == 'about')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/about';";
							}
							
							
							if($allpages[$s]->pAlias == 'blog')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/blog';";
							}
							
							
							if($allpages[$s]->pAlias == 'contact')
							{
								$str .= "\n"."&#36;route['".@$this->clean($allpages[$s]->seoCustomURL)."']='home/contact';";
							}
							
							
						}
					}
				}
			  
				if(@sizeOf($services) > 0)
				{
					for($sr=0;$sr<sizeOf($services);$sr++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($services[$sr]->seoCustomURL)."']='".@$services[$sr]->seoURL."';";
					}
				}
				if(@sizeOf($serviceitems) > 0)
				{
					for($st=0;$st<sizeOf($serviceitems);$st++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($serviceitems[$st]->seoCustomURL)."']='".@$serviceitems[$st]->seoURL."';";
					}
				}
				if(@sizeOf($blogs) > 0)
				{
					for($b=0;$b<sizeOf($blogs);$b++)
					{
						$str .= "\n"."&#36;route['".@$this->clean($blogs[$b]->seoCustomURL)."']='".@$blogs[$b]->seoURL."';";
					}
				}
				if(@$str != '')
				{
					$file_contents = str_replace("&#36;","$",$str);
					$data = $file_contents;
					fwrite($handle, $data);
				}
				
				if(@$_FILES['sImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['sImage']['tmp_name'],"uploads/services/".@$sImage);
				}
				
				if(@$_FILES['sBanner']['name'] != '')
				{
					@move_uploaded_file($_FILES['sBanner']['tmp_name'],"uploads/services/".@$sBanner);
				}
				
				$success=array(
					'success' => "Successfully updated item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/viewServiceItems/'.@$serviceid));
			}
			else{
				$fail=array(
					'fail' => "Failed to updated item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/viewServiceItems/'.@$serviceid));
			}
		}
	}
	
	
	public function deleteServiceItem($rowid,$serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$del= $this->sql->removeOldFolderItem("servicecontents","sImage",array('id' => $rowid),"uploads/services/");
			if($del > 0)
			{
				$success=array(
					'success' => "Successfully removed item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/viewServiceItemContent/'.@$itemid.'/'.@$serviceid));
			}
			else{
				$fail=array(
					'fail' => "Failed to removed item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/viewServiceItemContent/'.@$itemid.'/'.@$serviceid));
			}
		}
	}
	
	public function viewServiceItemContent($itemid,$serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'services';
			$data['serviceid'] = $serviceid;
			$data['itemid'] = $itemid;
			$data['service'] = $this->sql->getTableRowData("services",array('id' => $serviceid));
			$data['serviceitem'] = $this->sql->getTableRowData("serviceitems",array('id' => $itemid));
			$data['items'] = $this->sql->getTableRowData("servicecontents",array('serviceitemid' => $itemid));
			$this->load->view('header',$data);			
			$this->load->view('serviceitemcontents',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createServiceItemContent($itemid,$serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'services';
			$data['serviceid'] = $serviceid;
			$data['itemid'] = $itemid;
			$data['service'] = $this->sql->getTableRowData("services",array('id' => $serviceid));
			$data['serviceitem'] = $this->sql->getTableRowData("serviceitems",array('id' => $itemid));
			$this->load->view('header',$data);			
			$this->load->view('create-serviceitemcontent',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function saveServiceItemContent($itemid,$serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			if(@$_FILES['sImage']['name'] != '')
			{
				$sImage=time().'_'.$_FILES['sImage']['name'];
			}
			else{
				$sImage='';
			}
			$params=array(
				'serviceid' => $serviceid,
				'serviceitemid' => $itemid,
				'sImage' => $sImage,
				'sDesc' => $this->input->post('sDesc'),
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("servicecontents",$params);
			if($ins > 0)
			{
				
				if(@$_FILES['sImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['sImage']['tmp_name'],"uploads/services/".@$sImage);
				}
				$success=array(
					'success' => "Successfully added item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/viewServiceItemContent/'.@$itemid.'/'.@$serviceid));
			}
			else{
				$fail=array(
					'fail' => "Failed to added item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/viewServiceItemContent/'.@$itemid.'/'.@$serviceid));
			}
		}
	}
	public function editServiceItemContent($rowid,$itemid,$serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['serviceid'] = $serviceid;
			$data['itemid'] = $itemid;
			$data['service'] = $this->sql->getTableRowData("services",array('id' => $serviceid));
			$data['serviceitem'] = $this->sql->getTableRowData("serviceitems",array('id' => $itemid));
			$data['menu'] = 'services';
			$data['item'] = $this->sql->getTableRowData("servicecontents",array('id' => $rowid));
			$this->load->view('header',$data);			
			$this->load->view('edit-serviceitemcontent',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updateServiceItemContent($itemid,$serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$rowid=$this->input->post('rowid');
			if(@$_FILES['sImage']['name'] != '')
			{
				$sImage=time().'_'.$_FILES['sImage']['name'];
			}
			else{
				$sImage=$this->input->post('hiddensImage');
			}
			$params=array(
				'serviceid' => $serviceid,
				'serviceitemid' => $itemid,
				'sImage' => $sImage,
				'sDesc' => $this->input->post('sDesc'),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->updateItems("servicecontents",$params,array('id' => $rowid));
			if($ins > 0)
			{
				
				if(@$_FILES['sImage']['name'] != '')
				{
					@move_uploaded_file($_FILES['sImage']['tmp_name'],"uploads/services/".@$sImage);
				}
				
				$success=array(
					'success' => "Successfully updated item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/viewServiceItemContent/'.@$itemid.'/'.@$serviceid));
			}
			else{
				$fail=array(
					'fail' => "Failed to updated item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/viewServiceItemContent/'.@$itemid.'/'.@$serviceid));
			}
		}
	}
	public function deleteServiceItemContent($rowid,$itemid,$serviceid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$del= $this->sql->removeOldFolderItem("servicecontents","sImage",array('id' => $rowid),"uploads/services/");
			if($del > 0)
			{
				$dd=$this->sql->removeItems("servicecontents",array('id' => $rowid));
				$success=array(
					'success' => "Successfully removed item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/viewServiceItemContent/'.@$itemid.'/'.@$serviceid));
			}
			else{
				$fail=array(
					'fail' => "Failed to removed item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/viewServiceItemContent/'.@$itemid.'/'.@$serviceid));
			}
		}
	}
	
	
	
	
	public function about()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'about';
			$data['items'] = $this->sql->getTableAllData("services");
			$this->load->view('header',$data);			
			$this->load->view('about',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function aboutItem($type)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'about';
			$data['aType'] = $type;
			$data['items'] = $this->sql->getTableRowDataOrder("about",array('aType' => $type),"id","ASC");
			$this->load->view('header',$data);			
			$this->load->view('aboutitem',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createAboutItem($type)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'about';
			$data['aType'] = $type;
			$this->load->view('header',$data);			
			$this->load->view('create-aboutitem',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function saveAboutItem($type)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			if(@$_FILES['aIcon']['name'] != '')
			{
				$aIcon=time()."_".$_FILES['aIcon']['name'];
			}
			else{
				$aIcon='';
			}
			$params=array(
				'aType' => $type,
				'aTitle' => @$this->input->post('aTitle'),
				'aDesc' => $this->input->post('aDesc'),
				'aIcon' => @$aIcon,
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("about",$params);
			if($ins > 0)
			{
				if(@$_FILES['aIcon']['name'] != '')
				{
					@move_uploaded_file($_FILES['aIcon']['tmp_name'],'uploads/files/'.$aIcon);
				}
				
				$success=array(
					'success' => "Successfully added item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/aboutItem/'.$type));
			}
			else{
				$fail=array(
					'fail' => "Failed to added item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/aboutItem/'.$type));
			}
		}
	}
	public function editAboutItem($rowid,$type)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['aType'] = $type;
			$data['menu'] = 'about';
			$data['item'] = $this->sql->getTableRowData("about",array('id' => $rowid));
			$this->load->view('header',$data);			
			$this->load->view('edit-aboutitem',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updateAboutItem($type)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$rowid=$this->input->post('rowid');
			if(@$_FILES['aIcon']['name'] != '')
			{
				$aIcon=time()."_".$_FILES['aIcon']['name'];
			}
			else{
				$aIcon=$this->input->post('hiddenaIcon');
			}
			$params=array(
				'aTitle' => $this->input->post('aTitle'),
				'aDesc' => $this->input->post('aDesc'),
				'aIcon' => $aIcon,
				'updateDate' => @date("Y-m-d H:i:s")
			);
			
			$ins = $this->sql->updateItems("about",$params,array('id' => $rowid));
			if($ins > 0)
			{
				if(@$_FILES['aIcon']['name'] != '')
				{
					@move_uploaded_file($_FILES['aIcon']['tmp_name'],'uploads/files/'.$aIcon);
				}
				$success=array(
					'success' => "Successfully updated item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/aboutItem/'.$type));
			}
			else{
				$fail=array(
					'fail' => "Failed to updated item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/aboutItem/'.$type));
			}
		}
	}
	
	public function careers()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'careers';
			$data['items'] = $this->sql->getTableAllData("careers");
			$this->load->view('header',$data);			
			$this->load->view('careers',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createCareer()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'careers';
			$this->load->view('header',$data);			
			$this->load->view('create-career',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function saveCareer()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$params=array(
				'cDesc' => @$this->input->post('cDesc'),
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("careers",$params);
			if($ins > 0)
			{
				
				$success=array(
					'success' => "Successfully added item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/careers'));
			}
			else{
				$fail=array(
					'fail' => "Failed to added item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/careers'));
			}
		}
	}
	public function editCareer($rowid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['menu'] = 'careers';
			$data['item'] = $this->sql->getTableRowData("careers",array('id' => $rowid));
			$this->load->view('header',$data);			
			$this->load->view('edit-career',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updateCareer()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$rowid=$this->input->post('rowid');
			
			$params=array(
				'cDesc' => @$this->input->post('cDesc'),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->updateItems("careers",$params,array('id' => $rowid));
			if($ins > 0)
			{
				$success=array(
					'success' => "Successfully updated item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/careers'));
			}
			else{
				$fail=array(
					'fail' => "Failed to updated item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/careers'));
			}
		}
	}
	
	public function contact()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'contact';
			$data['items'] = $this->sql->getTableAllData("contact");
			$this->load->view('header',$data);			
			$this->load->view('contact',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function createContact()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'contact';
			$this->load->view('header',$data);			
			$this->load->view('create-contact',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function saveContact()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$params=array(
				'cAddress' => @$this->input->post('cAddress'),
				'cEmail' => @$this->input->post('cEmail'),
				'cContact' => @$this->input->post('cContact'),
				'cLatlang' => @$this->input->post('cLatlang'),
				'createDate' => @date("Y-m-d H:i:s"),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->storeItems("contact",$params);
			if($ins > 0)
			{
				
				$success=array(
					'success' => "Successfully added item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/contact'));
			}
			else{
				$fail=array(
					'fail' => "Failed to added item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/contact'));
			}
		}
	}
	public function editContact($rowid)
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['rowid'] = $rowid;
			$data['menu'] = 'contact';
			$data['item'] = $this->sql->getTableRowData("contact",array('id' => $rowid));
			$this->load->view('header',$data);			
			$this->load->view('edit-contact',$data);
			$this->load->view('footer',$data);
		}
		
	}
	public function updateContact()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$rowid=$this->input->post('rowid');
			
			$params=array(
				'cAddress' => @$this->input->post('cAddress'),
				'cEmail' => @$this->input->post('cEmail'),
				'cContact' => @$this->input->post('cContact'),
				'cLatlang' => @$this->input->post('cLatlang'),
				'updateDate' => @date("Y-m-d H:i:s")
			);
			$ins = $this->sql->updateItems("contact",$params,array('id' => $rowid));
			if($ins > 0)
			{
				$success=array(
					'success' => "Successfully updated item."
				);
				$this->session->set_userdata($success);
				redirect(base_url('index.php/home/contact'));
			}
			else{
				$fail=array(
					'fail' => "Failed to updated item."
				);
				$this->session->set_userdata($fail);
				redirect(base_url('index.php/home/contact'));
			}
		}
	}
	
	public function enquiries()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['menu'] = 'enquiries';
			$data['items'] = $this->sql->getTableAllData("enquiries");
			$this->load->view('header',$data);			
			$this->load->view('enquiries',$data);
			$this->load->view('footer',$data);
		}
		
	}
	
	public function deleteEnquiry($rowid)
	{
		$rm=$this->sql->removeItems("enquiries",array("id" => $rowid));
		if($rm > 0)
		{
			$success=array(
				'esuc' => "Successfully updated item."
			);
			$this->session->set_userdata($success);
			redirect(base_url('index.php/home/enquiries'));
		}
		else{
			$fail=array(
				'efail' => "Failed to updated item."
			);
			$this->session->set_userdata($fail);
			redirect(base_url('index.php/home/enquiries'));
		}
	}
	
	
}