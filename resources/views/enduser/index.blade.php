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
                        <li class="item active"><a href="#home">home</a></li>
                        <li class="item"><a href="#overview">overview</a></li>
                        <li class="item"><a href="#skills">skills</a></li>
                        <li class="item"><a href="#testmonials">testmonials</a></li>
                        <li class="item"><a href="#portfolio">portfolio</a></li>
                        <li class="item"><a href="#contact">contact</a></li>
                    </ul>
                    <button class="nav-toggle" id="nav_toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </nav>

            <div class="header-info">
                <div class="container">
                    <h2>{{$header->details()->first()->title}}</h2>
                    <p>{{$header->details()->first()->prop_value}}</p>

                    <a class="btn" href="#overview">more info 
                        <span class="icon">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="constants-section b1 text-center overview" id="overview">
        <div class="container">
            <h2 class="c2">overview</h2>
            <p class="c3">{{$overview->about}}</p>

            <a class="btn btn-outline" href="{{ json_decode( $overview->details()->first()->options)->cv }}">download my resume</a>
        </div>
    </section>

    <section class="constants-section b2 text-center skills" id="skills">
        <div class="container">

            <h2 class="c2">skills</h2>

            <div class="skills-items">
                <div class="row">

                    @foreach($skills->details()->take(3)->get() as $key => $value)
                        <div class="col-lg-4 col-12">
                            <div class="skill b1">
                                <div class="skill-header">
                                    <div class="icon">
                                        <i class="{{$value->prop_value}}"></i>
                                    </div>
                                    <h3>{{$value->title}}</h3>
                                </div>
                
                                <ul>
                                    @foreach( json_decode( $value->options ) as $item)
                                         <li>{{  $item  }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </section>

    <section class="constants-section b1 text-center testmonials" id="testmonials">
        <div class="container">
            <h2 class="c2">testmonials</h2>
            <p class="c3">{{ $testmonials->about }} <span class="c4 feedback_open" id="feedback_open">here</span></p>
            
            <div class="overflow">

                <div id="slider_container">
                    @foreach($feedbacks as $feedback)
                    <div class="slid-item">
                        <div class="img">
                            <img src="{{$feedback->avatar()}}" alt="{{$feedback->name}}">
                        </div>
                        <h6>"{{$feedback->name}}"</h6>
                        <q>{{$feedback->message}}</q>
                    </div>
                    @endforeach
                </div>
    
            </div>
            
        </div>
    </section>

    <section class="constants-section b2 text-center portfolio" id="portfolio">
        <div class="container">

            <h2 class="c2">portfolio</h2>

            <div class="projects">
                <div class="row">

                    @foreach($projects as $key => $project)
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="project">
                                <div class="img">
                                    <img src="{{$project->img_path}}" alt="">
                                </div>
                                <div class="info">
                                    <div class="icon" title="{{$project->job_title}}">
                                        @if($project->job_title == "front end")
                                            <i class="fas fa-laptop-code"></i>
                                        @elseif($project->job_title == "back end")
                                            <i class="fas fa-database"></i>
                                        @elseif($project->job_title == "ui-ux")
                                             <i class="fas fa-palette"></i>
                                        @else
                                            <i class="fas fa-layer-group"></i>
                                        @endif
                                    </div>
                                    <div class="text">
                                        <h4 class="title"><a href="{{ url("project/".$project->id) }}">{{$project->title}}</a></h4>        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        
        </div>
    </section>

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
                                    <a href="{{$value->prop_value}}" target="_blank">
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