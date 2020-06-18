@extends('layouts.admin')
@section('breadcrumb-title')
Assets
@endsection

@section('title')
Assets | Create
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12 col-sm-12 col-md-12 offset-sm-0 offset-md-0">

            @if ($errors->any())
            <div class="alert alert-danger col-12">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{route('assets.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="card col-6 col-sm-12 col-md-5 ml-auto mr-auto">
                        <div class="card-header">
                            Asset Details
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input value="{{ old('name') }}" type="text" name="name" class="form-control"
                                    placeholder="Name">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea placeholder="Type Decsription" name="description" id="" cols="30" rows="5"
                                    class="form-control" value="{{ old('description') }}"></textarea>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="value">Value</label>
                                    <input type="number" value="{{ old('value') }}" name="value" class="form-control"
                                        placeholder="Value">
                                </div>
                                <div class="form-group col-6">
                                    <label for="date_purchased">Date Purchased</label>
                                    <input value="{{ old('date_purchased') }}" type="date" name="date_purchased"
                                        class="form-control">
                                </div>
                            </div>



                            <div class="row">
                                <div class="form-group col-6">
                                    {{-- <label for="manufacturer">Manufacturer</label> --}}
                                    <select name="manufacturer_id" class="form-control">
                                        <option value="0" selected disabled>Select Manufacturer</option>
                                        @if (count($manufacturers) >0)}}
                                        @foreach ($manufacturers as $manufacturer)
                                        <option value="{{$manufacturer->manufacturer_id}}"
                                            {{old('manufacturer_id')==$manufacturer->manufacturer_id?"selected":"" }}>
                                            {{$manufacturer->name}}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    {{-- <label for="vendor_id">Vendor</label> --}}
                                    <select name="vendor_id" class="form-control">
                                        <option value="0" selected disabled>Select Vendor</option>
                                        @if (count($vendors) >0)}}
                                        @foreach ($vendors as $vendor)
                                        <option {{old('vendor_id')==$vendor->vendor_id?"selected":"" }}
                                            value="{{$vendor->vendor_id}}">{{$vendor->name}}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    {{-- <label for="categroy_id">Category</label> --}}
                                    <select name="category_id" class="form-control">
                                        <option value="0" selected disabled>Select Category</option>
                                        @if (count($categories) >0)}}
                                        @foreach ($categories as $category)
                                        <option {{old('category_id')==$category->category_id?"selected":"" }}
                                            value="{{$category->category_id}}">{{$category->name}}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    {{-- <label for="condition_id">Condition</label> --}}
                                    <select name="condition_id" class="form-control">
                                        <option value="0" selected disabled>Select Condition</option>
                                        @if (count($conditions) >0)}}
                                        @foreach ($conditions as $condition)
                                        <option value="{{$condition->condition_id}}"
                                            {{old('condition_id')==$condition->condition_id?"selected":"" }}>
                                            {{$condition->name}}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    {{-- <label for="condition_id">Assigned Location</label> --}}
                                    <select name="location_id" class="form-control">
                                        <option value="0" selected disabled>Select Location</option>
                                        @if (count($locations)>0)
                                        @foreach ( $locations as $location )
                                        <option {{old('location_id')==$location->location_id?"selected":"" }}
                                            value="{{$location->location_id}}">{{$location->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <select name="size_id" class="form-control">
                                        <option value="0" selected disabled>Select Size</option>
                                        @if (count($sizes)>0)
                                        @foreach ( $sizes as $size )
                                        <option value="{{$size->size_id}}"
                                            {{old('size_id')==$size->size_id?"selected":"" }}>{{$size->name}}</option>
                                        @endforeach
                                        @endif <option value="0" selected disabled>Select Size</option>

                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <select name="status_id" id="" class="form-control">
                                        <option value="0" disabled selected>Choose Status</option>
                                        @if (count($statuses)>0)
                                        @foreach ( $statuses as $status )
                                        <option value="{{$status->status_id}}"
                                            {{old('status_id')==$status->status_id?"selected":"" }}>{{$status->name}}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-6 col-sm-12 col-md-5 ml-auto mr-auto" style="height: auto;">
                        <div class="card-header">
                            Beacon Details
                        </div>
                        <div class="form-group">
                            <label for="name">UUID</label>
                            <input name="beacon_uuid" value="{{ old('beacon_uuid') }}" type="text" class="form-control"
                                placeholder="Beacon UUID">
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{ old('beacon_name') }}" name="beacon_name" type="text" class="form-control"
                                placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Manufacturer</label>
                            <select name="beacon_manufacturer_id" id="" class="form-control">
                                <option value="0" disabled selected>Choose Manufacturer</option>
                                @if (count($manufacturers) >0)}}
                                @foreach ($manufacturers as $manufacturer)
                                <option {{old('beacon_manufacturer_id')==$manufacturer->manufacturer_id?"selected":"" }}
                                    value="{{$manufacturer->manufacturer_id}}">{{$manufacturer->name}} </option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Status</label>
                            <select name="beacon_status_id" id="" class="form-control">
                                <option value="0" disabled selected>Choose Status</option>
                                @if (count($statuses)>0)
                                @foreach ( $statuses as $status )
                                <option {{old('beacon_status_id')==$status->status_id?"selected":"" }}
                                    value="{{$status->status_id}}">{{$status->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="name">Location</label>
                            <select name="location" id="" class="form-control">
                                <option value="0" disabled selected>Choose Status</option>
                                @if (count($locations)>0)
                                @foreach ( $locations as $location )
                                <option value="{{$location->location_id}}">{{$location->name}}</option>
                        @endforeach
                        @endif
                        </select>

                    </div> --}}
                </div>



        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <div class="btn-group">
                        <button class="btn btn-success form-control">Save</button>
                    </div>
                </div>
            </div>
        </div>
        </form>



    </div>
</div>
</div>
@endsection