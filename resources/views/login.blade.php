@extends('template')
@section('title', 'LOGIN')
@section('content')
    <div class="card shadow bg-white " style="width: 20rem; margin:10rem auto; border-radius:1.2rem;">
        <img src="{{asset('img/virtuslogo.png')}}" class="card-img-top" alt="logo"
            style="width:10rem; margin:2rem auto 0;">
        <form action="" method="POST" id="frm_login">
            @csrf
            <div class="card-body " style="margin:auto auto; font-family: 'Alata', sans-serif; font-size:small;">

                <div class="form-group" id="usuario">
                    <label for="identificacion">Usuario</label>
                    <input type="text" class="form-control " name="name" aria-describedby="identificacion"
                        style="margin:0 0 0 0;">
                    <div class="invalid-feedback">

                    </div>
                </div>
                <div class="form-group" id="password">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" name="password">
                    <div class="invalid-feedback">

                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btnLogin " style="width:40%; margin-left: 30%">LOGIN</button>
                </div>
                <div class="form-group" id="alert">

                </div>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script>
        $('body').on('click','.btnLogin',function(){
            $.post('/login-adm',$('#frm_login').serialize()
            ).done(function(msg){
                if(msg.code==200){
                    alertas(msg.msg,"success")
                    window.location.href=msg.url
                }else{
                    alertas(msg.msg,"error")
                }
            });
        })
    </script>
@endsection
