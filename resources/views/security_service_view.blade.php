@extends('frontend.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')
    <div class="banner_search">
               <h1>Security Services</h1>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                   <li class="breadcrumb-item active">Security Services</li>                 
                </ul>
    </div>
            <div class="s_services">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h2>Services</h2>
                        <!-- Nav pills -->
                        <ul class="nav nav-pills flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#Office_Security">Office Security
                                    <span class="toggle"><i class="fas fa-angle-right"></i><i class="fas fa-angle-down"></i></span>
                                </a>
                            </li>
                          
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#CCTV_Security">CCTV Security
                                    <span class="toggle"><i class="fas fa-angle-right"></i><i class="fas fa-angle-down"></i></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#House_Security">House Security
                                    <span class="toggle"><i class="fas fa-angle-right"></i><i class="fas fa-angle-down"></i></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#Bank_Security">Bank Security
                                    <span class="toggle"><i class="fas fa-angle-right"></i><i class="fas fa-angle-down"></i></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#Parking_Security">Parking Security
                                    <span class="toggle"><i class="fas fa-angle-right"></i><i class="fas fa-angle-down"></i></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#Man_Security">Man Security
                                    <span class="toggle"><i class="fas fa-angle-right"></i><i class="fas fa-angle-down"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div><!-- col-md-4  -->
                    <div class="col-md-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="Office_Security" class="tab-pane fade">
                                <h3>Office Security</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div id="CCTV_Security" class="tab-pane fade"><br>
                                <h3>CCTV_Security</h3>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            <div id="House_Security" class="tab-pane active">
                                <div class="bann_img">
                                    <img src="img/s-guard.jpg" alt="House_Security" class="img-fluid">
                                </div>
                                <h3>House Security</h3>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit nim id est laborum. Sed ut perspiciatis unde omnis natus error sit voluptatem accus antium que laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi arcnihite beatae vitae dicta sunt explicabo. nemo enim ipsam voluptatem quia voluptassit.aspernatur aut odit aut fugit.Curabitur vulputate magna ut orci mattis aliquet. Duis mattis congue tincidunt. Quisque dictum dui purus, a sagittis metus suscipit et.

                                Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt neque ibe
                                porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sedv quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <div class="facility">
                                    <h4>Service Facilities</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit nim id est laborum. Sed ut perspiciatis unde omnis natus error sit voluptatem accus antium que laudantium totam rem aperiam eaque ipsa quae.
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Cepteur sint occaecat cupidatat non proident, 
                                        sunt in culpa qui officia deseruntrem.</p>
                                        <ul>
                                            <li>Euismod vel molestie elit faucibus</li>
                                            <li>Vitae tincidunt felis pharetra</li>
                                            <li>Faucibus odio quis eleifend eros</li>
                                            <li>Orci varius natoque penatibus  magnis</li>
                                            <li>Maecenas massa dui, molestie</li>
                                        </ul>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="faci_img float-right">
                                            <img src="img/cctv.jpg" alt="Service Facilities" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                    <p>Perspiciatis unde omnis natus error sit voluptatem accus antium que laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi arcnihite beatae vitae dicta sunt explicabo. nemo enim ipsam voluptatem quia voluptassit.</p>                      
                                </div>
                                <div class="facility serv_adva">
                                    <h4>Service Advantage</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit nim id est laborum. Sed ut perspiciatis unde omnis natus error sit voluptatem accus antium que laudantium totam rem aperiam eaque ipsa quae.</p>   

                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fas fa-shield-alt"></i>
                                            </span>
                                            <h4>SEQURE PAYMENT</h4>
                                            <p>Sunt in culpa qui officia eserunt mollit nim id est laborum Sed.</p>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <h4>BEST DATA SECURITY</h4>
                                            <p>Sunt in culpa qui officia eserunt mollit nim id est laborum Sed.</p>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fas fa-user-secret"></i>
                                            </span>
                                            <h4>QUALIFIED GUARDST</h4>
                                            <p>Sunt in culpa qui officia eserunt mollit nim id est laborum Sed.</p>
                                        </li>
                                    </ul>                   
                                </div>
                            </div>
                            <div id="Bank_Security" class="tab-pane fade"><br>
                                <h3>Bank_Security</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div id="Parking_Security" class="tab-pane fade"><br>
                                <h3>Parking Security</h3>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            <div id="Man_Security" class="tab-pane fade"><br>
                                <h3>Man_Security</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>
                        </div>
                    </div><!-- col-md-8  -->
                </div>
            </div>
        </div>

@endsection
