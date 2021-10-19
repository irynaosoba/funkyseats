@extends('layouts.default')

@section('title', 'Home Page')

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <!-- <li class="breadcrumb-item"><a href="javascript:;">Home</a></li> -->
        <!-- <li class="breadcrumb-item"><a href="javascript:;">Library</a></li>
                                      <li class="breadcrumb-item active"><a href="javascript:;">Data</a></li> -->
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h4 class="fw-600 text-center pr-20px">Choose a room
        <!-- <small>header small text goes here...</small> -->
    </h4>
    <!-- end page-header -->

    <!-- begin panel -->
    <!-- <div class="panel panel-inverse">
                                      <div class="panel-heading">
                                       <h4 class="panel-title">Panel Title here</h4>
                                       <div class="panel-heading-btn">
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                       </div>
                                      </div>
                                      <div class="panel-body">
                                       Panel Content Here
                                      </div>
                                     </div>
                                     -->
    <!-- end panel -->
    <!-- {{ $rooms[3]->seat_count }} -->
    <div class='d-flex flex-wrap justify-content-around mt-30px'>
        @foreach ($rooms as $room)
            @component('includes.component.home-component')
                @slot('id')
                    {{ $room->id }}
                @endslot
                @slot('name')
                    {{ $room->name }}
                @endslot
                @slot('seatCount')
                 {{ $room->seat_count }}
                @endslot
            @endcomponent
        @endforeach
    </div>
@endsection
