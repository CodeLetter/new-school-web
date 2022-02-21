<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Title;
use App\Models\Total;
use App\Models\Bottom;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $view=[];

    public function __construct(){
        $this->view['title']=Title::where("sh",1)->first();
        $this->view['total']=Total::first()->total;

        //如果寫在這,因為它的session沒有visiter,所以他會一直進來這個判斷式,進站人數就會一直+1
        if(!session()->has('visiter')){ //這個has比較像是判斷這個變數裡面有沒有值
            $total=Total::first();
            $total->total++;
            $total->save();
            $this->view['total']=$total->total;
            //session(['visiter'=>$total->total]); //寫法(一)將session寫進去,這樣重整網頁就不會一直增加進站人數
            session()->put('visiter',$total->total); //寫法(二)
        }

        $this->view['bottom']=Bottom::first()->bottom;
    }

}
