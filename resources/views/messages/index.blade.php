@extends ('layouts.app')
@section ('content')
@section('title', 'Стена')
  <div class="container spark-screen">
    <div class="row">
 
  <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">Стена</h1>
            <p class="lead blog-description">Место, где каждый может высказаться</p>
        </div>
    </div>
   <div class="container">

        <div class="row mb-5">

            <div class="col-sm-8 blog-main">

 @if (Auth::guest())
<h3>Вы должны зарегестирироваться чтобы писать тут свои мудрые мысли</h3>  
@else  
<form class="mb-5" role="form" method="POST" action="{{ url('/postmessage') }}">
  {{ csrf_field() }}>
  <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}" />
 <h3>Написать на стене</h3>
 <div class="form-group">
<label for="title">Заголовок сообщение</label>
 <input type="text" class="form-control" id="title" name="title">
 </div>
 <div class="form-group">
<label for="text">Текст сообщения</label>
 <textarea id="message" name="message" class="form-control" rows="5"></textarea>
     </div>
    <strong>{{ $errors->first('message') }}</strong>
   @if ($errors->has(''))
   <span class="help-block">
  <strong>{{ $errors->first('message') }}</strong>
  </span>
     @endif
<button type="submit" class="btn btn-primary">Написать</button>
</form>
@endif

                 @if (count($messages) > 0)

                 @foreach( $messages as $msg)   
    
                <div class="blog-post">
                    <h2 class="blog-post-title">{{$msg->title}}</h2>
                    <p class="blog-post-meta">{{$msg->created_at}} Автор: {{{ Auth::user()->name }}}</p>

                    <p>{{  $msg->message }}</p>
                </div>
          @endforeach
            
    


   @else
 
     <div class="blog-post">
      <p>Нет никаких  сообщений ни от кого</p>
 </div>           

   @endif
      
{!! $messages->links() !!}

        </div>
         @if (Auth::guest()) 

    @else

                <div class="col-sm-3 offset-sm-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <h4>Статистика</h4>
                    <p>Всего постов: {{$count_msgs}}</p>
                    <p>Дата первого: {{$first_user->created_at}}</p>
                    <p>Дата последнего: {{$last_user->created_at}}</p>
                    <p>Автор первого: 
                    {{ $first_user->name }}
                    

                     </p>
                    <p>Автор последнего:  {{ $last_user->name }}
</p>
                </div>
                <!-- /.blog-sidebar -->
@endif
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <footer class="blog-footer">
            <p>Тестовое задание на должность PHP разработчика.</p>
            <p>
                <a href="#">Наверх</a>
            </p>
        </footer>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


           