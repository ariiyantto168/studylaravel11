<section class="content-header">
    <h1>Levels</h1>
    <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><i class="fa fa-building"></i>Levels</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Index</h3>
          <div class="box-tools pull-right">
                <a href="{{url('levels/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i>create New</a>
                <a href="{{url('levels/trash')}}" class="btn btn-box-tool" title="Restore"><i class="fa fa-undo"></i> Restore</a>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>No</th>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created_by</th>
                <th>status</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as $numbering => $level)
                <tr>
                <td>{{$numbering+1}}</td>
                <td>{{$level->code}}</td>
                <td>{{$level->name}}</td>
                <td>{{substr($level->description,0,20)}}</td>
                <td>{{$level->created_by}}</td>
                <td>
                    <center>
                    @if ($level->active)
                        <span class="label label-success">Actice</span>
                    @else
                        <span class="label label-danger">Inactive</span>
                    @endif
                    </center>
                </td>
                <td>
                <center>
                    <a href="{{url('/levels/update/'.$level->idlevels)}}"><i class="fa fa-pencil-square-o"></i></a>
                </center>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>