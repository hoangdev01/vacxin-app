<!DOCTYPE html>
<html>
<head>
    <title>Bạn đã đăng ký dịch vụ tiêm vắc xin</title>
    <link rel="stylesheet" href="{{asset('Content/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('Content/css/common.css?vs=06')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('Content/css/jquery.mmenu.all.css')}}" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('Content/css/style.css?vs=06')}}">
    <!-- slide chân trang-->
    <link href="{{asset('Content/css/chantrang.css?vs=06')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('Content/css/extend.css?a=5')}}">
</head>
<body>
    <div class="container my-4" style="padding-bottom: 100px;" id="order-code">
        <div class="title text-center my-5">
            <h1 style="text-align: center" class="my-5 text-success font-weight-bold" style="font-size: 30px;">XÁC NHẬN THANH TOÁN</h1>
            <div class="pay-info my-5" style="width: 50%; margin: auto; border: 3px solid green; padding: 10px;">
                <h2 style="text-align: center" class="d-block my-3 font-weight-bold">Khách hàng đã thanh toán đăng ký tiêm chủng thành công</h2>
                <p style="text-align: center" class="font-italic d-block my-3">Mã đơn đăng ký tiêm chủng của khách hàng: {{$code}}</p>
                <p style="text-align: center" class="font-italic d-block my-3">Chi phí đăng ký tiêm chủng của khách hàng: {{$total}} VND</p>
            </div>
        </div>
    </div>
</body>
</html> 