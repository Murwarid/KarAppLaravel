@extends('Karapp.home')
@section('content')

<div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="x_panel">
                    <div class="x_title">
                        <h2>لست املاک اضافه شده توسط ادمین
                           
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">تنظیمات 1</a>
                                    </li>
                                    <li><a href="#">تنظیمات 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="x_content">
                    <div class="col-md-12 col-lg-12" style="margin-bottom: 10px;">
                    <!-- start search -->
                     <form action="">   
                  

                   

                      <div class="col-md-3 col-lg-3">

                        <button type="submit" class="btn btn-primary">جستجو</button>
                      </div>
                    </form>
                    <!-- end search -->
                  </div>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                            <td>شماره</td>
                                <th>کاربر گزارش شده</th>
                                <th>جزییات گزارش</th>
                                <th>عکس پروفایل</th>
                                <th>دیدن فعالیت کاربر</th>
                                <th>نورمال</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $x=1; ?>
                             @foreach($PostData as $data)
                            <tr>
                                 <td>{{$x}}</td>
                                <td>{{$data->name}} {{$data->last_name}}</td>
                                <td>{{$data->detail}}</td>
                                <td>
                                <img src="{{$data->image}}" height="100" width="100"/>
                                </td>

                                <td>
                                <a href="user_posts/{{$data->u_id}}"  class="btn btn-warning" ><i class="fa fa-eye"></i></a>
                                </td>

<td>
                                <!-- <a href="deletepsot/{{$data->id}}"  class="btn btn-danger"  >حذف</a> -->
                                
<a class="btn btn-success" onclick="return confirm('آیا این پست نورمال هست؟')" href="report_delete/{{$data->id}}"><i class="fa fa-check"></i></a>
</td>
                            </tr>
                            <?php $x++; ?>
                            @endforeach 
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>

    <!--delete function-->

    <script type="text/javascript">
   
  </script>
    
@stop