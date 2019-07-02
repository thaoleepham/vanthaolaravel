@extends('masterAd')
@section('user.content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Thêm tài khoản</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('admin-addUser')}}" method="POST">
                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <hr>
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
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="name" placeholder="nhập họ tên"  required="vui lòng nhập trường này" />
                            </div>
                             <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email"placeholder="nhập email"  required="vui lòng nhập trường này" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password" placeholder="nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="re_password" placeholder="nhập lại mật khẩu"  required="vui lòng nhập trường này" />
                            </div>
                            <div class="form-group">
                                <label>Quyền </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" checked="" type="radio">Quản trị
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" type="radio">Thường
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Bỏ qua</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
        