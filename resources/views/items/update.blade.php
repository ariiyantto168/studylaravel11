<section class="content-header">
    <h1>
      Items
      <small>Master</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-database"></i> Master</a></li>
      <li><a href="{{url('items')}}"><i class="fa fa-inbox"></i> Items</a></li>
      <li class="active"><i class="fa fa-pencil"></i> Update</a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
  
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Update</h3>
        <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#myModal">Delete</button>
      </div>
      <div class="box-body">
        {{Form::open(array('url' => 'items/update/'.$items->iditems, 'class' => 'form-horizontal'))}}
        <div class="form-group">
          <label class="col-sm-2 control-label">Name Items</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$items->nameitems}}" name="nameitems" required>
          </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Categories</label>
            <div class="col-sm-10">
              <select class="form-control" id="sell"  name="idcategories">
                <option value="">-- select categories--</option>
                {{-- $categories ambil dr items controller di function createpage dan index --}}
                @foreach ($categories as $cat)
                {{-- idcategories dan name ambil dr model dan database --}}
                  <option value="{{$cat->idcategories}}" @if ($cat->idcategories == $items->idcategories) 
                      selected
                  @endif>{{$cat->name}}</option>
                @endforeach
              </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Unit</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$items->unit}}" name="unit" required>
            </div>
        </div>
              
        <div class="form-group">
          <label class="col-sm-2 control-label">Brand</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$items->brand}}" name="brand" required>
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
            <a href="{{url('items')}}" class="btn btn-warning pull-right">Back</a>
            <input type="submit" value="Save" class="btn btn-primary">
          </div>
        </div>
        {{ Form::close() }}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
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
          {{Form::open(array('url' => 'items/delete/'.$items->iditems,'method'=>'delete','class' => 'form-horizontal'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <input type="submit" class="btn btn-danger" value="Yes">
        {{Form::close()}}
      </div>
    </div>
    
  </div>
</div>
