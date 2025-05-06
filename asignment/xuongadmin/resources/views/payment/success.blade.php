@extends('template.user')
@section('body')
<style>


    .success-message {

        height: 90vh;
      background-color: white;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 128, 0, 0.15);
      text-align: center;
    }

    .icon {
      font-size: 80px;
      margin-bottom: 20px;
    }

    .success {
      font-size: 24px;
      margin-bottom: 20px;
      color: #2ecc71;
    }

    .btn-back {
      display: inline-block;
      padding: 10px 20px;
      background-color: #2ecc71;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }

    .btn-back:hover {
      background-color: #27ae60;
    }
  </style>

<div class="success-message">
    <p class='icon'>✅</p>
    <h1 class="success"> Thanh toán thành công</h1>
    <a class="btn-back" href="/">Quay lại trang chủ</a>
</div>
@endsection
