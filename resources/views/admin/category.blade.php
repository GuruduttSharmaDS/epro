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
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><span>Countries</span></li>
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
                    <h4 class="header-title"><span>Add New</span> Category</h4>
                    <form class="needs-validation" novalidate="" id="my-form" method="post" action="{{route('savecategory')}}">
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
                                <label for="category">Category name</label>
                                <input type="text" class="form-control" id="cat_name" name="category_name" placeholder="Enter category" value="" required="">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid category.
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
                    <h4 class="header-title">Categories</h4>
                    <div class="data-tables datatable-dark">
                        <table id="my-dataTable" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Category</th>
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
        $(function() {
            $('#my-dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/dashboard/category_data') }}',
                columns: [
                { data: 'category_name', name: 'category_name' },
                { data: 'created_at', name: 'created_at' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
                ]
            });
        });
    </script>
    <script type="text/javascript">
        $(document).on('click', ".btn-edit", function(){
            debugger;
                $("#my-form").find('.alert').fadeOut();
                $("#my-form").find('.hiddenval').val($(this).data('id'));
                $("#my-form").find('#cat_name').val($(this).closest('tr').find('td:eq(0)').text());
                $('.header-title span').text('update');
            });
    </script>

    <script>
        $(function () {

            $(document).on("click", ".btn-delete", function () {

                var conf = confirm("Are you sure want to delete ?");

                if (conf) {

                    // ajax call functions
                    var delete_id = $(this).attr("data-id"); // delete id of delete button

                    var postdata = {
                        "_token": "{{ csrf_token() }}",
                        "hiddenval": delete_id
                    }

                    $.post("{{ route('deletecategory') }}", postdata, function (response) {
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