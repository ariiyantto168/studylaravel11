<section class="content-header">
        <h1>Items</h1>
        <ol class="breadcrumb">
          <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><i class="fa fa-inbox"></i> Items</li>
        </ol>
</section>

<section class="content">

    {{-- default box --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Index</h3>
            <div class="box-tools pull-right">
                <a href="{{url('items/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i>Create New</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name Items</th>
                        <th>Categories</th>
                        <th>Unit</th>
                        <th>Brand</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $jancuk => $items)
                    <tr>
                        <td>{{$jancuk+1}}</td>
                        <td>{{$items->nameitems}}</td>
                        <td>{{$items->categories->name}}</td>
                        <td>{{$items->unit}}</td>
                        <td>{{$items->brand}}</td>
                        <td>
                            <center>
                                @if ($items->active)
                                <span class="label label-success">Actice</span>
                                @else
                                <span class="label label-danger">Inactive</span>
                                @endif
                            </center>
                        </td>
                        <td>
                            <center>
                                <a href="{{url('/items/update/'.$items->iditems)}}"><i class="fa fa-pencil-square-o"></i></a>
                            </center>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        
            
    </div>
</section>