@extends("layouts.layout")

@section("main")
@include("layouts.backend_sidebar",['total'=>$total])
<!-- 在前端以下這裡屬於組件,可用上面的include從外面帶進來
<div class="menu col-3">
    <div class="list-group text-center">
        <div class="border-bottom my-2 p-1">後台管理</div>         
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/quiz01/public/admin/title">標題圖片管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/quiz01/public/admin/ad">動態文字館告管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/quiz01/public/admin/image">校園映像圖片管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/quiz01/public/admin/mvim">動畫圖片管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/quiz01/public/admin/total">進站人數管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/quiz01/public/admin/bottom">頁尾版權管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/quiz01/public/admin/news">最新消息管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/quiz01/public/admin/admin">管理者管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/quiz01/public/admin/menu">選單管理</a></div>
    </div>
    <div class="border text-center my-2">訪客人數:</div>
</div> -->

<!-- p = padding  my = margin
     d-block會讓整個網址佔滿框框,點框框也能進入網址 -->

<!-- align-items-start/center/end/stretch "start會對齊頂部center會在中間end會在下面stretch會滿版"-->

<div class="main col-9 p-0 d-flex flex-wrap align-items-start">
    <div class="col-8 border py-3 text-center">後台管理區</div>
    <a href='/logout' class="col-4 btn btn-light border py-3 text-center">管理登出</a>
    <div class="border w-100 p-1" style="height:500px;overflow:auto">
    <h5 class="text-center border-bottom py-3">
    @if($module != 'Total' && $module != 'Bottom')
    <button class="btn btn-sm btn-primary float-start" id="addRow">新增</button>
    @endif
    {{ $header }}
    </h5>
    
    <table class="table border-none text-center">
        <tr>
        @isset($cols)
            @if($module != 'Total' && $module != 'Bottom')
                @foreach($cols as $col)
                    <td width="{{$col}}">{{ $col }}</td>
                @endforeach
            @endif
        @endisset
        </tr>
        @isset($rows)
            @if($module != 'Total' && $module != 'Bottom')
                @foreach($rows as $row)
                <tr>
                    @foreach($row as $item)
                        <td>
                            @switch($item['tag'])
                                @case('img')
                                    @include('layouts.img',$item)
                                @break
                                @case('button')
                                    @include('layouts.button',$item)
                                @break
                                @case('embed')
                                    @include('layouts.embed',$item)
                                @break
                                @case('textarea')
                                    @include('layouts.textarea',$item)
                                @break
                                @default
                                {!! nl2br($item['text']) !!}
                            @endswitch
                        </td>
                    @endforeach
                </tr>
                @endforeach
            @else
                <tr>
                    <td>{{ $cols[0] }}</td>
                    <td>{{ $rows[0]['text'] }}</td>
                    <td>@include('layouts.button',$rows[1])</td>
                </tr>
            @endif
        @endisset
    </table>
    @switch($module)
        @case('Image')
        @case('News')
            {!! $paginate !!}
        @break
    @endswitch
    </div>
</div>


@endsection

@section("script")
<script>

//ajax使用的token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//ajax用法,監聽事件,使這個組件click時,讓它知道跟誰要資料,所以要用帶變數
$("#addRow").on("click",function(){

    @isset($menu_id)

        //$.get("/quiz01/public/modals/addTitle",function(modal){
        $.get("/modals/add{{$module}}/{{$menu_id}}",function(modal){
            $("#modal").html(modal)
            $("#baseModal").modal("show")

            //關閉視窗時,清空記憶體
            $("#baseModal").on("hidden.bs.modal",function(){
                $("#baseModal").modal("dispose")
                $("#modal").html("")
            })
        })

    @else

        $.get("/modals/add{{$module}}",function(modal){
            $("#modal").html(modal)
            $("#baseModal").modal("show")

            //關閉視窗時,清空記憶體
            $("#baseModal").on("hidden.bs.modal",function(){
                $("#baseModal").modal("dispose")
                $("#modal").html("")
            })
        })

    @endisset


})
//ajax用法,監聽事件,因為編輯有很多顆按鈕,所以沒辦法用id,故edit寫在class
$(".edit").on("click",function(){
    let id=$(this).data('id')
    $.get(`/modals/{{ strtolower($module) }}/${id}`,function(modal){
        $("#modal").html(modal)
        $("#baseModal").modal("show")
        
        //關閉視窗時,清空記憶體
        $("#baseModal").on("hidden.bs.modal",function(){
            $("#baseModal").modal("dispose")
            $("#modal").html("")
        })
    })
})

//ajax用法,監聽事件,因為在jquery裡面沒有提供 "$.delete: 這個方法,所以要用原生的ajax
$(".delete").on("click",function(){
    let id=$(this).data('id')
    let _this=$(this)
    $.ajax({
        type:'delete',
        url:`/admin/{{ strtolower($module) }}/${id}`,
        success:function(){
            //location.reload()
            //上面的this到這裡的function,所以要讓上面的this丟入變數_this,若直接用this只是success的this
            _this.parents('tr').remove()
        }
    })
})

$(".show").on("click",function(){
    let id=$(this).data('id')
    let _this=$(this)
    $.ajax({
        type:'patch',
        url:`/admin/{{ strtolower($module) }}/sh/${id}`,
        
        @if($module=='Title')
            success:function(img){
                if(_this.text()=="顯示"){
                    $(".show").each((idx,dom)=>{
                        if($(dom).text()=='隱藏'){
                            $(dom).text("顯示")
                            return false;
                        }
                    })
                    _this.text('隱藏')
                }else{
                    $(".show").text("隱藏")
                    _this.text('顯示')
                }
                $(".header img").attr("src","http://quiz01.com/quiz01/public/storage/"+img)
            }
        @else
            success:function(){
                if(_this.text()=="顯示"){
                    _this.text('隱藏')
                }else{
                    _this.text('顯示')
                }
            }
        @endif

    })
})

$(".sub").on("click",function(){
    let id=$(this).data("id")
    location.href=`/admin/submenu/${id}`
})

</script>
@endsection