<section class="content-header">
    <h1>
        Levels
        <small>RAK</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>RAK</a>
        <li><a href="{{url('/levels')}}"><i class="fa fa-building"></i>Levels</a>
        <li class="active"><i class="fa fa-plus"></i>Create New</a>
    </ol>
</section>

<section class="content">
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">update</h3>
        <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#myModal">Delete</button> 
    </div>
    <div class="box-body">
        {{Form::open(array('url' => 'levels/update/'.$level->idlevels, 'class' => 'form-horizontal'))}}
            <div class="form-group">
              <label class="col-sm-2 control-label">Code</label>
              <div class="col-sm-5">
                <!-- {{-- name:name untuk melempar controller ke database --}} -->
                <input type="text" class="form-control" value="{{$level->code}}" name="code" required>
              </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-5">
                      <!-- {{-- name:name untuk melempar controller ke database --}} -->
                    <input type="text" class="form-control" value="{{$level->name}}" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-5">
                    <textarea name="description" rows="5" class="form-control">{{$level->description}}</textarea>
                </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Created by</label>
                <div class="col-sm-5">
                     <!-- {{-- name:name untuk melempar controller ke database --}} -->
                    <input type="text" class="form-control" value="{{$level->created_by}}" name="created_by" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="active" checked> Active
                    </label>
                </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <a href="{{url('levels')}}" class="btn btn-warning pull-right">Back</a>
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </div>
            
            {{ Form::close() }}
    </div>
</div>
</section>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Items</h4>
        </div>
        <div class="modal-body">
          <p>yakin mau hapus kenangan ini??</p>
        </div>
        <div class="modal-footer">
            {{Form::open(array('url' => 'levels/delete/'.$level->idlevels,'method'=>'delete','class' => 'form-horizontal'))}}
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <input type="submit" class="btn btn-danger" value="Yes">
          {{Form::close()}}
        </div>
      </div>
      
    </div>
  </div>
  