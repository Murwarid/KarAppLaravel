@extends('Karapp.home')
@section('content')

<div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                           فعالیت کاربر
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
                    <form>
                    
                    </form>
                    <div class="x_content">
                    <div class="col-md-12 col-lg-12" style="margin-bottom: 10px;">
                    <!-- start search -->
                     
            
                      <div class="col-md-3 col-lg-3">
                      
                      </div>
                    
                    <!-- end search -->
                  </div>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                            <td>شماره</td>
                                <th>اسم کامل</th>
                                <th>عنوان</th>
                                <th>آدرس</th>
                                <th>جزییات</th>
                                <th>عکس</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $x=1; ?>
                             @foreach($PostData as $data)
                            <tr>
                                 <td>{{$x}}</td>
                                <td>{{$data->name}} {{$data->last_name}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->adress}}</td>
                                <td>{{$data->text}}</td>
                                <td>
                                <img src="{{url($data->pimage)}}" height="100" width="100"/>
                                </td>

                                <td>
                                <!-- <a href="deletepsot/{{$data->id}}"  class="btn btn-danger"  >حذف</a> -->
                                
<a class="btn btn-danger" onclick="return confirm('آیا میخواهید حذف کنید؟')" href="post_delete/{{$data->id}}"><i class="fa fa-trash"></i></a>

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