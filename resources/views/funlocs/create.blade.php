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
                <h3 class="box-title">Create New</h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('url' => 'funlocs/create-new', 'class' => 'form-horizontal')) }}
                <div class="form-group">
                        <label class="col-sm-2 control-label">Cabang</label>
                        <div class="col-sm-10">
                          {{-- <textarea name="desc" rows="5" class="form-control" required></textarea> --}}
                          <input type="text" name="cabang" class="form-control" required>
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
                                 <td width="250" style="border: 1px solid #d2d6de !important;">
                                    <small><b>Level</b></small><br>
                                    <select class="form-control select2" name="idlevels" id="idlevel" required>
                                        <option value="">-- select level--</option>
                                        @foreach ($levels as $lev)
                                        {{-- idcategories dan name ambil dr model dan database --}}
                                          <option value="{{$lev->idlevels}}">{{$lev->name}}</option>
                                        @endforeach
                                    </select>
                                  </td>
                                 <td style="border: 1px solid #d2d6de !important; ">
                                    <small><b>Number</b></small>
                                    <input type="text" name="number" id="number" class="form-control" required>
                                </td>
                                <td style="border: 1px solid #d2d6de !important;">
                                    <small><b>Description</b></small>
                                    <textarea name="description" rows="1" id="description" class="form-control" required></textarea>
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