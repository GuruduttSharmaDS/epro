@extends('frontend.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')
    <div class="banner_search">
               <h1>FAQ</h1>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                   <li class="breadcrumb-item active">FAQ</li>                 
                </ul>
    </div>
           <div class="faq_panel">
            <div class="container">
                <div class="row" id="faq-accordion">
                    <div class="col-md-6">                      
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                        Etiam non ipsum sit amet tortor sodales #1

                                    <span class="toggle"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        Cras quis lectus auctor, scelerisque sem suscipit, tempus lorem Nunc sed mauris malesuada, auctor turpis quis, viverra dui Aliquam at urna in lacus varius imperdiet eu id ante scelerisque sem suscipit, tempus lorem Nunc sed mauris malesuada, auctor
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                        Etiam non ipsum sit amet tortor sodales #2
                                    <span class="toggle"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                        Etiam non ipsum sit amet tortor sodales #3
                                    <span class="toggle"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                                        Etiam non ipsum sit amet tortor sodales #4
                                    <span class="toggle"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
                                        Etiam non ipsum sit amet tortor sodales #5
                                    <span class="toggle"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                                    </a>
                                </div>
                                <div id="collapseFive" class="collapse" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                    </div><!-- col-end-->
                    <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#collapseOne1">
                                        Etiam non ipsum sit amet tortor sodales #6
                                    <span class="toggle"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                                    </a>
                                </div>
                                <div id="collapseOne1" class="collapse" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo2">
                                        Etiam non ipsum sit amet tortor sodales #7
                                    <span class="toggle"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                                    </a>
                                </div>
                                <div id="collapseTwo2" class="collapse" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree3">
                                        Etiam non ipsum sit amet tortor sodales #8
                                    <span class="toggle"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                                    </a>
                                </div>
                                <div id="collapseThree3" class="collapse" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour3">
                                        Etiam non ipsum sit amet tortor sodales #9
                                    <span class="toggle"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                                    </a>
                                </div>
                                <div id="collapseFour3" class="collapse" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive5">
                                        Etiam non ipsum sit amet tortor sodales #10
                                    <span class="toggle"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                                    </a>
                                </div>
                                <div id="collapseFive5" class="collapse" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                    
                    </div><!-- col-end -->
                </div>
            </div>
        </div>

@endsection
