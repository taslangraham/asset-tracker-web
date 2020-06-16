@extends('layouts.admin')


@section('breadcrumb-title')
Manufacturer / Add
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

            <form action="{{route('manufacturers.store')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Add Manufacturer
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="name">
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