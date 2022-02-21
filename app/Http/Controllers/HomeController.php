<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Image;
use App\Models\Ad;
use App\Models\Mvim;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
//use App\Models\Total;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->sideBar();

        //這裡↓是一個陣列
        //$ads=Ad::where("sh",1)->get()->pluck('text')->all();
        //implode這個方法可以把陣列串起來變成字串
        
        $mvims=Mvim::where('sh',1)->get();
        $news=News::where('sh',1)->get()->filter(function($val,$idx){
            if($idx>4){
                $this->view['more']='/news';
            }else{
                return $val;
            }
        });

        //dd($news,$this->view);

        
        $this->view['mvims']=$mvims;
        $this->view['news']=$news;
        return view('main',$this->view);
    }


    protected function sideBar(){
        $menu=Menu::where('sh',1)->get();
        $images=Image::where('sh',1)->get();
        $ads=implode("　",Ad::where("sh",1)->get()->pluck('text')->all());

        foreach($menu as $key => $menu){
            //$subs=SubMenu::where("menu_id",$menu->id)->get();
            $subs=$menu->subs; //這裡用ORM方式,取代上面那一行,去看Menu.php的裡面有個function叫subs
            $menu->subs=$subs;
            
            //$menus[$key]=$menu;
        }

        if(Auth::user()){
            //dd(Auth::user());
            $this->view['user']=Auth::user();
            //dd($this->view['user']);
        }

        //if(session()->exists('visiter')) //這個exists比較像是判斷有沒有這個變數存在
        
/*         if(!session()->has('visiter')){ //這個has比較像是判斷這個變數裡面有沒有值
            $total=Total::first();
            $total->total++;
            $total->save();
            $this->view['total']=$total->total;
            //session(['visiter'=>$total->total]); //寫法(一)將session寫進去,這樣重整網頁就不會一直增加進站人數
            session()->put('visiter',$total->total); //寫法(二)
        } */
        $this->view['ads']=$ads;
        $this->view['menus']=$menu;
        $this->view['images']=$images;
    }

}
