@extends('layouts.admin')


@section('breadcrumb-title')
Beacons / Add
@endsection


@section('content')
<div class="container">
    <div class="row">

        <div class="col-12 col-sm-12 col-md-6 offset-md-3 offset-sm-0">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <form action="{{route('beacons.store')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Add Beacon
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">UUID</label>
                            <input name="beacon_uuid" type="text" class="form-control" placeholder="Beacon UUID">
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="name">
                        </div>

                        <div class="form-group">
                            <label for="name">Manufacturer</label>
                            <select name="manufacturer" id="" class="form-control">
                                <option value="0" disabled selected>Choose Manufacturer</option>
                                @if (count($manufacturers)>0)
                                @foreach ( $manufacturers as $manufacturer )
                                <option value="{{$manufacturer->manufacturer_id}}">{{$manufacturer->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="0" disabled selected>Choose Status</option>
                                @if (count($statuses)>0)
                                @foreach ( $statuses as $status )
                                <option value="{{$status->status_id}}">{{$status->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Location</label>
                            <select name="location" id="" class="form-control">
                                <option value="0" disabled selected>Choose Status</option>
                                @if (count($locations)>0)
                                @foreach ( $locations as $location )
                                <option value="{{$location->location_id}}">{{$location->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="btn-group">
                            <button class="btn btn-success">Add</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection