@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('breadcrumb-title')
Vendors
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <a href="{{route('vendors.create')}}"><button class="btn btn-success">
                    Add New
                </button></a>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>Actions</th>

                    </tr>
                </thead>

                <tbody>
                    @if (count($vendors) > 0)
                    @foreach ($vendors as $vendor )

                    <tr>
                        <td><span>{{$vendor->name}}</span></td>

                        <td>
                            <form action="{{route('vendors.destroy',['vendor'=>$vendor->vendor_id])}}" method="POST">
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