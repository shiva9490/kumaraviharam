<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	public function users_count(){
	    return $this->db->query("SELECT count(user_id) as usercount FROM `registration`")->result();
	}
	/*------------admin login--------------*/
	public function login_details($data){
		//print_r($data);exit();
		$sql = "SELECT * FROM admin WHERE (username ='".$data['username']."' AND password='".$data['password']."' AND admin_status=1)";
		return $this->db->query($sql)->row_array();	
	}
	public function get_admin_details($admin_id){
		$this->db->from('admin');		
		$this->db->where('admin_id',$admin_id);
        return $this->db->get()->row_array();
	}
	
	/*---------------------Homre home_Sthala_Puranam-----------------*/	
	public function home_Sthala_Puranam(){
		return $this->db->from('sthala_puranam')->get()->result();
	}
	public function edit_home_Sthala_Puranam($id){
		return $this->db->from('sthala_puranam')->where('id',$id)->get()->result();
	}
	public function update_Sthala_Puranam($id,$data){
		return $this->db->where('id',$id)->update('sthala_puranam',$data);
	}
	/*---------------------End Homre home_Sthala_Puranam-----------------*/
	/*---------------------Homre About--------------------------------*/
	
	public function home_about(){
		return $this->db->from('home_about')->get()->result();
	}
	public function edit_habout($id){
		return $this->db->from('home_about')->where('about_id',$id)->get()->result();
	}
	public function update_habout($id,$data){
		return $this->db->where('about_id',$id)->update('home_about',$data);
	}
	
	/*---------------------Homre About--------------------------------*/
	/*---------------------testimonials--------------------------------*/
	public function testimonials(){
		return $this->db->from('testimonials')->get()->result();
	}
	public function edit_testimonials($id){
		return $this->db->from('testimonials')->where('id',$id)->get()->result();
	}
	public function update_testimonials($id,$data){
		return $this->db->where('id',$id)->update('testimonials',$data);
	}
	
	public function inactive_testimonials($id){
		return $this->db->where('id',$id)->update('testimonials',array('status'=>2));
	}
	public function active_testimonials($id){
		return $this->db->where('id',$id)->update('testimonials',array('status'=>1));
	}
	public function delete_testimonials($id){
		return $this->db->where('id',$id)->delete('testimonials');
	}
	public function add_testimonials($data){
		return $this->db->insert('testimonials',$data);
	}
	/*---------------------testimonials--------------------------------*/
	/*---------------------event imges--------------------------------*/
	public function event_imges(){
		return $this->db->from('events_images')->get()->result();
	}
	public function inactive_event_imges($id){
		return $this->db->where('id',$id)->update('events_images',array('status'=>2));
	}
	public function active_event_imges($id){
		return $this->db->where('id',$id)->update('events_images',array('status'=>1));
	}
	public function delete_event_imges($id){
		return $this->db->where('id',$id)->delete('events_images');
	}
	public function gallerydet($data){
		$this->db->trans_begin();
		if(isset($data['rimages']) && count($data['rimages']) > 0){ 
    		foreach ($data['rimages'] as $rimage) {
    			$this->db->insert('events_images', array('image'=>$rimage));
    		}
		}
		if ($this->db->trans_status() == FALSE) {
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	/*---------------------End event_imges--------------------------------*/
	/*---------------------events_videos--------------------------------*/
	public function events_videos(){
		return $this->db->from('event_video')->get()->result();
	}
	public function addevent_video($data){
		return $this->db->insert('event_video',$data);
	}
	public function active_event_video($id){
		return $this->db->where('id',$id)->update('event_video',array('status'=>1));
	}
	public function inactive_event_video($id){
		return $this->db->where('id',$id)->update('event_video',array('status'=>2));
	}
	public function delete_event_video($id){
		return $this->db->where('id',$id)->delete('event_video');
	}
	/*---------------------End events_videos--------------------------------*/
	/*---------------------Blessings--------------------------------*/
	public function blessings(){
		return $this->db->from('blessings')->get()->result();
	}
	public function addevent_blessings($data){
		return $this->db->insert('blessings',$data);
	}
	public function edit_blessings($id){
		return $this->db->from('blessings')->where('id',$id)->get()->result();
	}
	public function active_blessings($id){
		return $this->db->where('id',$id)->update('blessings',array('status'=>1));
	}
	public function inactive_blessings($id){
		return $this->db->where('id',$id)->update('blessings',array('status'=>2));
	}
	public function delete_blessings($id){
		return $this->db->where('id',$id)->delete('blessings');
	}
	public function update_blessings($id,$data){
		return $this->db->where('id',$id)->update('blessings',$data);
	}
	/*---------------------End Blessings--------------------------------*/
	public function get_home_services(){
		return $this->db->from('home_services')->get()->result();
	}
	
	public function edit_hserives($id){
		return $this->db->from('home_services')->where('id',$id)->get()->result();
	}
	
	public function update_hservices($id,$data){
		return $this->db->where('id',$id)->update('home_services',$data);
	}
	public function home_quality(){
		return $this->db->from('home_qprocess')->get()->result();
	}
	public function edit_home_quality($id){
		return $this->db->from('home_qprocess')->where('id',$id)->get()->result();
	}
	public function update_home_quality($id,$data){
		return $this->db->where('id',$id)->update('home_qprocess',$data);
	}
	
	
	/*------------admin login--------------*/
	/*---------------Product catgory-----------------*/
	public function user_details($id){
	    return $this->db->from('registration')->where('user_id',$id)->get();
	}
	public function prod_catgory(){
		return $this->db->from('catgory_list')->get();
	}
	public function add_catgory($data){
		return $this->db->insert('catgory_list',$data);
	}
	public function delete_catogry($id){
		return $this->db->where('catgory_id',$id)->delete('catgory_list');
	}
	public function update_catgory($id,$data){
		return $this->db->where('catgory_id',$id)->update('catgory_list',$data);
	}
	public function inactive_catgory($id){
		return $this->db->where('catgory_id',$id)->update('catgory_list',array('catgory_status'=>2));
	}
	public function active_catgory($id){
		return $this->db->where('catgory_id',$id)->update('catgory_list',array('catgory_status'=>1));
	}
	
	/*---------------/Product catgory-----------------*/
	/*---------------Qty type list-----------------*/
	public function qty_type(){
		return $this->db->from('qty_type')->get();
	}
	public function qty_typelist(){
		return $this->db->from('qty_type')->where('qty_status',1)->get();
	}
	public function add_qtytype($data){
		return $this->db->insert('qty_type',$data);
	}
	public function delete_qtytype($id){
		return $this->db->where('qty_id',$id)->delete('qty_type');
	}
	public function update_qtytype($id,$data){
		return $this->db->where('qty_id',$id)->update('qty_type',$data);
	}
	public function inactive_qtytype($id){
		return $this->db->where('qty_id',$id)->update('qty_type',array('qty_status'=>2));
	}
	public function active_qtytype($id){
		return $this->db->where('qty_id',$id)->update('qty_type',array('qty_status'=>1));
	}
	/*---------------/Qty type list-----------------*/
	/*---------------product list-----------------*/
	public function product_list(){
		return $this->db->select('products.*,pro_images.*,qty_type.*,catgory_list.*')
		                ->from('products')
		                ->join('qty_type','products.prod_qtytype = qty_type.qty_id','left')
		                ->join('catgory_list','products.prod_categoryid = catgory_list.catgory_id','left')
		                ->join('pro_images','products.prod_id = pro_images.pro_id','left')
		                ->group_by('pro_images.pro_id')
		                ->get();
	}
	public function catgory_type(){
		return $this->db->from('catgory_list')->where('catgory_status',1)->get();
	}
	public function addproduct($data){
		$this->db->insert('products',$data);
		return $this->db->insert_id();
	}
	public function update_url($prod_name,$pro_id){
	    $prod_name  = substr($prod_name,0,7);
	    $prod_id = $pro_id;
	    $prod_cod = $prod_name.$prod_id;
	    return $this->db->where('prod_id',$pro_id)->update('products',array('prod_urlcode'=>$prod_cod));
	}
	public function uploadMimage($data,$pro_id){
		foreach($data as $value)
		{
			$img=array($value,$pro_id);
			$this->db->query("insert into pro_images(pro_image,pro_id) values(?,?)",$img);
		}
	}

	public function inactive_product($id){
	    return $this->db->where('prod_id',$id)->update('products',array('prod_status'=>2));
	}
	public function active_product($id){
	    return $this->db->where('prod_id',$id)->update('products',array('prod_status'=>1));
	}
	public function delete_product($id){
	    return $this->db->where('prod_id',$id)->delete('products');
	}
	public function edit_product($id){
	    return $this->db->select('products.*,pro_images.*,qty_type.*,catgory_list.*')
		                ->from('products')
		                ->join('qty_type','products.prod_qtytype = qty_type.qty_id','left')
		                ->join('catgory_list','products.prod_categoryid = catgory_list.catgory_id','left')
		                ->join('pro_images','products.prod_id = pro_images.pro_id','left')
		                ->group_by('pro_images.pro_id')->where('products.prod_id',$id)
		                ->get();
	}
	
	public function update_product($id,$data){
	    return $this->db->where('prod_id',$id)->update('products',$data);
	}
	public function view_product($id){
	    return $this->db->where('pro_id',$id)->from('pro_images')->get();
	}
	public function delete_productimg($id){
	    return $this->db->where('pro_id',$id)->delete('pro_images');
	}
		public function inactive_productimg($id){
	    return $this->db->where('pro_imgid',$id)->update('pro_images',array('pro_img_status'=>2));
	}
	public function active_productimg($id){
	    return $this->db->where('pro_imgid',$id)->update('pro_images',array('pro_img_status'=>1));
	}
	public function add_productimage($data){
	    return $this->db->insert('pro_images',$data);
	}
	public function update_productimage($id,$data){
	    return $this->db->where('pro_imgid',$id)->update('pro_images',$data);
	}
	/*---------------product list-----------------*/
	/*---------------order_list list-----------------*/
	public function order_list(){
	    return $this->db->select('orders.*,registration.*')
                        ->from('orders')
                        ->join('registration','orders.user_id = registration.user_id','left')
                        ->order_by('orders.order_id','DESC')
                        ->get();
	}
	public function oder_details($data1){
	    return $this->db->insert('oder_details',$data1);
	}
	public function view_orderlist($id){
	    return $this->db->select('orders.*,orders.date_time as order_date,registration.*,user_address.*')
                        ->from('orders')
                        ->join('registration','orders.user_id = registration.user_id','left')
                        ->join('user_address','orders.address_id =user_address.address_id','left')
                        ->where('orders.order_id',$id)->get();
	}
	public function view_oder_details($id){
	    return $this->db->select('orders.*,oder_details.*,products.*')
                        ->from('orders')
                        ->join('oder_details','orders.order_id = oder_details.order_id','left')
                        ->join('products','oder_details.pro_id =products.prod_id','left')
                        ->where('orders.order_id',$id)->get();
	}
	public function view_oder_detailsimg($id){
	    return $this->db->select('orders.*,oder_details.*,products.*,pro_images.*')
                        ->from('orders')
                        ->join('oder_details','orders.order_id = oder_details.order_id','left')
                        ->join('products','oder_details.pro_id =products.prod_id','left')
                        ->join('pro_images','products.prod_id = pro_images.pro_id','left')
                        ->where('orders.order_id',$id)->group_by('pro_images.pro_id')->get();
	}
	public function accept_order($id){
	    return $this->db->where('order_id',$id)->update('orders',array('order_status'=>1));
	}
	public function update_status($id,$data){
	    return $this->db->where('order_id',$id)->update('orders',$data);
	}
	
	/*---------------order_list list-----------------*/
	/*---------------blog list-----------------*/
	public function blog(){
	    return $this->db->from('blog')->get();   
	}
	/*---------------blog list-----------------*/
	/*---------------tax -----------------*/
	public function tax(){
	    return $this->db->from('tax')->get();   
	}
	public function tax_update($id,$data){
	    return $this->db->where('tax_id',$id)->update('tax',$data);
	}
	/*---------------tax -----------------*/
	/*---------------transporting-----------------*/
	public function transporting(){
	    return $this->db->from('transports')->get();
	}
	public function add_transports($data){
	    return $this->db->insert('transports',$data);   
	}
	public function active_transport($id){
	    return $this->db->where('trans_id',$id)->update('transports',array('trans_status'=>1));   
	}
	public function inactive_transport($id){
	    return $this->db->where('trans_id',$id)->update('transports',array('trans_status'=>2));   
	}
	public function delete_transport($id){
	    return $this->db->where('trans_id',$id)->delete('transports');   
	}
	public function update_transport($id,$data){
	    return $this->db->where('trans_id',$id)->update('transports',$data);   
	}
	/*---------------transporting-----------------*/
	/*---------------delivery_charges-----------------*/
    public function	delivery_charges(){
	    return $this->db->from('delivery_charges')->get();
	}
	public function	add_delivery($data){
	    return $this->db->insert('delivery_charges',$data);
	}
	public function	update_delivery($id,$data){
	    return $this->db->where('delivery_id',$id)->update('delivery_charges',$data);
	}
	/*---------------delivery_charges-----------------*/
	/*---------------Users list-----------------*/
	public function Users(){
	    return $this->db->from('registration')->get();
	}
	public function active_user($id){
	    return $this->db->where('user_id',$id)->update('registration',array('user_status'=>1));
	}
	public function inactive_user($id){
	    return $this->db->where('user_id',$id)->update('registration',array('user_status'=>2));
	}
	/*---------------Users list-----------------*/
	/*---------------Report list-----------------*/
	public function orders(){
	    return $this->db->from('orders')->order_by('order_id','DESC')->get();
	}
	public function orders_count(){
	    return $this->db->query("SELECT count(`order_id`) as count FROM `orders` where payment_status = 1")->result();
	}
	public function orders_totalamount(){
	    return $this->db->query("SELECT sum(`pay_amount`) as total FROM `orders`")->result();
	}
	public function orders_daytrastion(){
	    date_default_timezone_set('Asia/Kolkata');
	    $date =  date("Y-m-d");
	    return $this->db->query("SELECT sum(`pay_amount`) as day_total FROM `orders` WHERE `date_time` LIKE '%$date%'")->result();
	}
	public function orders_daycount(){
	    date_default_timezone_set('Asia/Kolkata');
	    $date =  date("Y-m-d");
	    return $this->db->query("SELECT count(`order_id`) as day_count FROM `orders` WHERE `date_time` LIKE '%$date%'")->result();
	}
	public function orders_dateways($day1,$day2){
	    //return $this->db->query("SELECT count(`order_id`) as day_count FROM `orders` WHERE `date_time` LIKE '%$date%' ORDER BY `shipping` ASC")->result();
	    $var = $day1;
		$date = str_replace('/', '-', $var);
		$start =  date("Y-m-d", strtotime($var));
		$var2 = $day2;
		$date = str_replace('/', '-', $var2);
		$end =  date("Y-m-d", strtotime($var2));
		if($start == $end){
		    $ends = date('Y-m-d', strtotime($end . ' +1 day'));
		}else{
		    $ends = $end;
		}
	    $res = $this->db->query("select * from orders  where date_time between '$start' and '$ends'");
		return $res;
	}
	
	
	/*---------------Report list-----------------*/
	/*---------------home_banners-----------------*/
	public function home_banners(){
	    return $this->db->from('home_banners')->get();   
	}
	public function update_homebanner($id,$data){
	    return $this->db->where('banner_id',$id)->update('home_banners',$data);
	}
	public function active_homebanner($id){
	    return $this->db->where('banner_id',$id)->update('home_banners',array('banner_status'=>1));
	}
	public function inactive_homebanner($id){
	    return $this->db->where('banner_id',$id)->update('home_banners',array('banner_status'=>2));
	}
	public function delete_homebanner($id){
	    return $this->db->where('banner_id',$id)->delete('home_banners');
	}
	public function add_homebanner($data){
	    return $this->db->insert('home_banners',$data);
	}
	/*---------------home_banners-----------------*/
	/*---------------Off line Sales -----------------*/
	public function add_dealofweek($id,$data){
	    return $this->db->where('prod_id',$id)->update('products',$data);
	}
	public function catgory_names(){
	   /* return $this->db->select('catgory_list.*,products.prod_categoryid')
	                    ->from('catgory_list')
	                    ->join('products','catgory_list.catgory_id =products.prod_categoryid','left')
	                    ->where('products.prod_status',1)->get();*/
	   return $this->db->select('prod_code,prod_id')->from('products')->where('products.prod_status',1)->get();
	}
	public function feach_proddetails($id){
	    return $this->db->from('products')->where('prod_id',$id)->get()->result();
	}
	public function add_items($data){
	    return $this->db->insert('add_items',$data);
	}
	public function delete_item($id){
	    return $this->db->where('item_id',$id)->delete('add_items');
	}
	public function subtract_prod($prod_id,$qty){
	    $res = $this->db->from('products')->where('prod_id',$prod_id)->get()->result();
	    if($res >0){
	        $reming  = $res[0]->prod_qty - $qty;
	        if($reming > 0){
	            $qt = $reming;
	        }else{
	            $qt = 0;
	        }
	        return $this->db->where('prod_id',$prod_id)->update('products',array('prod_qty'=>$qt));
	    }else{
	        return 0;
	    }
	}
	public function itemslist($userid){
	    return  $this->db->select('products.*,add_items.*')
                ->from('add_items')
                ->join('products','add_items.prod_id =products.prod_id','left')
                ->where('add_items.user_id',$userid)->where('add_items.prods_status',2)->get();
	}
	public function items($id){
	    return $this->db->select('products.*,add_items.*,pro_images.*')
	                    ->from('add_items')
	                    ->join('products','add_items.prod_id =products.prod_id','left')
	                    ->join('pro_images','products.prod_id =pro_images.pro_id','left')
	                    ->where('add_items.user_id',$id)->where('add_items.prods_status',2)->group_by('pro_images.pro_id')->get();
	}
	public function check_update($prod_id,$userid){
	    $res = $this->db->from('add_items')->where('prod_id',$prod_id)->where('user_id',$userid)->where('prods_status',2)->get()->result();
	    if($res > 0){
	        return $res;
	    }else{
	        return 0;
	    }
	}
	public function update_items($item_id,$qty){
	    $res =  $this->db->select('*')->from('add_items')->where('item_id',$item_id)->get()->result();
	    $qty1 = $res[0]->qty + $qty; $total = $res[0]->price * $qty1;
	    return $this->db->where('item_id',$item_id)->update('add_items',array('qty'=>$qty1,'total'=>$total));
	}
	public function cancel_bill($userid){
	    return $this->db->where('user_id',$userid)->where('prods_status',2)->delete('add_items');
	}
	public function items_count($id){
	    return $this->db->query("SELECT sum(`total`) as total FROM `add_items` where user_id = $id and prods_status=2")->result();
	}
	public function add_item_qty($item_id,$total,$price){
	    if($total !=0){
	        return $this->db->where('item_id',$item_id)->update('add_items',array('qty'=>$total,'total'=>$price));
	    }else{
	        return $this->db->where('item_id',$item_id)->delete('add_items');
	    }
	}
	public function registration(){
	   return $this->db->from('registration')->where('user_status',1)->where('user_verfication',1)->get();
	}
	public function registration1(){
	   return $this->db->from('registration')->get();
	}
	/*---------------/Off line Sales -----------------*/
    public function	useradded($data){
	    $res = $this->db->insert('registration',$data);
	    return $this->db->insert_id();
	}
	public function	addaddress($data){
	    return $this->db->insert('user_address',$data);
	}
	public function prod_Codecheck($code){
	    $res = $this->db->from('products')->where('prod_code',$code)->get();
	    if($res->num_rows() > 0){
	        return 1;
	    }else{
	        return 0;
	    }
	}
	public function check_mobile($code){
	    $res = $this->db->from('registration')->where('mobile',$code)->get();
	    if($res->num_rows() > 0){
	        return 1;
	    }else{
	        return 0;
	    }
	}
	public function check($mobile){
	    $res = $this->db->select('user_id')->from('registration')->where('mobile',$mobile)->get();
	    if($res->num_rows() > 0){
	        return 1;
	    }else{
	        return 0;
	    }
	}
	public function prod_editCodecheck($code,$prod_id){
	    $res = $this->db->from('products')->where('prod_id',$prod_id)->where('prod_code',$code)->get();
	    if($res->num_rows() > 0){
	        return 1;
	    }else{
	        return 0;
	    }
	}
	public function check_cart($prod_id,$userid){
	    $res = $this->db->select('products.prod_id,add_items.*')
	                    ->from('add_items')
	                    ->join('products','add_items.prod_id = products.prod_id','left')
	                    ->where('add_items.prod_id',$prod_id)->where('add_items.user_id',$userid)->where('add_items.prods_status',2)->get();
	    // print_r($res->num_rows());exit();
	    if($res->num_rows() > 0){
	        return $res->result();
	    }else{
	        return 0;
	    }
	}
	public function checkout($data){
	    $res = $this->db->insert('orders',$data);
	    return $this->db->insert_id();
	}
	public function user_address($id){
	    return $this->db->select('address_id')->from('user_address')->where('user_id',$id)->get()->result();
	}
    public function check_pincode($pincode){
	    $res = $this->db->from('hyderbad_pincodes')->where('pincode',$pincode)->get();
	    if($res->num_rows() > 0){
	        return $res->result();
	    }else{
	        return 0;
	    }
	}
	public function address_list($id){
	    return $this->db->select('*')->from('user_address')->where('user_id',$id)->get();
	}
    public function pincode($id){
	    return $this->db->from('user_address')->where('address_id',$id)->get()->result();
	}
	
	public function add_address($user_id,$data){
	    $res = $this->db->where('user_id',$user_id)->update('user_address',array('address_status'=>2));
	    return $this->db->insert('user_address',$data);
	}
	public function shipping($id){
	    $distance = $this->db->select('distance')->from('user_address')->where('user_id',$id)->where('address_status',1)->get()->result();
	    $amount1 = $this->db->query("select sum(total) as amount from add_items where user_id = $id and prods_status = 2");
	    if($amount1->num_rows() > 0){
	        $amount2 = $amount1->result();
    	    foreach($amount2 as $a){
    	        $amount3 = $a->amount;
    	        if($amount3){
    	            $amount = $amount3;
    	        }else{
    	            $amount ="0.00";
    	        }
    	        $ress = $this->db->select('delivery_id,dis1,dis2,dis3')->from('delivery_charges')->where('first_amount <=',$amount)->where('last_amount >=',$amount)->where('delivery_status',1)->get()->result();
        	    if(!empty($ress)){
        	        //print_r($ress);exit();
        	        if($distance[0]->distance > 0 && $distance[0]->distance <= 10){
            	        return  $ress[0]->dis1;
            	    }elseif($distance[0]->distance >=11 && $distance[0]->distance <= 20){
            	        return  $ress[0]->dis2;
            	    }elseif($distance[0]->distance >= 21 && $distance[0]->distance <= 30){
            	        return  $ress[0]->dis3;
            	    }else{
            	        return 0;
            	    }
        	    }else{
        	        return 0;
        	    }
    	    }
	    }else{
	        return 0;
	    }
	}
	public function update_cart($id){
	    return $this->db->where('user_id',$id)->update('add_items',array('prods_status'=>1));
	}
	public function user_addresslist($id){
	    return $this->db->from('user_address')->where('user_id',$id)->get();
	}
	public function active_address($id,$userid){
	    $res = $this->db->where('user_id',$userid)->update('user_address',array('address_status'=>2));
	    return $this->db->where('address_id',$id)->where('user_id',$userid)->update('user_address',array('address_status'=>1)); 
	}
	public function stock(){
	    return $this->db->from('products')->get();
	}
	public function stock_count(){
	    return $this->db->query("select count(prod_id) as stockcount from products")->result();
	}
	public function stock_qty(){
	    return $this->db->query("select sum(prod_qty) as stockqty from products")->result();
	}
	public function stock_amount(){
	    return $this->db->query("select sum(prod_qty) as stockamount from products")->result();
	}
	/*---------------------added_blog------------------------------*/
	public function added_blog($data){
	    return $this->db->insert('blog',$data);
	}
	public function active_blog($id){
	    return $this->db->where('blog_id',$id)->update('blog',array('blog_status'=>1));
	}
	public function inactive_blog($id){
	    return $this->db->where('blog_id',$id)->update('blog',array('blog_status'=>2));
	}
	public function delete_blog($id){
	    return $this->db->where('blog_id',$id)->delete('blog');
	}
	public function edit_blog($id){
	    return $this->db->from('blog')->where('blog_id',$id)->get();
	}
	public function update_blog($id,$data){
	    return $this->db->where('blog_id',$id)->update('blog',$data);   
	}
	/*---------------------added_blog------------------------------*/
	/*---------------------about------------------------------*/
	public function about(){
	    return $this->db->from('about')->get();
	}
	public function about_images($id){
	    return $this->db->from('about_images')->where('about_id',$id)->get();
	}
	public function add_aboutimage($data){
	    return $this->db->insert('about_images',$data);
	}
	public function edit_about($id){
	    return $this->db->from('about')->where('about_id',$id)->get();
	}
	public function update_about($id,$data){
	    return $this->db->where('about_id',$id)->update('about',$data);
	}
	public function active_aboutimage($id){
	    return $this->db->where('about',$id)->update('about_images',array('about_image_status'=>1));   
	}
	public function inactive_aboutimage($id){
	    return $this->db->where('about',$id)->update('about_images',array('about_image_status'=>2));   
	}
	public function delete_aboutimage($id){
	    return $this->db->where('about',$id)->delete('about_images');   
	}
	public function update_aboutimage($id,$data){
	    return $this->db->where('about',$id)->update('about_images',$data);
	}
	public function update_urlslikns(){
	    $res = $this->db->select('prod_id,prod_name')->from('products')->where('prod_urlcode','')->get()->result();
	    foreach($res as $r){
	        $prod_id = $r->prod_id;
	        $prod_name  = substr($r->prod_name,0,7);
	        $prod_cod = $prod_name.$prod_id;
	        $this->db->where('prod_id',$prod_id)->update('products',array('prod_urlcode'=>$prod_cod));
	    }
	}
	public function mission(){
		return $this->db->from('mission')->get();
	}
	public function edit_mission($id){
		return $this->db->from('mission')->where('mis_id',$id)->get();
	}
	public function  update_mission($id,$data){
		return $this->db->where('mis_id',$id)->update('mission',$data);
	}
	public function core_values(){
		return $this->db->from('corevalues')->get();
	}
	public function edit_core_values($id){
		return $this->db->from('corevalues')->where('core_id',$id)->get();
	}
	public function update_core_value($id,$data){
		return $this->db->where('core_id',$id)->update('corevalues',$data);
	}
	/*---------------------/about------------------------------*/
	/*---------------------service------------------------------*/
	public function service(){
		return $this->db->from('service')->get();
	}
	public function active_servics($id){
	    return $this->db->where('ser_id',$id)->update('service',array('ser_status'=>1));
	}
	public function edit_services($id){
	    return $this->db->from('service')->where('ser_id',$id)->get()->result();
	}
	public function inactive_servics($id){
	    return $this->db->where('ser_id',$id)->update('service',array('ser_status'=>2));
	}
	public function delete_servics($id){
	    return $this->db->where('ser_id',$id)->delete('service');
	}
	public function add_services($data){		
		return $this->db->insert('service',$data);
	}
	public function updateservices($id,$data){
		return $this->db->where('ser_id',$id)->update('service',$data);
	}
	
	/*---------------------/service------------------------------*/
	/*---------------------portfolio------------------------------*/
	public function portfolio_image(){
		return $this->db->from('portfolio')->order_by('portfolio_id','DESC')->get()->result();
	}
	public function active_portifolio($id){
	    return $this->db->where('portfolio_id',$id)->update('portfolio',array('portfolio_status'=>1));
	}
	public function inactive_portifolio($id){
	    return $this->db->where('portfolio_id',$id)->update('portfolio',array('portfolio_status'=>2));
	}
	public function delete_portifolio($id){
	    return $this->db->where('portfolio_id',$id)->delete('portfolio');
	}
	public function addportfolio_image($data){
		return $this->db->insert('portfolio',$data);
	}
	public function portfolio_video(){
		return $this->db->from('portfolio_videos')->order_by('por_id','DESC')->get()->result();
	}
	public function addportfolio_video($data){
		return $this->db->insert('portfolio_videos',$data);
	}
	public function delete_portifolio_video($id){
		return $this->db->where('por_id',$id)->delete('portfolio_videos');
	}
	public function inactive_portifolio_video($id){
	    return $this->db->where('por_id',$id)->update('portfolio_videos',array('por_v_status'=>2));
	}
	public function active_portifolio_video($id){
	    return $this->db->where('por_id',$id)->update('portfolio_videos',array('por_v_status'=>1));
	}
	/*---------------------/portfolio------------------------------*/
	/*---------------------conatct------------------------------*/
	public function conatct(){
		return $this->db->from('contact')->order_by('id','DESC')->get()->result();	
	}
	public function delete_contact($id){
		return $this->db->where('id',$id)->delete('contact');
	}
	public function edit_contact($id){
		return $this->db->from('contact_deatils')->where('id',$id)->get()->result();
	}
	public function conatct_details(){
		return $this->db->from('contact_deatils')->get()->result();	
	}
	public function update_conatct($id,$data){
		return $this->db->where('id',$id)->update('contact_deatils',$data);
	}
	/*---------------------------------------------------------*/
	/*-----------------------counter----------------------------------*/
	public function counter(){
		return $this->db->from('counter')->get()->result();
	}
	public function edit_counter($id){
		return $this->db->from('counter')->where('id',$id)->get()->result();
	}
	public function update_counter($id,$data){
		return $this->db->where('id',$id)->update('counter',$data);
	}
	/*-----------------------counter----------------------------------*/
	/*-----------------------social_media_liks----------------------------------*/
	public function social_media_liks(){
		return $this->db->from('social_media_liks')->get()->result();
	}
	public function active_social_media($id){
		return $this->db->where('id',$id)->update('social_media_liks',array('social_status'=>1));
	}
	public function inactive_social_media($id){
		return $this->db->where('id',$id)->update('social_media_liks',array('social_status'=>2));
	}
	public function update_social_link($id,$data){
		return $this->db->where('id',$id)->update('social_media_liks',$data);
	}
	/*-----------------------social_media_liks----------------------------------*/
	/*-----------------------update_conatct_map----------------------------------*/
	public function conatct_map(){
		return $this->db->from('contact_map')->get()->result();
	}
	public function edit_conatct_map($id){
		return $this->db->from('contact_map')->where('id',$id)->get()->result();
	}
	public function update_conatct_map($id,$data){
		return $this->db->where('id',$id)->update('contact_map',$data);
	}
	/*-----------------------update_conatct_map----------------------------------*/
	/*-----------------------conatct_address----------------------------------*/
	
	public function conatct_address(){
		return $this->db->from('contacts')->get()->result();
	}
	public function edit_conatct_address($id){
		return $this->db->from('contacts')->where('id',$id)->get()->result();
	}
	public function update_conatct_address($id,$data){
		return $this->db->where('id',$id)->update('contacts',$data);
	}
	/*-----------------------End conatct_address----------------------------------*/
	
	
}?>