@extends('layouts.admin')

@section('css')
  @parent

   <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')

<h1 class="text-center">danh sách sản phẩm</h1>
<div id="container">
    <form method="GET">
        <input type="text" name="keyword">
        <button type="submit" placeholder="tìm kiếm">tìm kiếm</button>
    </form>
     <table class="table table-hover table table-bordered">
        <tr>
            <td>ID</td>
            <td>name</td>
            <td>author</td>
            <td>amount</td>
            <td colspan="2">chỉnh sửa</td>
        </tr>
        <tbody>
        @forelse ($book as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->author}}</td>
                <td>{{$item->amount}}$</td>
                <td>
                    <a href="{{url('book/sua'.$item->id)}}">Sửa</a>
                </td>
                <td>
                    <a href="{{url('book/xoa'.$item->id)}}">xóa</a>
                </td>
            </tr>
        @empty
        <tr>
            <td colspan="4">Danh sách sinh rỗng</td>
        </tr>
        @endforelse
        </tbody>
    </table>
    {{$book->withQueryString()->links()}}
</div>
@endsection

@section('scripts')
  @parent

  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
</script>


@endsection
