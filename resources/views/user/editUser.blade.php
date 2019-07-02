@extends('masterAd')
@section('user.content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa tài khoản
                            <small>{{$user->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px;">
                        <form action="" method="post">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                           @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                         @endif  
                            @if(Session::has('thanhcong'))
                              <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                             @endif
                        <hr>
                          
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="name" placeholder="nhập họ tên"  required="vui lòng nhập trường này" value="{{$user->name}}" disabled="" />
                            </div>
                             <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email"placeholder="nhập email" value="{{$user->email}}"  required="vui lòng nhập trường này" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Quyền </label>
                                 @if($user->role ==1)
                                <label class="radio-inline">
                                    <input type="radio" name="quyen" checked="" value="1">Quản trị
                                </label>
                                    <label class="radio-inline">
                                            <input type="radio" name="quyen"  value="0">Thường
                                        </label>
                                @else 
                                     @if($user->role ==1)
                                             <label class="radio-inline">
                                    <input type="radio" name="quyen"  value="1">quản trị
                                </label>
                                    <label class="radio-inline">
                                            <input type="radio" name="quyen"  value="0">Thường
                                        </label>
                                      @else    
                               <label class="radio-inline">  
                                 <input type="radio" name="quyen"  value="1">quản trị
                                </label>
                               <label class="radio-inline">
                                 <input type="radio" name="quyen" checked=""  value="0" >thường
                                </label>
                                     @endif 
                                 @endif       
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Bỏ qua</button>
                       
                        </form>
                  

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection