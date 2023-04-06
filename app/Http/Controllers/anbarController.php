<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\brands;
use App\Models\clients;
use App\Models\products;
use App\Models\orders;
use App\Models\xerc;
use App\Models\staff;
use App\Models\sobe;
use App\Models\Users;
use App\Models\login;
use App\Models\profil;
use App\Exports\ExportData;
use App\Exports\Exportclient;
use App\Exports\Exportproduct;
use App\Exports\Exportxerc;
use App\Exports\Exportsobe;
use App\Exports\Exportstaff;
use App\Exports\Exportorder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class anbarController extends Controller
{
    
    public function test(){

        $test = brands::paginate(5);
       
        return view('test',[
            'data'=>$test
        ]);
    
    }


    public function export(){
        return Excel::download(new ExportData,'brands.xlsx');
    }
    
    public function export1(){
        return Excel::download(new Exportclient,'clients.xlsx');
    }


    public function export2(){
        return Excel::download(new Exportproduct,'products.xlsx');
    }
    

    public function export3(){
        return Excel::download(new Exportxerc,'xerc.xlsx');
    }


    public function export4(){
        return Excel::download(new Exportsobe,'sobe.xlsx');
    }


    public function export5(){
        return Excel::download(new Exportstaff,'staff.xlsx');
    }
    
    public function export6(){
        return Excel::download(new Exportorder,'orders.xlsx');
    }

    
    public function Proindex(){

        $users = users::orderBy('id','desc');
       
        return view('profil',[
            'data'=>$users
        ]);
    
    }
    
    public function Prupdate(Request $post,){
    
        $con = users::find(Auth::id());


           if(Hash::check($post->password,$con->password))
           {

                


                if($post->file('Ufoto'))
                    {
                        $post->validate([
                            'Ufoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
                        ]);
                        $file = time().'.'.$post->Ufoto->extension();
                        $post->Ufoto->storeAs('public/uploads/users',$file);
                        $con->Ufoto = 'storage/uploads/users/'.$file;
                    }  
                    $con->ad = $post->ad;
                    $con->soyad =$post->soyad;
                    $con->telefon = $post->telefon;
                    $con->email = $post->email;
                   
                    
                    $con-> save(); 
                    return redirect()->route('profil')->with('mesaj3','Confirmed');
            }
            else 
            {return redirect()->route('profil')->with('mesaj2','Wrong password');}
    }
    public function Parolupdate(Request $post){
        
        $con = users::find(Auth::id());
        
        if(Hash::check($post->password,$con->password))
        {
            if($post->newpassword==$post->Tnewpassword)
            {
                $con->password = Hash::make($post->newpassword);  
                $con-> save(); 
            
            return redirect()->route('profil')->with('mesaj3','Confirmed');  
            }
            return redirect()->route('profil')->with('mesaj2','Wrong password');
        }
        else 
        {return redirect()->route('profil')->with('mesaj2','Wrong password');}   
    }
    public function index7(){

        $users = users::orderBy('id','desc')->get();
       
        return view('users',[
            'data'=>$users
        ]);

    }

    public function ok7(Request $post){
        
        $con = new users();

        if($post->password==$post->tpassword){


          $con->ad = $post->ad;
          $con->soyad = $post->soyad;
          $con->telefon = $post->telefon;
          $con->email = $post->email;
          
          $con->password = Hash::make($post->password);
           $con-> save(); 
           
           return redirect()->route('users')->with('mesaj3','Confirmed');
       }
       return redirect()->route('users')->with('mesaj2','Wrong password');
      }
      

//=================================
      public function login(Request $post){       
        $this->validate($post,['email'=>'required|email','password'=>'required']);

        if(!Auth::attempt(['email'=>$post->email,'password'=>$post->password]))
        {
            return redirect()->back()->with('mesaj2','Incorrect login or password');
        }
        return redirect()->route('brands') ;
    }




    public function logout(Request $post){       
        auth()->logout();
        return redirect()->route('login') ;
    }



    public function orders(Request $post){
    if(!empty($post->sorgu))
    {
        $orders = orders::join('clients','clients.id','=','orders.client_id')
        ->join('products','products.id','=','orders.product_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->orderBy('orders.id','desc')
        ->select('*','orders.id','clients.ad as client','brands.ad as brand','products.miqdar as stok','orders.miqdar')
        ->where('orders.user_id', '=', Auth::id())
        ->orwhere('products.mehsul','LIKE','%'.$post->sorgu.'%')
        ->orwhere('clients.ad','LIKE','%'.$post->sorgu.'%')
        ->orwhere('clients.soyad','LIKE','%'.$post->sorgu.'%')
        ->paginate(5);
        


        $orders_st = orders::join('clients','clients.id','=','orders.client_id')
        ->join('products','products.id','=','orders.product_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->where('Otesdiq','=',1)
        ->select('*','orders.id','clients.ad as client','brands.ad as brand','products.miqdar as stok','orders.miqdar')
        ->where('orders.user_id', '=', Auth::id())
        ->where('products.mehsul','LIKE','%'.$post->sorgu.'%')
        ->orwhere('clients.ad','LIKE','%'.$post->sorgu.'%')
        ->orwhere('clients.soyad','LIKE','%'.$post->sorgu.'%')
        ->paginate(5);
    }
    else
    {   
    $orders = orders::join('clients','clients.id','=','orders.client_id')
        ->join('products','products.id','=','orders.product_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->orderBy('orders.id','desc')
        ->select('*','orders.id','clients.ad as client','brands.ad as brand','products.miqdar as stok','orders.miqdar')
        ->where('orders.user_id', '=', Auth::id())
        ->paginate(5);
        


        $orders_st = orders::join('clients','clients.id','=','orders.client_id')
        ->join('products','products.id','=','orders.product_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->where('Otesdiq','=',1)
        ->select('*','orders.id','clients.ad as client','brands.ad as brand','products.miqdar as stok','orders.miqdar')
        ->paginate(5);
    }
        $cari = 0;

        foreach($orders_st as $s){
            $cari = ($s->miqdar * ($s->satis - $s->alis)) + $cari;
        }

        $products = products::join('brands','brands.id','=','products.brand_id')
            ->select('*','products.id')
            ->orderBy('products.mehsul','asc')
            ->where('products.user_id', '=', Auth::id())
            ->get();



            $alis = 0;
            $satis = 0;
            $qazanc = 0;
      
            foreach($products as $p)
            {
               $alis = ($p->alis * $p->miqdar) + $alis;
               $satis = ($p->satis * $p->miqdar) + $satis;
               $qazanc = (($p->satis - $p->alis) * $p->miqdar) + $qazanc;
            }

        $clients = clients::orderBy('clients.ad','asc')
        ->where('clients.user_id', '=', Auth::id())
        ->get();

        $xerc = xerc::orderBy('xercs.mebleg')
        ->where('xercs.user_id', '=', Auth::id())
        ->get();

        return view('orders',[
            'orders'=>$orders,
            'products'=>$products,
            'clients'=>$clients,
            'xerc'=>$xerc,
            'alis'=>$alis,
            'satis'=>$satis,
            'qazanc'=>$qazanc,
            'cari'=>$cari
        ]);
    }

    public function orders_insert(Request $post){

        if(!empty($post->client_id) && !empty($post->product_id) && !empty($post->miqdar))
        {
            $con = new orders();

            $con->client_id = $post->client_id;
            $con->product_id = $post->product_id;
            $con->miqdar = $post->miqdar;
            $con->Otesdiq =0;
            $con->user_id = Auth::id();
            $con->save();

            return redirect()->route('orders')->with('mesaj3','Confirmed');
        }

        return redirect()->route('orders')->with('mesaj2','Please,fill in the list');

    }





    public function orders_sil($id){
        $order = orders::find($id);

        $orders = orders::join('clients','clients.id','=','orders.client_id')
        ->join('products','products.id','=','orders.product_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->orderBy('orders.id','desc')
        ->select('*','orders.id','clients.ad as client','brands.ad as brand','products.miqdar as stok','orders.miqdar')
        ->get();

        

      

        $cari = 0;


        $products = products::join('brands','brands.id','=','products.brand_id')
            ->select('*','products.id')
            ->orderBy('products.mehsul','asc')
            ->get();

        
            $alis = 0;
            $satis = 0;
            $qazanc = 0;
      
            foreach($products as $p)
            {
               $alis = ($p->alis * $p->miqdar) + $alis;
               $satis = ($p->satis * $p->miqdar) + $satis;
               $qazanc = (($p->satis - $p->alis) * $p->miqdar) + $qazanc;
            }

       
        $sildata = clients::find($order->client_id);

        $xerc = xerc::orderBy('xercs.mebleg')->get();

        $clients = clients::orderBy('clients.ad','asc')->get();

        

        return view('orders',[
            'sildata'=>$sildata,
            'sil_id'=>$id,
            'orders'=>$orders,
            'products'=>$products,
            'clients'=>$clients,
            'xerc'=>$xerc,
            'alis'=>$alis,
            'satis'=>$satis,
            'qazanc'=>$qazanc,
            'cari'=>$cari
        ]);
    }


    public function orders_delete($id){
        
       
       
       
       
        $sil = orders::find($id);
        $sil->delete();
        
      
        return redirect()->route('orders')->with('mesaj2','Deleted');
    }


    public function orders_edit($id){

        $orders = orders::join('clients','clients.id','=','orders.client_id')
        ->join('products','products.id','=','orders.product_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->orderBy('orders.id','desc')
        ->select('*','orders.id','clients.ad as client','brands.ad as brand','products.miqdar as stok','orders.miqdar')
        ->get();

        $products = products::join('brands','brands.id','=','products.brand_id')
            ->select('*','products.id')
            ->orderBy('products.mehsul','asc')
            ->get();


        
            $alis = 0;
            $satis = 0;
            $qazanc = 0;
      
            foreach($products as $p)
            {
               $alis = ($p->alis * $p->miqdar) + $alis;
               $satis = ($p->satis * $p->miqdar) + $satis;
               $qazanc = (($p->satis - $p->alis) * $p->miqdar) + $qazanc;
            }

        $clients = clients::orderBy('clients.ad','asc')->get();
        $xerc = xerc::orderBy('xercs.mebleg')->get();

        $cari= 0;
        
        $edit = orders::find($id);

        return view('orders',[
            'edit'=>$edit,
            'orders'=>$orders,
            'products'=>$products,
            'clients'=>$clients,
            'xerc'=>$xerc,
            'alis'=>$alis,
            'satis'=>$satis,
            'qazanc'=>$qazanc,
            'cari'=>$cari
        ]);
    }


    public function orders_update(Request $post,$id){

        if(!empty($post->client_id) && !empty($post->product_id) && !empty($post->miqdar))
        {
            $con = orders::find($id);

            $con->client_id = $post->client_id;
            $con->product_id = $post->product_id;
            $con->miqdar = $post->miqdar;

            $con->save();

            return redirect()->route('orders')->with('mesaj3','Confirmed');
        }

        return redirect()->route('orders')->with('mesaj2','Please,fill in the list');

    }




    public function Otesdiq($id){

        $tesdiq = orders::find($id);
        $mehsul = products::find($tesdiq->product_id);

        if($tesdiq->miqdar <= $mehsul->miqdar)
        {
            $netice = $mehsul->miqdar - $tesdiq->miqdar;

            $tesdiq->Otesdiq = 1;
            $tesdiq->save();

            $mehsul->miqdar = $netice;
            $mehsul->save();

            return redirect()->route('orders')->with('mesaj3','Confirmed');

        }
        else
        {return redirect()->route('orders')->with('mesaj2','Products is not enough');}
    
    }
    public function Oimtina($id){

        $tesdiq = orders::find($id);
        $mehsul = products::find($tesdiq->product_id);
        
        $netice = $mehsul->miqdar + $tesdiq->miqdar;

        $tesdiq->Otesdiq = 0;
        $tesdiq->save();

        $mehsul->miqdar = $netice;
        $mehsul->save();

        return redirect()->route('orders')->with('mesaj','Canceled');
    
    }

//--------------------------------------------------------------------------


    public function bupdate(Request $post,$edit_id){
       
        $con = brands::find($edit_id);
        $yoxla = brands::where('ad','=',$post->ad)
        ->where('id','!=',$edit_id)
        ->count();

        if($yoxla==0)
        {
            if($post->file('Bfoto'))
            {
                $post->validate([
                    'Bfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
                ]);
                $file = time().'.'.$post->Bfoto->extension();
                $post->Bfoto->storeAs('public/uploads/brands',$file);
                $con->Bfoto = 'storage/uploads/brands/'.$file;
            }  

            $con->ad = $post->ad;
           

            $con->save();
            
            return redirect()->route('brands')->with('mesaj3','Confirmed');
        }
    }

    public function Bedit($x){

        $edit = brands::find($x);
        $sec = brands::orderBy('id','desc')->get();
        $say = brands::get()->count();

        return view('brands',[
            'edit'=>$edit,
            'data'=>$sec,
            'say'=>$say

        ]);
      
    }

    public function Bsil($x){

        $sil = brands::find($x);
        $sec = brands::orderBy('id','desc')->get();
        $say = brands::get()->count();

        return view('brands',[
            'sil_id'=>$sil->id,
            'brand'=>$sil->ad,
            'data'=>$sec,
            'say'=>$say
        ]);
      
    }

    public function Byes($x){
        
        $sil = brands::find($x);
        $sil->delete();
        return redirect()->route('brands')->with('mesaj2','Deleted');
    }


    public function Bno($x){

        $sil = brands::find($x);
        return redirect()->route('brands')->with('mesaj','Canceled');
      
    }
    




    public function ok(Request $post){
        
        $con = new brands();
        $yoxla = brands::where('ad','=',$post->ad)
        ->where('user_id', '=', Auth::id())->count();
        

        if($yoxla==0)
        {
            if($post->file('Bfoto'))
            {
                $post->validate([
                    'Bfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
                ]);
                $file = time().'.'.$post->Bfoto->extension();
                $post->Bfoto->storeAs('public/uploads/brands',$file);
                $con->Bfoto = 'storage/uploads/brands/'.$file;
            }  
           
            $con->ad = $post->ad;
            $con->user_id = Auth::id();

            $con->save();
            
            return redirect()->route('brands')->with('mesaj3','Confirmed');
        }

        return redirect()->route('brands')->with('mesaj2','Already available');


        
    }
    public function index(Request $post){

        if(!empty($post->sorgu))
        {

                $sec = brands::orderBy('id','desc')
                ->where('user_id', '=', Auth::id())
                ->where('ad','LIKE','%'.$post->sorgu.'%')
                ->paginate(5);

                
        }
        else
        {


                    
                $sec = brands::orderBy('id','desc')
                ->where('user_id', '=', Auth::id())
                ->paginate(5);
            
        }
        $say = brands::get()->count();
                
                
        return view('brands',[
            'data'=>$sec,
            'say'=>$say
        ]);

    }


    public function cupdate(Request $post,$edit_id){
        $con = clients::find($edit_id);
        $yoxla = clients::where('tel','=',$post->tel)
        ->where('id','!=',$edit_id)
        ->count();

        if($yoxla==0)
        {
            
            if($post->file('Cfoto'))
            {
                $post->validate([
                    'Cfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
                ]);
                $file = time().'.'.$post->Cfoto->extension();
                $post->Cfoto->storeAs('public/uploads/clients',$file);
                $con->Cfoto = 'storage/uploads/clients/'.$file;
            }  

            $con->ad = $post->ad;
            $con->soyad = $post->soyad;
            $con->tel = $post->tel;
            $con->email = $post->email;

            $con->save();
            
            return redirect()->route('clients')->with('mesaj3','Confirmed');
        }return redirect()->route('clients')->with('mesaj2','Could not update');
    }   




    public function cedit($x){

        $edit = clients::find($x);
        $sec = clients::orderBy('id','desc')->get();
        $say = clients::get()->count();

        return view('clients',[
            'edit'=>$edit,
            'data'=>$sec,
            'say'=>$say
        ]);
      
    }


     public function csil($x){

        $sil = clients::find($x);
        $sec = clients::orderBy('id','desc')->get();
        $say = clients::get()->count();

        return view('clients',[
            'sil_id'=>$sil->id,
            'clients'=>$sil->ad,
            'data'=>$sec,
            'say'=>$say
        ]);
      
    }

    public function cyes($x){
        
        $sil = clients::find($x);
        $sil->delete();
        return redirect()->route('clients')->with('mesaj2','Deleted');
    }


    public function cno($x){

        $sil = clients::find($x);
        return redirect()->route('clients')->with('mesaj','Canceled');
      
    }
    public function ok1(Request $post){
        $con = new clients();
        $yoxla = clients::where('tel','=',$post->tel)
        ->where('user_id', '=', Auth::id())->count();

        if($yoxla==0)
        {
           
            if($post->file('Cfoto'))
            {
                $post->validate([
                    'Cfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
                ]);
                $file = time().'.'.$post->Cfoto->extension();
                $post->Cfoto->storeAs('public/uploads/products',$file);
                $con->Cfoto = 'storage/uploads/products/'.$file;
            }  

            $con->ad = $post->ad;
            $con->soyad = $post->soyad;
            $con->tel = $post->tel;
            $con->email = $post->email;
            $con->user_id = Auth::id();

            $con->save();
            
            return redirect()->route('cgonder')->with('mesaj3','Confirmed');
        }

        return redirect()->route('cgonder')->with('mesaj2','Already available');

    
        
    }
    public function index1(Request $post){
        


        if(!empty($post->sorgu))
        {
        $sec = clients::orderBy('id','desc')
        ->where('user_id', '=', Auth::id())
        ->where('ad','LIKE','%'.$post->sorgu.'%')
        ->orwhere('soyad','LIKE','%'.$post->sorgu.'%')
        ->paginate(5);
        }
        else
        {
            $sec = clients::orderBy('id','desc')
            ->where('user_id', '=', Auth::id())
            ->paginate(5);

        }
        
        
        
        
        $say = clients::get()->count();
        return view('clients',[
            'data'=>$sec,
            'say'=>$say
        ]);

    }
    


    public function xupdate(Request $post,$edit_id){
        $yoxla = xerc::where('id','!=',$edit_id)
        ->count();

      
            $con = xerc::find($edit_id);


            $con->mebleg = $post->mebleg;
            $con->teyinat = $post->teyinat;

            $con->save();
            
            return redirect()->route('xerc')->with('mesaj3','Confirmed');
      
    }   

    public function xedit($x){

        $edit = xerc::find($x);
        $sec = xerc::orderBy('id','desc')->get();
        $say = xerc::get()->count();

        return view('xerc',[
            'edit'=>$edit,
            'data'=>$sec,
            'say'=>$say
        ]);
      
    }



    public function xsil($x){

        $sil = xerc::find($x);
        $sec = xerc::orderBy('id','desc')->get();
        $say = xerc::get()->count();

        return view('xerc',[
            'sil_id'=>$sil->id,
            'xerc'=>$sil->teyinat,
            'data'=>$sec,
            'say'=>$say
        ]);
      
    }

    public function xyes($x){
        
        $sil = xerc::find($x);
        $sil->delete();
        return redirect()->route('xerc')->with('mesaj2','Deleted');
    }


    public function xno($x){

        $sil = xerc::find($x);
        return redirect()->route('xerc')->with('mesaj2','Could not update');
      
    }









    public function ok2(Request $post){

            $con = new xerc();
            $con->teyinat = $post->teyinat;
            
            $con->user_id = Auth::id();
            $con->mebleg = $post->mebleg;
            $con->save();
            
            return redirect()->route('xgonder')->with('mesaj3','Confirmed');
        }
        public function index2(Request $post){

        if(!empty($post->sorgu))
        {            

            $sec = xerc::orderBy('id','desc')
            ->where('user_id', '=', Auth::id())
            ->where('mebleg','LIKE','%'.$post->sorgu.'%')
            ->orwhere('teyinat','LIKE','%'.$post->sorgu.'%')
            ->paginate(5);



        }
        else
        {

            $sec = xerc::orderBy('id','desc')
            ->where('user_id', '=', Auth::id())
            ->paginate(5);

        }
            $say = xerc::get()->count();
            return view('xerc',[
                'data'=>$sec,
                'say'=>$say
            ]);
    
        }


            
    public function pupdate(Request $post,$x){
         $con = products::find($x);
         $yoxla = products::where('mehsul','=',$post->mehsul)
        ->where('id','!=',$x)
        ->count();

        if($yoxla==0)
        {
            if($post->file('Pfoto'))
            {
                $post->validate([
                    'Pfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
                ]);
                $file = time().'.'.$post->Pfoto->extension();
                $post->Pfoto->storeAs('public/uploads/products',$file);
                $con->Pfoto = 'storage/uploads/products/'.$file;
            }  


            $con->brand_id = $post->brand_id;
            $con->mehsul = $post->mehsul;
            $con->alis = $post->alis;
            $con->satis = $post->satis;
            $con->miqdar = $post->miqdar;  

            $con->save();
            
            return redirect()->route('products')->with('mesaj3','Confirmed');
        }return redirect()->route('products')->with('mesaj2','Could not update');
    }   





        public function pedit($x){

            $edit =products::find($x);
            $sec = products::join('brands','brands.id','=','products.brand_id')
            ->select('*','products.id')
            ->orderBy('products.id','desc')
            ->get();
            $say = products::get()->count();
            $brands = brands::orderBy('id','desc')->get();
    
            return view('products',[
                'edit'=>$edit,
                'data'=>$sec,
                'say'=>$say,
                'brands'=>$brands
            ]);
          
        }






        public function psil($x){

            $sil = products::find($x);
            $sec = products::orderBy('id','desc')->get();
            $say = products::get()->count();
            $brands = brands::orderBy('ad','asc')->get();
    
            return view('products',[
                'sil_id'=>$sil->id,
                'products'=>$sil->mehsul,
                'data'=>$sec,
                'say'=>$say,
                'brands'=>$brands
            ]);
          
        }
    
        public function pyes($x){
            
            $sil = products::find($x);
            $sil->delete();
            return redirect()->route('products')->with('mesaj2','Deleted');
        }
    
    
        public function pno($x){
    
            $sil = products::find($x);
            return redirect()->route('products')->with('mesaj','Canceled');
          
        }

        public function ok3(Request $post){
             
                $con = new products();

                if($post->file('Pfoto'))
                {
                    $post->validate([
                        'Pfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
                    ]);
                    $file = time().'.'.$post->Pfoto->extension();
                    $post->Pfoto->storeAs('public/uploads/products',$file);
                    $con->Pfoto = 'storage/uploads/products/'.$file;
                }  
    
    
                $con->brand_id = $post->brand_id;
                $con->mehsul = $post->mehsul;
                $con->alis = $post->alis;
                $con->satis = $post->satis;
                $con->user_id = Auth::id();

                $con->miqdar = $post->miqdar;   
                $con->save();
                
                return redirect()->route('pgonder')->with('mesaj3','Confirmed');
            
        }
        public function index3(Request $post){
        if(!empty($post->sorgu))
        {
            $sec = products::join('brands','brands.id','=','products.brand_id')
            ->select('*','products.id')
            ->orderBy('products.id','desc')
            ->where('products.user_id', '=', Auth::id())
            ->where('mehsul','LIKE','%'.$post->sorgu.'%')
            ->orwhere('ad','LIKE','%'.$post->sorgu.'%')
            ->paginate(5);
        }
        else
        {


            $sec = products::join('brands','brands.id','=','products.brand_id')
            ->select('*','products.id')
            ->orderBy('products.id','desc')
            ->where('products.user_id', '=', Auth::id())
            
            ->paginate(5);




        }
            
            
            
            
            $say = products::get()
            ->where('products.user_id', '=', Auth::id())
            ->count();
            $brands = brands::orderBy('ad','asc')
            ->where('brands.user_id', '=', Auth::id())
            ->get();

            return view('products',[
                'data'=>$sec,
                'say'=>$say,
                'brands'=>$brands
            ]);
    
        }
    
        


        //=========================STAFF START===========================================================
    public function Supdate(Request $post,$x){
        $con = staff::find($x);
        $yoxla = staff::where('tel','=',$post->tel)
        ->where('id','!=',$x)
        ->count();
        if($yoxla==0){

            if($post->file('Sfoto'))
                {
                    $post->validate([
                        'Sfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
                    ]);
    
                    $file = time().'.'.$post->Sfoto->extension();
                    $post->Sfoto->storeAs('public/uploads/isciler',$file);
                    $con->Sfoto = 'storage/uploads/isciler/'.$file;
    
                }
        
        $con->sobe_id = $post->sobe_id;        
        $con->ad = $post->ad;
        $con->soyad = $post->soyad;
        $con->tel= $post->tel;
        $con->email= $post->email;
        $con->maash = $post->maash;
        $con->vezife= $post->vezife;
      
  
        $con->vaxt= $post->vaxt;
  
        
        $con->save();
  
        return redirect()->route('staff')->with('mesaj3','Confirmed');
        }
        return redirect()->route('staff')->with('mesaj2','Already available');
       
     }
  
       public function Sedit($x){
        $edit = staff::find($x);
        
        $staff = staff::join('sobes','sobes.id','=','staff.sobe_id')
        ->select('*','staff.id','staff.ad as add')
        ->orderBy('staff.id','desc')->get();

        $sobe = sobe::orderBy('ad','asc')->get();
        
        return view('staff',[
           'edit'=>$edit,
           'data'=>$staff,
           'sobe'=>$sobe
        ]);
       }
  
       public function Ssil($x){
        $sil = staff::find($x);

        $staff = staff::orderBy('id','desc')->get();

        $sobe = sobe::orderBy('ad','asc')->get();

        
        return view('staff',[
           'sil_id'=>$sil->id,
           'ad'=>$sil->ad,
           'data'=>$staff,
           'sobe'=>$sobe
        ]);
       }
        public function Syes($x){
           $sil = staff::find($x);
           $sil->delete();
           return redirect()->route('staff')->with('mesaj2','Dleted');
        }
        public function Sno($x){
           $sil = staff::find($x);
           return redirect()->route('staff')->with('mesaj','Canceled');
        }
  
     public function ok6(Request $post){
        $con = new staff();
        $yoxla = staff::where('tel','=',$post->tel)
        ->where('staff.user_id', '=', Auth::id())
        ->count();
        if($yoxla==0){
  
            if($post->file('Sfoto'))
                    {
                        $post->validate([
                            'Sfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
                        ]);
        
                        $file = time().'.'.$post->Sfoto->extension();
                        $post->Sfoto->storeAs('public/uploads/isciler',$file);
                        $con->Sfoto = 'storage/uploads/isciler/'.$file;
        
                    }

        $con->sobe_id = $post->sobe_id;
        $con->ad = $post->ad;
        $con->soyad = $post->soyad;
        $con->tel = $post->tel;
        $con->email = $post->email;
        $con->maash = $post->maash;
        $con->vezife = $post->vezife;
        $con->user_id =Auth::id();
        $con->vaxt = $post->vaxt;
        $con->save();
  
        return redirect()->route('staff')->with('mesaj3','Confirmed');
        }
        return redirect()->route('staff')->with('mesaj2','Already available');
     }
     
     public function index6(Request $post){
        if(!empty($post->sorgu))
        {
        
            $staff = staff::join('sobes','sobes.id','=','staff.sobe_id')
            ->select('*','staff.id','staff.ad as add')
            ->orderBy('staff.id','desc')
            ->where('staff.user_id', '=', Auth::id())
            ->where('staff.ad','LIKE','%'.$post->sorgu.'%')
            ->orwhere('staff.soyad','LIKE','%'.$post->sorgu.'%')
            ->orwhere('sobes.ad','LIKE','%'.$post->sorgu.'%')
            ->orwhere('staff.email','LIKE','%'.$post->sorgu.'%')
            ->paginate(5);


            $sobe = sobe::orderBy('ad','asc')
            ->where('sobes.user_id', '=', Auth::id())
            ->get();
        }
        else
        {

            $staff = staff::join('sobes','sobes.id','=','staff.sobe_id')
            ->select('*','staff.id','staff.ad as add')
            ->orderBy('staff.id','desc')
            ->where('staff.user_id', '=', Auth::id())
            ->paginate(5);

            $sobe = sobe::orderBy('ad','asc')
            ->where('sobes.user_id', '=', Auth::id())
            ->get();


        }




      
        return view('staff',[
           'data'=>$staff,
           'sobe'=>$sobe
        ]);    
         }
//=========================STAFF END===========================================================

//=====================SOBE START==============================================================
public function index8(Request $post){
    if(!empty($post->sorgu))
    {
        $sobe = sobe::orderBy('id','desc')
        ->where('user_id', '=', Auth::id())
        ->where('ad','LIKE','%'.$post->sorgu.'%')
        ->paginate(5);
    }
    else
    {


        $sobe = sobe::orderBy('id','desc')
        ->where('user_id', '=', Auth::id())
        ->paginate(5);


    }

    return view('sobe',[
        'data'=>$sobe
    ]);

}

public function ok8(Request $post){
    
    $con = new sobe();
    
    $yoxla = sobe::where('ad','=',$post->ad)->count();

    if($yoxla==0)
    {     
       $con->ad = $post->ad;
       $con->user_id = Auth::id();
       $con-> save();

       return redirect()->route('sobe')->with('mesaj3','Confirmed');

    }
      return redirect()->route('sobe')->with('mesaj2','Already available');
  }

public function Shsil($x){

    $sil = sobe::find($x);
    $sobe = sobe::orderBy('id','desc')->get();

    return view('sobe',[
        'sil_id'=>$sil->id,
        'sobe'=>$sil->ad,
        'data'=>$sobe
    ]);
  
}

public function Shyes($x){
    
    $sil = sobe::find($x);
    $sil->delete();
    return redirect()->route('sobe')->with('mesaj2','Deleted');
}


public function Shno($x){

    $sil = sobe::find($x);
    return redirect()->route('sobe')->with('mesaj','Canceled');
  
}

public function Shedit($x){

    $edit = sobe::find($x);
    $sobe = sobe::orderBy('id','desc')->get();

    return view('sobe',[
        'edit'=>$edit,
        'data'=>$sobe
    ]);

}

public function Shupdate(Request $post,$x){
    $con = sobe::find($x);
    $yoxla = sobe::where('ad','=',$post->ad)
    ->where('id','!=',$x)
    ->count();
    if($yoxla==0)
    {
    $con->ad = $post->ad;

    $con->save();

    return redirect()->route('sobe')->with('mesaj3','Confirmed');
    }
    return redirect()->route('sobe')->with('mesaj2','Already available');
}
//=========================SOBE  END=============================================================
























}










