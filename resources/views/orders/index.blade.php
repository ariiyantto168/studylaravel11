<section class="content-header">
    <h1>Order</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-order"></i> Order</li>
    </ol>
</section>

<section class="content">
     <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Index</h3>
            <div class="box-tools pull-right">
             <a href="{{url('orders/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i>create New</a>
             </div>
        </div>
    </div>
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Code</th>
                  <th>due_date</th>
                  <th>date_orders</th>
                  {{-- <th>Created_By</th> --}}
                  <th>Received By</th>
                  <th>Accepted By</th>
                  <th>Status</th>
                  <th>Action</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              @foreach ($orders as $number => $order)
              <tr>
                  <td>{{$number+1}}</td>
                  <td>{{$order->code}}</td>
                  <td>{{date('d M Y' , strtotime($order->due_date))}}</td>
                  <td>{{date('d M Y' , strtotime($order->date_orders))}}</td>
                  {{-- <td><center>{{$order->users->name}}</center></td> --}}
                  <td>
                    <center>
                      @if (isset($order->received))
                          {{$order->received->users->name}}
                      @else
                      -
                      @endif
                    </center>
                  </td>
                  <td>
                      <center>
                      @if (isset($order->accepted))
                        {{$order->accepted->users->name}}
                      @else
                      -
                      @endif
                      </center>
                    </td>
                    <td>
                        @if ($order->status == 'p')
                          <center>
                            <span class="label label-default">Pending</span>
                          <center>
                        @elseif($order->status == 'w')
                          <center>
                            <span class="label label-warning">Wait</span>
                          </center>
                        @elseif($order->status == 'a')
                          <center>
                            <span class="label label-success">Accepted</span>
                          </center>
                        @elseif($order->status == 'f')
                          <center><span class="label label-danger">Failed</span></center>
                        @endif
                      </td>
                      <td></td>
                      <td>
                          <center>
                              <a href="{{url('/orders/view/'.$order->idorders)}}" ><i class="fa fa-eye"></i></a>
                              <a href="{{url('/orders/update/'.$order->idorders)}}"><i class="fa fa-pencil-square-o"></i></a>
                          </center>
                      </td>
              </tr>
              @endforeach
          </tbody>
      </table>

  </div>
            
</section>