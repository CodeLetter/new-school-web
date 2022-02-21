

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- 這個是給ajax使用的token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>科技大學校園資訊系統</title>
    <!-- 這個頁面帶入一堆cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <!-- Tailwind放在bootstrap下面,樣式名稱相同的情況,讓Tailwind可以蓋掉bootstrap,Tailwind優先 -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/style.css' )}}">

</head>
<body>
    
<div class="container">
    <div class="headers w-100">
        
        <a href="/" title="{{$title->text}}"><img src="{{ asset('/'.$title->img) }}" alt="{{$title->text}}" class="w-100"></a>
        
    </div>
    <!-- d-flex = 使選單並排 -->   <!-- height = 使標頭與頁尾版權有空間 --> 
    <div class="main d-flex" style="height: 568px">
        @yield("main")
    </div>
    
    <div class="footer w-100">
        <div class="text-center" style="height: 100px; line-height: 100px;  background:yellow">{{$bottom}}</div>
    </div>
</div>

<!-- 使用ajax呼叫元件 --> 
<div id="modal"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>    
</body>
</html>

@yield("script")