<section class="content-header">
    <h1>Funloc</h1>
    <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><i class="fa fa-tags"></i>Funloc</li>
    </ol>   
</section>

{{-- MAIN CONTENT --}}
<section class="content">

    {{-- default box --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Index</h3>
            <div class="box-tools pull-right">
                <a href="{{url('funlocs/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i> Create New</a>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>cabang</th>
                    <th>number</th>
                    <th>description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($funlocs as $numbering => $funloc)
                    <tr>
                        <td>{{$numbering+1}}</td>
                        <td>{{$funloc->cabang}}</td>
                        <td>{{$funloc->number}}</td>
                        <td>{{$funloc->description}}</td>
                        <td>
                         <center>
                            <a href="{{url('/funlocs/update/'.$funloc->idfunlocs)}}"><i class="fa fa-pencil-square-o"></i></a>
                         </center>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>