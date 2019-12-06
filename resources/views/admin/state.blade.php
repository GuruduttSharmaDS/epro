@extends("admin.layouts.layout")

@section("title","Admin Dashboard | Market Place")

@section("header-page-script")   
    
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/jquery.dataTables.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/responsive.bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/jqueryui.min.css') !!}">

    <!-- others css -->
    <link rel="stylesheet" href="{!! asset('assets/css/typography.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/default-css.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/styles.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/responsive.css') !!}">
    <!-- modernizr css -->
    <script src="{!! asset('assets/js/vendor/modernizr-2.8.3.min.js') !!}"></script>
@endsection

@section("content")   

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <!-- <h4 class="page-title pull-left">Dashboard</h4> -->
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><span>States</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">

        <!-- Server side start -->
        <div class="col-4">
            <div class="card mt-5">

                <div class="card-body">
                    <h4 class="header-title"><span>Add New</span> State</h4>
                    <form class="needs-validation" novalidate="" id="my-form" method="post" action="{{ route('saveState') }}">
                        <div class="form-row">
                            @if(session("msg"))
                            <div class="alert-dismiss">
                                <div class="alert alert-success alert-dismissible fade show">
                                    <span>{{session("msg")}}</span><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="fa fa-times"></span> </button><br/>
                                </div>
                            </div>
                            @endif
                            @if(count($errors)>0)
                            <div class="alert-dismiss">
                                <div class="alert alert-danger alert-dismissible fade show">
                                    @foreach($errors->all()  as $error)
                                        <span>{{$error}}</span><br/>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="fa fa-times"></span>
                                    </button>
                                </div>
                            </div>
                            @endif
                            <input type="hidden" name="hiddenval" class="hiddenval" value="0">
                            {!!csrf_field()!!}
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="country_id">Countries</label>
                                    <select class="form-control" id="country_id" name="country_id">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">State</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter State" value="" required="">
                                </div>
                               
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>
                            </div>                                        
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Server side end -->
        <!-- Dark table start -->
        <div class="col-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">State</h4>
                    <div class="data-tables datatable-dark">
                        <table id="my-dataTable" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>State</th>
                                    <th>Create Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                                                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark table end -->
    </div>
</div>

@endsection


@section("footer-page-script")
    <!-- Start datatable js -->
    <script src="{!! asset('assets/js/jquery.dataTables.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('assets/js/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('assets/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! asset('assets/js/responsive.bootstrap.min.js') !!}"></script>
    <!-- others plugins -->
    <script src="{!! asset('assets/js/plugins.js') !!}"></script>
    <script src="{!! asset('assets/js/scripts.js') !!}"></script>
    <script src="{!! asset('assets/js/admin.js') !!}"></script>
    
    <script>

        // Countries Drop down
        $(function() {
            
            $.get("{{ route('countriesDropdown') }}", [], function (response) {
                $('#country_id').html(response);
            })

            $(document).on("change", "#country_id", function ()  {

                // ajax call functions
                var country_id = $(this).val(); 
                // alert (country_id);

                var stateListing = BASEURL + "/dashboard/stateListing?country_id=" + country_id;

                $('#my-dataTable').dataTable().fnDestroy();

                $('#my-dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: stateListing,
                    columns: [
                        { data: 'name', name: 'name' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'status', name: 'status' },
                        { data: 'action', name: 'action' }
                    ]
                });
            });
        });

        // Item listing
        $(function() {
            $('#my-dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/dashboard/stateListing?country_id=233') }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action' }
                ]
            });
        });

        // Edit Item
        $(document).on('click', ".btn-edit", function(){
            debugger;
            $("#my-form").find('.alert').fadeOut();
            $("#my-form").find('.hiddenval').val($(this).data('id'));
            $("#my-form").find('#name').val($(this).closest('tr').find('td:eq(0)').text());
            $('.header-title span').text('update');
        });

        // Delete Item
        $ (function () {
            $(document).on("click", ".btn-delete", function ()  {

                var conf = confirm("Are you sure want to delete ?");
                if (conf) {

                    // ajax call functions
                    var delete_id = $(this).attr("data-id"); // delete id of delete button

                    var postdata = {
                        "_token": "{{ csrf_token() }}",
                        "hiddenval": delete_id
                    }

                    $.post("{{ route('deleteState') }}", postdata, function (response) {
                        debugger;
                        var data = $.parseJSON(response);
                        if (data.status == 1) {
                            location.reload();
                        } else {
                            alert(data.message);
                        }
                    })
                }
            });
        });
    </script>
@endsection