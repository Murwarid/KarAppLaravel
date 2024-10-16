@extends('Karapp.home')
@section('content')

<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>حساب کاربران فعال
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

                        <div style="margin-right: -29px; margin-top: 20px;" class="col-md-12 col-lg-12" >
                     <form action="usersdata" method="get">   
                    <div class="col-md-6">
                    
                 <input class="form-control col-md-12 col-xs-12" data-validate-length-range="16" type="text" name="search"
                                           placeholder="اسم" required="required" type="text">
                          
                       
                   </div>

                      <div class="col-md-3 col-lg-3">

                        <button type="submit" class="btn btn-primary">جستجو</button>
                      </div>
                    </form>
                  </div>

                    </div>
                    <div class="x_content">
                      
            
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>اسم</th>
                                <th>تخلص</th>
                                <th>شغل</th>
                                <th>شماره تلفون</th>
                                <th>ولایت</th>
                                <th>عکس</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($users as $data)
                            <tr>
                           
                                <td>{{$data->name}}</td>
                                <td>{{$data->last_name}}</td>
                                <td>{{$data->job}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->pName}}</td>
                                <td>
                                <img src="{{$data->image}}" height="100" width="100"/>
                                </td>
                                
                              

                                <td>
                                <a href="user_delete/{{$data->id}}"  class="btn btn-danger" >حذف</a>
                                </td>
                            
                            </tr>
                            @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- delete confirmation -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content" >
      <div class="modal-header" >
        <h4 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@stop