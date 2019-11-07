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
            <h3 class="box-title">Create New</h3> 
        </div>
        <div class="box-body">
                {{ Form::open(array('url' => 'levels/create-new', 'class' => 'form-horizontal')) }}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Code</label>
                  <div class="col-sm-5">
                    <!-- {{-- name:name untuk melempar controller ke database --}} -->
                    <input type="text" class="form-control" placeholder="Code" name="code" required>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-5">
                          <!-- {{-- name:name untuk melempar controller ke database --}} -->
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-5">
                        <textarea name="description" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label">Created by</label>
                    <div class="col-sm-5">
                         <!-- {{-- name:name untuk melempar controller ke database --}} -->
                        <input type="text" class="form-control" placeholder="Created_by" name="created_by" required>
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