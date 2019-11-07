<section class="content-header">
        <h1>
            Funlocs
            <small>Create New</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
            <li class="active"><i class="fa fa-database"></i>RAK</a>
            <li><a href="{{url('/funlocs')}}"><i class="fa fa-tags"></i>Funloc</a>
            <li class="active"><i class="fa fa-plus"></i>Create New</a>
        </ol>
    </section>
    
    {{-- main content --}}
    <section>
        {{-- default box --}}
        <section class="content">
            <section class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update</h3>
                    <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#myModal">Delete</button>
                </div>
                <div class="box-body">
                    {{Form::open(array('url' => 'funlocs/update/'.$funlocs->idfunlocs, 'class' => 'form-horizontal'))}}
                    <div class="form-group">
                            <label class="col-sm-2 control-label">Cabang</label>
                            <div class="col-sm-10">
                              {{-- <textarea name="desc" rows="5" class="form-control" required></textarea> --}}
                              <input type="text" value="{{$funlocs->cabang}}" name="cabang" class="form-control" required>
                            </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table" style="border: 2px solid #d2d6de !important;">
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid #d2d6de !important; text-align:center">
                                        <label style="display: block;">1</label>
                                        <a class="btn btn-xs"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                     </td>
                                     <td style="border: 1px solid #d2d6de !important; ">
                                        <small><b>Number</b></small>
                                        <input type="text" value="{{$funlocs->number}}" name="number" id="number" class="form-control" required>
                                    </td>
                                    <td style="border: 1px solid #d2d6de !important;">
                                        <small><b>Description</b></small>
                                        <textarea  name="description" rows="1" id="description" class="form-control" required>{{$funlocs->description}}</textarea>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <a href="{{url('funlocs')}}" class="btn btn-warning pull-right">Back</a>
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                    </div>
                    {{ Form::close()}}
                </div>
            </section>
        </section>
    </section>
    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Delete Funloc</h4>
            </div>
            <div class="modal-body">
              <p>yakin mau hapus kenangan ini??</p>
            </div>
            <div class="modal-footer">
                {{Form::open(array('url' => 'funlocs/delete/'.$funlocs->idfunlocs,'method'=>'delete','class' => 'form-horizontal'))}}
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
              <input type="submit" class="btn btn-danger" value="Yes">
              {{Form::close()}}
            </div>
          </div>
          
        </div>
      </div>
      