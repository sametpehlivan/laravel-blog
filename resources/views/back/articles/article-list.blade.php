@extends('back.layouts.master')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>


                    @foreach($columns as $column )

                        <th>
                            {{$column}}
                        </th>

                    @endforeach
                        <th>
                            Kategori
                        </th>
                        <th>
                            Düzenle/Sil
                        </th>


                    </tr>
                    </thead>

                    <tbody>

                    @foreach($articles as $article)
                    <tr>
                        @foreach($columns as $key => $value )

                            <td>
                                <p>{{ strlen($article[$key]) > 200 ? (substr($article[$key],0,200).'...' ) : $article[$key] }}</p>
                            </td>

                        @endforeach
                        <td>
                            <p>{{str_replace('-',' ',strtoupper($article->getCategory->slug))}}</p>
                        </td>
                        <td>
                            <a href="{{route('admin.articles.destroy',$article->slug)}}" class="btn btn-circle bg-danger">
                                <i class="fas fa-trash text-white"></i>
                            </a>
                            <a href="{{route('admin.articles.edit',$article->slug)}}" class="btn btn-circle bg-warning">
                                <i class="fas fa-pen text-white"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripst')
    <!-- Page level plugins -->
    <script src="{{asset('public/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('public/')}}/js/demo/datatables-demo.js"></script>

@endsection
