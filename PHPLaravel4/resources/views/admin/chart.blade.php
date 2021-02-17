@extends('admin.admin')
@section('title', "Tranh chủ admin")
<link href="{!!  asset('css/css_loading.css') !!}" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-12">
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Biểu đồ lượng tin tức của các thể loại
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body" style="height: 400px">
                    {!! $usersChart->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@if($usersChart) {!! $usersChart->script() !!} @endif
@endsection
