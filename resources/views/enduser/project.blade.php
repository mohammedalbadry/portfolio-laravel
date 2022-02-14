@extends('enduser/layouts/index')

@section('content')
<div class="reset">
    <header style="background-image: url({{json_decode( $header->details()->first()->options)->background}})">
        <div class="overlay">
            <nav>
                <div class="container">

                    <h1 class="logo">
                        <a href="{{url("/")}}">
                            @foreach(explode(" ", $setting->name) as $key => $value)
                                <span>{{$value}} </span>
                            @endforeach
                        </a>
                    </h1>
                    <ul class="nav-items" id="nav_menu">
                        <li class="item"><a href="{{url('/')}}">home</a></li>
                        <li class="item active"><a href="#single_project">single project</a></li>
                        <li class="item"><a href="#contact">contact</a></li>
                    </ul>
                    <button class="nav-toggle" id="nav_toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </nav>

            <div class="header-info single_post_header">
                <div class="container">
                    <h2>{{$project->title}}</h2>
                    <p>{{$project->job_title}}</p>

                    <a class="btn" href="#single_project">more info 
                        <span class="icon">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </header>
</div>

    <section class="b2 single_project" id="single_project">
        <div class="container">
            
            <div class="project_container">
                {!! $project->details !!}
            </div>


        </div>
    </section>

<div class="reset">
    <section class="constants-section b1 text-center contact" id="contact">
        <div class="container">
            <h2 class="c2">contact me</h2>

            <div class="row text-left">
                        
                <div class="col-12 col-sm-6">
                    <div class="message"> 
                        <h3>send message</h3>
                        <p>{{ $contact->details()->where('title', "send message")->first()->prop_value }}</p>
            
                        <form action="{{url('message')}}" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="name">
                            <input type="text" name="email" placeholder="email">
                            <input type="text" name="phone" placeholder="phone">
                            <textarea name="message" name="" placeholder="message"></textarea>
            
                            <button>submit</button>
            
                        </form>
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="contact-info">
                        <h3>contact information</h3>
                        <ul>
                            @foreach($contact->details()->where('title', "contact information")->get() as $key => $value)
                                <li>
                                    <div class="icon">
                                        <i class="{{json_decode( $value->options)->icon}}"></i>
                                    </div>
                                    <div class="info">
                                        <span class="title">{{$value->prop_name}}</span>
                                        <span class="data">{{$value->prop_value}}</span> 
                                    </div>
                                </li>
                            @endforeach
                        </ul>
            
                        <h3>follow me</h3>
                        <ul class="social row">

                            @foreach($contact->details()->where('title', "follow me")->get() as $key => $value)
                                <li style="background: {{json_decode( $value->options)->color }}">
                                    <a href="{{$value->prop_value}}"  target="_blank">
                                        <span class="icon">
                                            <i class="{{json_decode( $value->options)->icon}}"></i>
                                        </span>
                                        {{$value->prop_name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>  
@endsection