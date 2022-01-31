<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth; 
use App\Models\User;

class DeliveryController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        // $this->middleware('auth');
    }  

    public function index(){  
        $users=[];  
        if(isset(Auth::user()->id)){
            $id=Auth::user()->id;
            $users=User::find($id); 
        }
        
        $data = array(
            'QueryproductItems' => $this->productItems(), 
            'Querysubs'     => $this->Querysubs(),
            'users'         => $users, 
            'Queryslides'   => $this->slides_get(),
        );  
        return view('home', compact('data'));
    } 

    public function home2(){ 
        $users=[];  
        if(isset(Auth::user()->id)){
            $id=Auth::user()->id;
            $users=User::find($id); 
        }
        
        $data = array(
            'QueryproductItems' => $this->productItems(), 
            'Querysubs'     => $this->Querysubs(),
            'users'         => $users,
            'Queryslides'   => $this->slides_get(),
        );  
        return view('home2', compact('data'));
    } 
 
    public function detail(Request $request){  
        $data = array( 
            'QueryProdtail' => $this->productdetail($request->id), 
            'QueryRelateds' => $this->QueryRelateds($request->id), 
        );   
        return view('detail', compact('data'));
    }

    public function cart(){   
        $id=Auth::user()->id;
        $users=User::find($id);   
        $this->calculate_shipping_cost($id);
        $data = array(
            'QueryproductItems' => $this->productItems(),  
            'users'         => $users,
        );  
        return view('cart', compact('data'));
    }

    public function location(){    
        $data = array();
        return view('location', compact('data'));
    }

    public function profile(){  
        $id=Auth::user()->id;
        $users=User::find($id);   
        $data = array(
            'users'         => $users,
        );
        return view('profile', compact('data'));
    }

    public function confirm_register(){  
        $id=Auth::user()->id;
        $users=User::find($id);   
        $data = array(
            'users'         => $users,
        );
        return view('confirm_register', compact('data'));
    }

    public function sender(){  
        $id=Auth::user()->id;
        $users=User::find($id);   
        $data = array(
            'users'         => $users,
        );
        return view('sender', compact('data'));
    }

    public function checkout(){  
        $id=Auth::user()->id;
        $users=User::find($id);   
        $data = array(
            'users'         => $users,
        );
        return view('checkout', compact('data'));
    } 

    public function order(){  
        $id=Auth::user()->id;
        $users=User::find($id); 
        $status = isset($_GET['st']) ? ' and `orders`.`orderStatus` = '.$_GET['st'] : ' and `orders`.`orderStatus` = 1';  
        $result_order = DB::select('select *, count(orders_items.id) as count,  orders.id as orders_id
        from `orders`  
        left join `orders_items` on `orders`.`id` = `orders_items`.`order_id` 
        where `orders`.`users_id` = '.$id.'
        and `orders`.`delivery_status` = 2 
        and `orders`.`order_segment` in (2,3)
        '.$status.'
        group by `orders`.`id` 
        order by `orders`.`id` desc'); 
        $data = array(
            'users' => $users,
            'result_order' => $result_order,
        ); 
        return view('order', compact('data'));
    }  

    public function orderviwe($id)
    { 
        $data = $this->resultOrder($id); 
        return view('orderviwe', compact('data'));
    }
    // ================================function================================= //
     
    public function slides_get(){
        $data=DB::table('slides')->select('*')
        ->where('slides.deleted_at', NULL)  
        ->where('slides.type', 2)   
        ->orderBy('slides.sorting', 'asc')
        ->get();
        return  $data;
    }
  

    public function resultOrder($orderId){
        $items=[];
        $id=Auth::user()->id;
        if($orderId){
            $Query = DB::table('orders')
            ->leftJoin('orders_items', 'orders.id', '=', 'orders_items.order_id')
            ->leftJoin('product_items', 'orders_items.product_subsid', '=', 'product_items.id')
            ->leftJoin('product_item_details', 'orders_items.product_itemsid', '=', 'product_item_details.id')
            ->leftJoin('product_imgs', 'product_items.id', '=', 'product_imgs.product_itemsid') 
            ->leftJoin('product_units', 'product_item_details.unit_id', '=', 'product_units.id')
            ->leftJoin('orders_option', 'orders_items.id', '=', 'orders_option.orders_items_id')  
            ->leftJoin('product_option_detail', 'orders_option.option_id', '=', 'product_option_detail.id')   

            ->select('orders.id as id', 'orders.users_id as users_id',
             'orders.order_code as order_code', 'orders.sender_fname as sender_fname', 'orders.sender_lname as sender_lname',
            'orders.sender_email as sender_email', 'orders.sender_phone as sender_phone', 'orders.sender_no as sender_no', 
            'orders.sender_address as sender_address', 'orders.sender_parish as sender_parish', 'orders.sender_district as sender_district', 
            'orders.sender_province as sender_province', 'orders.sender_zipcode as sender_zipcode', 'orders.additional_address as additional_address',

            'orders.price_total as price_total', 'orders.price_cost as price_cost', 'orders.price_delivery as price_delivery', 
            'orders.price_frozen as price_frozen',
            'orders.price_discount as price_discount', 'orders.net_total as net_total', 'orders.orderStatus as orderStatus',
            
            'orders.delivery_form as delivery_form', 'orders.delivery_form2 as delivery_form2', 'orders.payment as payment', 'orders.created_at as created_at',
            'orders_items.product_subsid as product_subsid', 'orders_items.product_itemsid as product_itemsid',
            'orders_items.quantity as quantity', 'orders_items.price_total as itmes_price_total', 'orders_items.id as orders_items_id', 

            'product_items.name_th as productName', 'product_imgs.name as imgName', 'product_item_details.prict as productPrict', 
            'product_item_details.weight as weight', 'product_units.name as unitname',

            'orders_items.moreDetails as moreDetails', 'product_item_details.options as options', 'orders.km as km',
            'orders.rider_name as rider_name', 'orders.rider_tel as rider_tel',

            'product_option_detail.id as optionDT_id', 'product_option_detail.name as optionDT_name', 
            'orders_option.price_total as optionDT_price', 'product_option_detail.type as optionDT_type', 
            'orders_option.quantity as optionDT_quantity', 

            'orders.updated_at as updated_at',  'orders.time_taking as time_taking', 
            )
            ->where('orders.id', $orderId)  
            ->where('orders.delivery_status', 2)   
            ->where('product_imgs.img_type', 'm')     
            ->where('orders.users_id', $id)     
            ->get();  
  
            foreach($Query as $row){   
                $items["order_id"]          = $row->id; 
                $items["order_code"]        = $row->order_code; 
                $items["sender_fname"]      = $row->sender_fname;
                $items["sender_lname"]      = $row->sender_lname;
                $items["sender_email"]      = $row->sender_email;
                $items["sender_phone"]      = $row->sender_phone;
                $items["sender_no"]         = $row->sender_no;
                $items["sender_address"]    = $row->sender_address;
                $items["sender_parish"]     = $row->sender_parish;
                $items["sender_district"]   = $row->sender_district;
                $items["sender_province"]   = $row->sender_province;
                $items["sender_zipcode"]    = $row->sender_zipcode; 
                $items["price_total"]       = $row->price_total;
                $items["price_cost"]        = $row->price_cost;
                $items["price_frozen"]      = $row->price_frozen; 
                $items["price_delivery"]    = $row->price_delivery;
                $items["price_discount"]    = $row->price_discount; 
                $items["net_total"]         = $row->net_total; 
                $items["delivery_form_status"] = $row->delivery_form;  
                $items["delivery_form"]        = ($row->delivery_form==1)? "โอนผ่านธนาคาร" : "เงินสด"; 
                $items["delivery_form2"]       = $row->delivery_form2; 
                $items["payment"]              = $row->payment; 
                $items["created_at"]           = $row->created_at;  
                $items["orderStatus_id"]       = $row->orderStatus; 
                $items["additional_address"]   = $row->additional_address; 
                $items["km"]    = $row->km; 
                $items["updated_at"]     = $row->updated_at; 
                $items["time_taking"]    = date("H:i",strtotime($row->time_taking)); 
                 
                $items["rider_name"]    = $row->rider_name; 
                $items["rider_tel"]     = $row->rider_tel;   
                //======================================ORDERS ITEMS======================================//
                $items["ordersItems"][$row->orders_items_id]["productName"]       = $row->productName; 
                $items["ordersItems"][$row->orders_items_id]["productPrict"]      = $row->productPrict;
                $items["ordersItems"][$row->orders_items_id]["weight"]            = $row->weight;
                $items["ordersItems"][$row->orders_items_id]["unitname"]          = $row->unitname; 
                $items["ordersItems"][$row->orders_items_id]["imgName"]           = $row->imgName;  
                $items["ordersItems"][$row->orders_items_id]["product_subsid"]    = $row->product_subsid;
                $items["ordersItems"][$row->orders_items_id]["product_itemsid"]   = $row->product_itemsid;
                $items["ordersItems"][$row->orders_items_id]["quantity"]          = $row->quantity;
                $items["ordersItems"][$row->orders_items_id]["itmes_price_total"] = $row->itmes_price_total; 
                $items["ordersItems"][$row->orders_items_id]["moreDetails"] = $row->moreDetails; 
                $items["ordersItems"][$row->orders_items_id]["options"]     = $row->options; 
                if($row->optionDT_id){
                    $items["ordersItems"][$row->orders_items_id]["option_list"][$row->optionDT_id]['id']    = $row->optionDT_id; 
                    $items["ordersItems"][$row->orders_items_id]["option_list"][$row->optionDT_id]['name']  = $row->optionDT_name; 
                    $items["ordersItems"][$row->orders_items_id]["option_list"][$row->optionDT_id]['price'] = $row->optionDT_price; 
                    $items["ordersItems"][$row->orders_items_id]["option_list"][$row->optionDT_id]['type']  = $row->optionDT_type; 
                    $items["ordersItems"][$row->orders_items_id]["option_list"][$row->optionDT_id]['quantity']  = $row->optionDT_quantity;  
                }  
            } 
        }  
        return $items;
    }
    
    public function Querysubs()
    {
        $data = DB::table('product_subs')
        ->select('*')
        ->where('product_subs.deleted_at', null)
        ->where('product_subs.category_id', 6)
        ->get();
        return $data;
    }
    
    public function productItems(){    
        $keword = isset($_GET['keword']) ? ' and `product_items`.`name_th` LIKE  "%'.$_GET['keword'].'%" '  : ''; 
        $tags = isset($_GET['tags']) ? ' and `product_items`.`tag_id` = '.$_GET['tags'] : ''; 
        $categories = isset($_GET['categories']) ? ' and `product_categories`.`id` = '.$_GET['categories'] : ''; 
        $subs = isset($_GET['subs']) ? ' and `product_subs`.`id` = '.$_GET['subs'] : ''; 
        $types = isset($_GET['types']) ? ' and `product_items`.`type_id` = '.$_GET['types'] : '';  

        $data = DB::select('select `product_categories`.`name` as `categoriesName`, 
        `product_subs`.`name` as `productSubname`, `product_items`.`id` as `id`, 
        `product_items`.`name_th` as `itemsName_th`, `product_items`.`name_en` as `itemsName_en`,  
        `product_items`.`type_id` as `itemsType`, `product_imgs`.`name` as `proImgname`, 
        `product_items`.`price_range` as `price_range`, `product_categories`.`id` as `categoriesId`, 
        `product_subs`.`id` as `productSubid`,
        `product_imgs`.`id` as `imgId`, `product_tags`.`name` as `tagName`, `product_tags`.`bg_color` as `bg_color`,
        `product_tags`.`deleted_at` as `tags_deleted_at`, `product_types`.`name` as `typeName`, `product_types`.`icon` as `typeicon`

        from `product_categories` 
        left join `product_subs` on `product_categories`.`id` = `product_subs`.`category_id` 
        left join `product_items` on `product_subs`.`id` = `product_items`.`product_subsid` 
        left join `product_imgs` on `product_items`.`id` = `product_imgs`.`product_itemsid` 
        left join `product_tags` on `product_items`.`tag_id` = `product_tags`.`id` 
        left join `product_types` on `product_items`.`type_id` = `product_types`.`id` 
        
        where `product_categories`.`deleted_at` is null
        and  `product_categories`.`id` = 6
        and  `product_imgs`.`img_type` = "m"
        and `product_subs`.`deleted_at` is null 
        and `product_items`.`deleted_at` is null 
        '.$keword.' '.$tags.' '.$categories.' '.$subs.' '.$types.'

        group by `product_items`.`id` 
        order by `product_items`.`sorting` asc'); 
        
        $items=[];
        foreach($data as $key=>$row){
            $items[$row->productSubid]['productSubid']=$row->productSubid;
            $items[$row->productSubid]['productSubname']=$row->productSubname;
            $items[$row->productSubid]['list'][$row->id]['id']=$row->id;
            $items[$row->productSubid]['list'][$row->id]['itemsName_en']=$row->itemsName_en;
            $items[$row->productSubid]['list'][$row->id]['itemsName_th']=$row->itemsName_th;
            $items[$row->productSubid]['list'][$row->id]['price_range']=$row->price_range; 
            $items[$row->productSubid]['list'][$row->id]['typeId']=$row->itemsType;
            $items[$row->productSubid]['list'][$row->id]['typeName']=$row->typeName;
            $items[$row->productSubid]['list'][$row->id]['typeicon']=$row->typeicon;
            $items[$row->productSubid]['list'][$row->id]['proImgname']=$row->proImgname;
            $items[$row->productSubid]['list'][$row->id]['tagName']=$row->tagName;
            $items[$row->productSubid]['list'][$row->id]['bg_color']=$row->bg_color;
            $items[$row->productSubid]['list'][$row->id]['tags_deleted_at']=$row->tags_deleted_at;
        } 
        return $items;
    }
     
    public function productdetail($id){
        $Query = DB::table('product_categories')
        ->leftJoin('product_subs', 'product_categories.id', '=', 'product_subs.category_id')
        ->leftJoin('product_items', 'product_subs.id', '=', 'product_items.product_subsid')
        ->leftJoin('product_tags', 'product_items.tag_id', '=', 'product_tags.id') 
        ->leftJoin('product_item_details', 'product_items.id', '=', 'product_item_details.product_itemsid')
        ->leftJoin('product_units', 'product_item_details.unit_id', '=', 'product_units.id')
        ->leftJoin('product_imgs', 'product_items.id', '=', 'product_imgs.product_itemsid') 
        ->leftJoin('orders_items', 'product_items.id', '=', 'orders_items.product_itemsid') 
        ->leftJoin('product_types', 'product_items.type_id', '=', 'product_types.id') 
 
        ->leftJoin('product_option', 'product_items.id', '=', 'product_option.product_itemsid')
        ->leftJoin('product_option_detail', 'product_option.id', '=', 'product_option_detail.option_id')
         
        ->select('product_items.id as id', 'product_items.name_th as name_th', 'product_items.name_en as name_en',
            'product_items.detail as detail', 'product_item_details.id as itemsdetailId',
            'product_item_details.prict as prict', 'product_item_details.weight as weight',
            'product_item_details.options as options',
            'product_tags.name as tagName', 'product_tags.bg_color as bg_color', 
            'product_imgs.id as Imgid', 'product_imgs.name as Imgname', 'product_imgs.img_type as imgType',
            'product_items.price_range as price_range',

            'product_categories.name as categoriesName', 'product_categories.icon as categoriesIcon', 
            'product_units.name as unitname', 'product_subs.name as subname', 
            'product_tags.deleted_at as tags_deleted_at',

            'orders_items.id as orders_items_id',
            'product_types.name as typeName', 'product_types.icon as typeicon',
              
            'product_items.happiness_level as happiness_level',



            'product_option.id as optionid', 'product_option.name as optionTitle', 'product_option_detail.id as optionDtailid',
            'product_option.quantity as quantityType', 'product_option.type as optionTypeRedio',
            
            'product_option_detail.name as optionName', 'product_option_detail.price as optionPrice', 'product_option_detail.type as optionType',
            'product_option.deleted_at as optionDeleted_at'
        )   
        ->where('product_items.deleted_at', NULL) 
        ->where('product_item_details.deleted_at', NULL)   
        // ->where('product_option.deleted_at', NULL) 
        // ->where('product_option_detail.deleted_at', NULL)   
        ->where('product_categories.id', 6)  
        ->where('product_items.id', $id)  
        ->orderBy('product_imgs.id', 'desc')  
        ->get(); 
        
        $items=[];  
        foreach($Query as $row){ 
            $items[$row->id]['id'] = $row->id; 
            $items[$row->id]['name_th'] = $row->name_th;
            $items[$row->id]['name_en'] = $row->name_en;
            $items[$row->id]['detail'] = $row->detail;
            $items[$row->id]['tagName'] = $row->tagName;
            $items[$row->id]['typeName'] = $row->typeName;
            $items[$row->id]['typeicon'] = $row->typeicon;
            $items[$row->id]['categoriesName'] = $row->categoriesName;
            $items[$row->id]['categoriesIcon'] = $row->categoriesIcon;
            $items[$row->id]['bg_color'] = $row->bg_color; 
            $items[$row->id]['tags_deleted_at'] = $row->tags_deleted_at; 
            $items[$row->id]['priceRange'] = $row->price_range;   
            $items[$row->id]['subname'] = $row->subname;   

            $items[$row->id]['count_orders'][$row->orders_items_id]['orders_items_id'] =$row->orders_items_id; 
            $items[$row->id]['listdetail'][$row->itemsdetailId]['itemsdetailId'] = $row->itemsdetailId;
            $items[$row->id]['listdetail'][$row->itemsdetailId]['prict'] = $row->prict;
            $items[$row->id]['listdetail'][$row->itemsdetailId]['weight'] = $row->weight;
            $items[$row->id]['listdetail'][$row->itemsdetailId]['unitname'] = $row->unitname;
            $items[$row->id]['listdetail'][$row->itemsdetailId]['options'] = $row->options; 

            //==========================================================================//
            if($row->optionDeleted_at==null){
                $items[$row->id]['list_option'][$row->optionid]['optionid'] = $row->optionid;
                $items[$row->id]['list_option'][$row->optionid]['optionTitle'] = $row->optionTitle;
                $items[$row->id]['list_option'][$row->optionid]['quantityType'] = $row->quantityType;
                $items[$row->id]['list_option'][$row->optionid]['optionTypeRedio'] = $row->optionTypeRedio;
                
                $items[$row->id]['list_option'][$row->optionid]['option_detail'][$row->optionDtailid]['optionDtailid'] = $row->optionDtailid;
                $items[$row->id]['list_option'][$row->optionid]['option_detail'][$row->optionDtailid]['optionName'] = $row->optionName;
                $items[$row->id]['list_option'][$row->optionid]['option_detail'][$row->optionDtailid]['optionPrice'] = $row->optionPrice;
                $items[$row->id]['list_option'][$row->optionid]['option_detail'][$row->optionDtailid]['optionType'] = $row->optionType;
            }
            //=========================================================================//
            
            if($row->imgType!='m'){
                $items[$row->id]['listimg'][$row->Imgid]['Imgid'] = $row->Imgid;
                $items[$row->id]['listimg'][$row->Imgid]['Imgname'] = $row->Imgname;
            } else {
                $items[$row->id]['ImgnameMain'] = $row->Imgname;
            }
        }   
        return $items; 
    } 

    public function QueryRelateds($id)
    {
        $data = DB::table('product_relateds')
        ->select('product_items.id as id', 'product_items.name_th as name_th', 'product_items.name_en as name_en',
        'product_imgs.name as Imgname', 'product_imgs.img_type as imgType', 'product_items.price_range as price_range',
        'product_types.name as typeName', 'product_types.icon as typeicon',
        'product_tags.name as tagName', 'product_tags.bg_color as bg_color',
        'product_tags.deleted_at as tags_deleted_at',
        )
        ->leftJoin('product_items', 'product_relateds.product_itemsid', '=', 'product_items.id')
        ->leftJoin('product_subs', 'product_items.product_subsid', '=', 'product_subs.id') 
        ->leftJoin('product_imgs', 'product_items.id', '=', 'product_imgs.product_itemsid') 
        ->leftJoin('product_types', 'product_items.type_id', '=', 'product_types.id')
        ->leftJoin('product_tags', 'product_items.tag_id', '=', 'product_tags.id') 
        ->where('product_items.deleted_at', null)
        ->where('product_relateds.deleted_at', null)
        ->where('product_subs.category_id', 6)
        ->where('product_imgs.img_type', 'm')
        ->where('product_relateds.origin_product_itemsid', $id)
        ->groupBy('product_items.id') 
        ->orderBy('product_relateds.sorting', 'asc')  
        ->get();
        return $data;
    }

    public function addToCart(Request $request)
    {     
        $data=200;
        $result = DB::table('product_items')   
        ->leftJoin('product_item_details', 'product_items.id', '=', 'product_item_details.product_itemsid')
        ->leftJoin('product_imgs', 'product_items.id', '=', 'product_imgs.product_itemsid') 
        ->leftJoin('product_units', 'product_item_details.unit_id', '=', 'product_units.id')
        ->leftJoin('product_types', 'product_items.type_id', '=', 'product_types.id')
        ->select('product_items.id as id', 'product_items.name_th as name_th', 'product_units.name as unitname',
        'product_item_details.prict as prict', 'product_item_details.weight as weight', 'product_imgs.name as Imgname', 
        'product_item_details.codeMax as codeMax', 'product_item_details.volume as volume', 
        'product_item_details.options as options',

        'product_items.product_subsid as subsid', 'product_types.name as typeName',
        )    
        ->where('product_items.deleted_at', NULL) 
        ->where('product_imgs.img_type', 'm') 
        ->where('product_items.id', $request->itmesid)  
        ->where('product_item_details.id', $request->itmesdetailid)  
        ->first();   
        //==================================================================//   
        $session_option=[];
        if(isset($request->listoption)){   
            foreach($request->listoption as $key_op=>$row_op){   
                if(isset($row_op['Op_id'])){
                    $result_op = DB::table('product_option_detail')  
                    ->select('*') 
                    ->where('product_option_detail.deleted_at', NULL)  
                    ->where('product_option_detail.id', $row_op['Op_id'])   
                    ->first();  
                    $quantity_op=0;
                    if(isset($row_op['quantity'])){
                        $quantity_op=$row_op['quantity'];
                    }  
                    $session_option[$result_op->id]=[
                        "product_itemsid"   => $result_op->product_itemsid, 
                        "id"            => $result_op->id,
                        "option_id"     => $result_op->option_id,
                        "name"          => $result_op->name, 
                        "price"         => $result_op->price, 
                        "type"          => $result_op->type, 
                        "quantity"      => $quantity_op,
                    ]; 
                }
            }
        }  
        //==================================================================// 
        $cart = session()->get('deliveryCart');  
        $id=NULL;
        if(session('deliveryCart')){
            $id=count(session('deliveryCart'))+1; 
        } else {
            $id=1;
        } 

        if(!$cart) { 
            $cart = [
                    $id => [
                        "indexid"       => $id,
                        "id"            => $request->itmesid,
                        "detail_id"     => $request->itmesdetailid,
                        "codeMax"       => $result->codeMax,
                        "subsid"        => $result->subsid,
                        "typeName"      => $result->typeName,
                        "volume"        => $result->volume,
                        "proname"       => $result->name_th, 
                        "Imgname"       => $result->Imgname, 
                        "price"         => $result->prict,
                        "weight"        => $result->weight,
                        "unitname"      => $result->unitname,
                        "quantity"      => $request->quantity, 
                        "options"       => $result->options, 
                        "moreDetails"   => $request->moreDetails,   
                        "session_option" => $session_option,
                    ]
            ];
            session()->put('deliveryCart', $cart); 
        }  
        $cart[$id] = [
            "indexid"       => $id,
            "id"            => $request->itmesid,
            "detail_id"     => $request->itmesdetailid,
            "codeMax"       => $result->codeMax,
            "subsid"        => $result->subsid,
            "typeName"      => $result->typeName,
            "volume"        => $result->volume,
            "proname"       => $result->name_th, 
            "Imgname"       => $result->Imgname, 
            "price"         => $result->prict,
            "weight"        => $result->weight,
            "unitname"      => $result->unitname,
            "quantity"      => $request->quantity, 
            "options"       => $result->options,
            "moreDetails"   => $request->moreDetails,
            "session_option" => $session_option,
        ];
        session()->put('deliveryCart', $cart);
        session()->put('deliveryForm', 1); 
        return redirect()->route('home')->with('success', 'success'); 
    }

    public function updateTocart(Request $request){
        if($request->indexid and $request->quantity){
            $cart = session()->get('deliveryCart');
            $cart[$request->indexid]["quantity"] = $request->quantity;
            session()->put('deliveryCart', $cart);
            session()->flash('success', 'Cart updated successfully'); 
        }
    }

    public function removeTocart(Request $request)
    {   
        if($request->indexid) {
            $cart = session()->get('deliveryCart');
            if(isset($cart[$request->indexid])) {
                unset($cart[$request->indexid]);
                session()->put('deliveryCart', $cart);
            }
            session()->flash('success', 'Product removed successfully'); 
        }
    }

    public function removeTocartSideDishes(Request $request)
    {  
        if($request->ids) { 
            $cart = session()->get('deliveryCart');
            if(isset($cart[$request->indexid])) { 
                unset($cart[$request->indexid]["session_option"][$request->ids]);
                session()->put('deliveryCart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function updateTocart_side_dishes(Request $request)
    { 
        if($request->ids) { 
            $cart = session()->get('deliveryCart'); 
            $cart[$request->indexid]["session_option"][$request->ids]['quantity'] = $request->quantity;
            session()->put('deliveryCart', $cart);
            session()->flash('success', 'Cart updated successfully'); 
        }
    }

    public function mrak_location (Request $request)
    { 
        $validatedData = $request->validate([  
            'address'   => 'required|string|max:255',
            'parish'  => 'required|string|max:100',
            'district'    => 'required|string|max:100',
            'province'  => 'required|string|max:100',
            'zipcode'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:5', 
        ]);
        
        $id=Auth::user()->id;   
        $data = array(
            'sender_no'=>$request->no,
            'sender_address'=>strip_tags($request->address),
            'sender_parish'=>$request->parish,
            'sender_district'=>$request->district, 
            'sender_province'=>$request->province, 
            'sender_zipcode'=>$request->zipcode, 

            'lat'=>$request->lat, 
            'lon'=>$request->lon,  
        ); 
        DB::table('users')->where('id', $id)->update($data); 
        $get_page="home";
        if(!empty($request->get_page)){
            if($request->get_page=="cart"){
                $get_page="cart";
            }
        }
        $this->session_mrakapp($request->no, $request->parish, $request->district, $request->province, $request->zipcode, $request->lat, $request->lon);
        return redirect()->route($get_page)->with('success', 'ระบุตำแหน่งที่อยู่เรียบร้อยแล้ว.');  
    }

    function updateSenderData(Request $request){ 
        $validatedData = $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'tel'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:10',
            'email' => 'required|string|email|max:100', 
        ]);
        $id=Auth::user()->id;   
        $data=array(
            'sender_fname'=>$request->fname,
            'sender_lname'=>$request->lname,
            'sender_email'=>$request->email,
            'sender_phone'=>$request->tel, 
        );
        DB::table('users')->where('id', $id)->update($data); 
        $get_page="profile";
        if(!empty($request->get_page)){
            if($request->get_page=="cart"){
                $get_page="cart";
            }
        }
        return redirect()->route($get_page)->with('success', 'บันทึกข้อมูลผู้จัดส่งสำเร็จ');  
    }

    public function ajaxsenderDeliveryForm(Request $request)
    { 
        $deliveryForm = session()->get('deliveryForm');   
        $deliveryForm = $request->customRadio;
        session()->put('deliveryForm', $deliveryForm); 
    } 

    public function ajaxsenderForm(Request $request)
    { 
        $senderForm = session()->get('senderForm');   
        $senderForm = $request->customRadio;
        session()->put('senderForm', $senderForm); 
    } 
    
    public function calculate_shipping_cost($id) {   
        $data=array(  
            'sender_no'=> (session('mrakapp'))? session('mrakapp')['road'] : '',
            'sender_address'=> (session('mrakapp'))? session('mrakapp')['location'] : '',
            'sender_parish'=> (session('mrakapp'))? session('mrakapp')['subdistrict'] : '',
            'sender_district'=> (session('mrakapp'))? session('mrakapp')['district'] : '',
            'sender_province'=> (session('mrakapp'))? session('mrakapp')['province'] : '',
            'sender_zipcode'=> (session('mrakapp'))? session('mrakapp')['postcode'] : '',

            'lat'=> (session('mrakapp'))? session('mrakapp')['lat'] : '',
            'lon'=> (session('mrakapp'))? session('mrakapp')['lon'] : '',
        ); 
        DB::table('users')->where('id', $id)->update($data);  
        $user=User::find($id); 
        $tlat=$user->lat;
        $tlon=$user->lon;
        $curl = curl_init(); 
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.longdo.com/RouteService/json/route/guide?flon=100.619387&flat=13.968925&tlon='.$tlon.'&tlat='.$tlat.'&mode=d&type=1&restrict=1&locale=th&key=3c1b841d540af619fd9766a87c32834d&maxresult=1',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl); 
        curl_close($curl);
        $json=json_decode($response);
        
        $total_price=0; $delivery_price=0; $calculator_km=0; $msg='';
        if(isset($json->data[0]->distance)){
            $m=$json->data[0]->distance;
            $calculator_km=$m*(1/1000); 
            $km=round($calculator_km);
            if(number_format($km,0)<=30){  
                switch (number_format($km,0)) {
                case 6:
                    $num=8*1;
                    $delivery_price=30+$num;
                    break;
                case 7:
                    $num=8*2;
                    $delivery_price=30+$num;
                    break;
                case 8:
                    $num=8*3;
                    $delivery_price=30+$num;
                    break;
                case 9:
                    $num=8*4;
                    $delivery_price=30+$num;
                    break;
                case 10:
                    $num=8*5;
                    $delivery_price=30+$num;
                    break;
                case 11:
                    $num=8*6;
                    $delivery_price=30+$num;
                    break;
                case 12:
                    $num=8*7;
                    $delivery_price=30+$num;
                    break;
                case 13:
                    $num=8*8;
                    $delivery_price=30+$num;
                    break;
                case 14:
                    $num=8*9;
                    $delivery_price=30+$num;
                    break;
                case 15:
                    $num=8*10;
                    $delivery_price=30+$num;
                    break;
                case 16:
                    $num=8*11;
                    $delivery_price=30+$num;
                    break;
                case 17:
                    $num=8*12;
                    $delivery_price=30+$num;
                    break;
                case 18:
                    $num=8*13;
                    $delivery_price=30+$num;
                    break;
                case 19:
                    $num=8*14;
                    $delivery_price=30+$num;
                    break;
                case 20:
                    $num=8*15;
                    $delivery_price=30+$num;
                    break;
                    
                case 21:
                    $num=8*16;
                    $delivery_price=30+$num;
                    break;
                case 22:
                    $num=8*17;
                    $delivery_price=30+$num;
                    break;
                case 23:
                    $num=8*18;
                    $delivery_price=30+$num;
                    break;
                case 24:
                    $num=8*19;
                    $delivery_price=30+$num;
                    break;
                case 25:
                    $num=8*20;
                    $delivery_price=30+$num;
                    break;
                case 26:
                    $num=8*21;
                    $delivery_price=30+$num;
                    break;
                case 27:
                    $num=8*22;
                    $delivery_price=30+$num;
                    break;
                case 28:
                    $num=8*23;
                    $delivery_price=30+$num;
                    break;
                case 29:
                    $num=8*24;
                    $delivery_price=30+$num;
                    break;
                case 30:
                    $num=8*25;
                    $delivery_price=30+$num;
                    break;

                default:
                    $delivery_price=30;
                }
            } else {
                $delivery_price=0;
                $msg="ระยะทางเกินเขตที่กำหนดส่ง !";
            }

            $total_price=0;
            if(session('deliveryCart')){
                foreach(session('deliveryCart') as $row){   
                    $total_price+=($row["price"]*$row["quantity"]);
                }
            }
            
            // echo "ราคาสินค้าทั้งหมด : ".$total_price."<br>";   
            // echo "ค่าส่ง : ".$delivery_price."<br>";  
            // echo "ระยะทาง : ".$km."<br>";  
            // echo "<br> ====================================== <br>";  
            // exit;
        }
        
        $session = session()->get('calculate_cost'); 
        $senderForm=session('senderForm');
        if($senderForm==1){
            $data = array(
                'total_price'    => $total_price,
                'delivery_price' => $delivery_price,
                'km' => number_format($calculator_km, 2),
                'msg' => $msg
            );
        } else if($senderForm==2){
            $data = array(
                'total_price'    => $total_price,
                'delivery_price' => 0,
                'km' => 0,
                'msg' => ""
            );
        }
        session()->put('calculate_cost', $data); 
        return $data;
    } 

    public function confirm_order(Request $request)
    {   
        if($request->delivery_form){
            if($request->delivery_form==1){ 
                $validatedData = $request->validate(
                    [
                    'date_transferred' => 'required', 
                    'time_transferred' => 'required', 
                    'file_upload' => 'required|max:20000', 
                    ],
                    [ 
                        'file_upload.required'=>' กรุณาแนบหลักฐานการชำระเงิน !',  
                        'date_transferred.required' => 'กรุณาระบุวันที่โอนเงิน !', 
                        'time_transferred.required' => 'กรุณาระบุเวลาโอนเงิน !', 
                    ]
                );
            }
        }
 
        $message="";
        $discount=0; $calculate_cost=0; $total_price=0;
        $deliveryForm=session('deliveryForm'); 
        
        if(session('senderForm')!=null){  
            $senderForm=session('senderForm'); 
        } else {  
            $senderForm=1; 
        }  // การรับสินค้า (เดลิเวอรี่ - รับเองที่ร้าน)
        if($senderForm==1){ 
            $senderFormTXT="เดลิเวอรี่"; 
            $time_taking=null;
        }else{ 
            $senderFormTXT="รับเองที่ร้าน"; 
            $time_taking=$request->time_takingHDF;
        }  
        $total_op=0; 
        if(session('deliveryCart')){
            if(count(session('deliveryCart'))>0){
                foreach(session('deliveryCart') as $key=>$row){ 
                    if($row['session_option']){  
                        foreach($row['session_option'] as $row_op){
                            if($row_op['quantity']==0){
                                $quantity_op=1;
                            } else {
                                $quantity_op=$row_op['quantity'];
                            }
                            $total_op+=($row_op['price']*$quantity_op); 
                        }
                    }
                }
            } 
        } 
        if(session('calculate_cost')){
            $total_price=session('calculate_cost')['total_price']+$total_op; 
            $calculate_cost=session('calculate_cost')['delivery_price']; 
            $km=session('calculate_cost')['km'];  
        }

        $id=Auth::user()->id;
        $user=User::find($id);
        // ORDER CODE // 
        $OrderCode = hexdec(uniqid());
        //=====================แจ้งเตือน line กลุ่ม ====================// 
        $msg_total=number_format(($total_price+$calculate_cost)-$discount, 2);
        $message.="\n รายการสั่งอาหาร ".date('d/m/Y')." \n";
        $message.="รหัสสั่งซื้อ : ".$OrderCode." \n"; 
        $message.="คุณ : ".$user->sender_fname." ".$user->sender_lname." \n"; 
        $message.="เบอร์ : ".$user->sender_phone." \n"; 
        $message.="การจัดส่ง : ".$senderFormTXT." (".number_format($km, 2)." km) \n";
        $message.="เวลาที่มารับอาหาร  : ".date("H:i",strtotime($time_taking))." น. \n"; 
        $message.="ยอดทั้งหมด : ".$msg_total." ฿ \n\n";  
        $i=1;
        $data = array(
            "order_code"        => $OrderCode, 
            "sender_fname"      => $user->sender_fname,
            "sender_lname"      => $user->sender_lname,
            "sender_email"      => $user->sender_email,
            "sender_phone"      => $user->sender_phone,
            "sender_no"         => $user->sender_no,
            "sender_address"    => $user->sender_address,
            "sender_parish"     => $user->sender_parish,
            "sender_district"   => $user->sender_district,
            "sender_province"   => $user->sender_province,
            "sender_zipcode"    => $user->sender_zipcode, 
            "sender_lat"        => $user->lat, 
            "sender_lon"        => $user->lon, 
            "additional_address"    => $user->additional_address, 

            "price_total"       => $total_price, 
            "price_delivery"    => $calculate_cost,
            "price_discount"    => $discount, 
            "net_total"         => ($total_price+$calculate_cost)-$discount, 
            "delivery_form"     => $deliveryForm, 
            "delivery_form2"    => $senderForm, 
            "delivery_status"   => 2,
            "km"   => number_format($km, 2)." km",

            "date_transferred"   => $request->date_transferred,
            "time_transferred"   => $request->time_transferred,
            "time_taking"        => $time_taking,
            "order_segment"      => 3,  

            "created_at"        => new \DateTime(),
            "users_id"          => Auth::user()->id,
        ); 
        
        $orderId = DB::table('orders')->insertGetId($data); 
        foreach(session('deliveryCart') as $key=>$row){ 
            $data_dt = array(
                "order_id"          => $orderId, 
                "product_subsid"    => $row['id'],
                "product_itemsid"   => $row['detail_id'],
                "quantity"          => $row['quantity'],
                "moreDetails"       => $row['moreDetails'],  
                "price_total"       => number_format($row['price']*$row['quantity'], 2),  
                "created_at"        => new \DateTime(), 
            );
            $message.="\n"; 
            $message.=$i.". ".$row['proname']." \n ".$row['options']."\n  จำนวน  ".$row['quantity']." รายการ\n"; 
            $orders_items_id = DB::table('orders_items')->insertGetId($data_dt);  
            if($row['session_option']){
                $message.="รายการเพิ่มเติม \n";
                foreach($row['session_option'] as $row_op){
                    $data_sd = array(
                        "order_id"         => $orderId,  
                        "orders_items_id"  => $orders_items_id,
                        "option_id"        => $row_op['id'], 
                        "quantity"         => $row_op['quantity'], 
                        "price_total"      => number_format($row_op['price'], 2),  
                        "created_at"       => new \DateTime(),  
                    );  
                    $message.="+ ".$row_op['name'];
                    if($row_op['quantity']>0){
                        $message.=" จำนวน ".$row_op['quantity']." รายการ";
                    }
                    $message.="\n";
                    
                    DB::table('orders_option')->insert($data_sd); 
                } 
            }

            // ================================unset session cart============================= //
            $cartSession = session()->get('deliveryCart');
            if(isset($cartSession[$row['indexid']])) {
                unset($cartSession[$row['indexid']]);
                session()->put('deliveryCart', $cartSession);
                 
            }
            session()->flash('success', 'Product removed successfully'); 
            $i++;
        }  
        //===================================================================// 
        if($deliveryForm){
            if($deliveryForm==1){
                if(!empty($request->file('file_upload'))){
                    $uploade_location = 'images/payment/delivery/';  
                    $img_main = $request->file('file_upload');
                    $img_main_gen = hexdec(uniqid());
                    $img_main_ext = strtolower($img_main->getClientOriginalExtension()); 
                    $img_main_name = $img_main_gen.'.'.$img_main_ext;
                    //============Uploade Imgage Main=============// 
                    $img_main->move($uploade_location, $img_main_name);   
                    $itmes_img_main = array(
                        'payment' => $img_main_name, 
                    );  
                    DB::table('orders')
                    ->where('orders.id', $orderId)
                    ->update($itmes_img_main);
                }
            }
        }

        $this->notify_message($message);
        $unsetcalculate_cost = session()->get('calculate_cost');
        if(isset($unsetcalculate_cost)) {
            unset($unsetcalculate_cost["total_price"]);
            unset($unsetcalculate_cost["delivery_price"]);
            unset($unsetcalculate_cost["km"]);
            unset($unsetcalculate_cost["msg"]);
            session()->put('calculate_cost', $unsetcalculate_cost); 
        }
        session()->flash('success', 'Product removed successfully'); 
        $unsetmrakapp = session()->get('mrakapp');
        if(isset($unsetmrakapp)) { 
            unset($unsetmrakapp["location"]); 
            unset($unsetmrakapp["road"]); 
            unset($unsetmrakapp["subdistrict"]); 
            unset($unsetmrakapp["district"]); 
            unset($unsetmrakapp["province"]); 
            unset($unsetmrakapp["postcode"]); 
            unset($unsetmrakapp["lat"]); 
            unset($unsetmrakapp["lon"]); 
            session()->put('mrakapp', $unsetmrakapp); 
        }
        session()->flash('success', 'Product removed successfully');  
        return redirect()->route('orderviwe',[$orderId])->with('success', 'success order'); 
    }

    function notify_message($message){
        // define('LINE_API',"https://notify-api.line.me/api/notify?");
        // $token = "I6x3IDQEleUmaXD6EeALrTwT8wN4gkaBSFKZBQlDZlx";  
        // $queryData = array('message' => $message);
        // $queryData = http_build_query($queryData,'','&');
        // $headerOptions = array( 
        //         'http'=>array(
        //           'method'=>'POST',
        //           'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
        //                   ."Authorization: Bearer ".$token."\r\n"
        //                   ."Content-Length: ".strlen($queryData)."\r\n",
        //           'content' => $queryData
        //         ),
        // );
        // $context = stream_context_create($headerOptions);
        // $result = file_get_contents(LINE_API,FALSE,$context);

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL); 
        $accToken = "I6x3IDQEleUmaXD6EeALrTwT8wN4gkaBSFKZBQlDZlx";
        $notifyURL = "https://notify-api.line.me/api/notify"; 
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer '.$accToken
        );
        $data = array(
            'message' => $message
        ); 
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $notifyURL);
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);  
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec( $ch );
        curl_close( $ch );  
        $result = json_decode($result,TRUE); 
        if(!is_null($result) && array_key_exists('status',$result)){
            if($result['status']==200){
                return true;
            }
        } 
    }

    public function confrimeOrderUser(Request $request)
    { 
        if($request->id){
            $data = array(
                'orderStatus' => $request->status,
            );
            DB::table('orders')
            ->where('id', $request->id)
            ->update($data);
            return redirect()->route('orderviwe', [$request->id])->with('success', 'ทำการสั่งซื้อสินค้าสำเร็จ ขอบคุณที่สั่งซื้อสินค้ากับเรา.');
        } 
    }

    public function additionalAddress(Request $request)
    { 
        if($request->senderForm_hid==1){
            $validatedData = $request->validate(
                [
                'additional_address' => 'required|max:255', 
                ],
                [ 
                    'additional_address.required'=>' โปรดระบุที่อยู่จัดส่งเพิ่มเติม !',  
                ]
            );
            
            if($request->additional_address!=""){
                $id=Auth::user()->id;   
                $data=array(
                    'additional_address'=>$request->additional_address,  
                ); 
                DB::table('users')->where('id', $id)->update($data); 
            }
        } else if($request->senderForm_hid==2){
            $validatedData = $request->validate(
                [
                'time_takingHDF' => 'required', 
                ],
                [ 
                    'time_takingHDF.required'=>' โปรดระบุเวลาที่มารับอาหาร !',  
                ]
            );
            if($request->time_takingHDF!=""){
                $id=Auth::user()->id;   
                $data=array(
                    'time_taking'=>$request->time_takingHDF,  
                ); 
                DB::table('users')->where('id', $id)->update($data); 
            } 
        }
        return redirect()->route('checkout')->with('success', 'success');
    }

    public function mrakapp(Request $request)
    {   
        $this->session_mrakapp($request->road, $request->subdistrict, $request->district, $request->province, $request->postcode, $request->lat, $request->lon);
    }

    public function session_mrakapp($road, $subdistrict, $district, $province, $postcode, $lat, $lon)
    {
        $senderForm = session()->get('senderForm');   
        $senderForm = 1;
        session()->put('senderForm', $senderForm); 
        $session = session()->get('mrakapp');   
        $location= $road." ".$subdistrict."  ".$district." ".$province." ".$postcode;
        $data = array(
            'location' => $location,
            'road'    => $road,
            'subdistrict' => $subdistrict, 
            'district' => $district,
            'province' => $province,
            'postcode' => $postcode,
            'lat' => $lat,
            'lon' => $lon,
        );
        session()->put('mrakapp', $data); 
    } 
} 