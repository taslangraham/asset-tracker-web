@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('breadcrumb-title')
Beacons
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <a href="{{route('beacons.create')}}"><button class="btn btn-success">
                    Add New
                </button></a>
        </div>
        <div class="card-body">
            <div class="card-header">
                <h2 class="jumbotron-fluid text-center">Beacons</h2>
            </div>
            <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>UUID</th>
                        <th>Manufacturer</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                </thead>

                <tbody>
                    @if (count($beacons) > 0)
                    @foreach ($beacons as $beacon)

                    <tr>
                        <td><span>{{$beacon->name}}</span></td>
                        <td><span>{{$beacon->beacon_uuid}}</span></td>
                        <td><span>{{$beacon->manufacturer->name}}</span></td>
                        <td><span>{{$beacon->location->name}}</span></td>
                        <td><span>{{$beacon->status->name}}</span></td>

                        <td>
                            <form action="{{route('beacons.destroy',['beacon'=>$beacon->beacon_uuid])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn text-danger">
                                    <i class="fas fa-trash"></i>

                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection