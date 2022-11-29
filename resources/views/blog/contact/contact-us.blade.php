@extends('blog.master')
@section('title')
    JR Blog - Contact Us
@endsection
@section('content')
    <div class="container">
        <div class="row mt-5 blog-alert">
            <div class="col-md-12 mt-5 blog-alert bg-info">
                <h1 class="contact_taital text-center text-white">Share your opinion with us...</h1>
            </div>
            <div class="col-md-6 mt-5">
                <div class="row">
                    <div class="col-md-12">
                            <strong>
                                As we are fresher, so mistakes should be overlooked. If you have any suggestion regarding this for improvement, please send us your opinion.
                            </strong>
                    </div>
                    <div class="col-md-12 mt-5">
                            <img src="{{ asset('frontEndAsset') }}/img/con_pic.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <h2>{{Session::get('success')}}</h2>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contact.us.store') }}" method="post">
                            {{ csrf_field() }}
                            <label for="">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <label for="">Contact Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            <label for="">Subject</label>
                            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
                            @if ($errors->has('subject'))
                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                            @endif
                            <label for="">Feedback</label>
                            <textarea name="message" id="" cols="30" rows="5" class="form-control">{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                            <br>
                            <input type="submit" value="Send Feedback" class="btn btn-outline-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-primary mt-1 text-center" role="alert">
                            <h2>This site is developed by:</h2>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-center">
                        <img src="{{ asset('frontEndAsset') }}/img/john.jpg" alt="" style="height: 250px; width: 250px; border-radius: 50%;">
                    </div>
                    <div class="card-body">
                        <h4><b>Mehedi Hasan John</b></h4>
                        <span>BSc in CSE</span> <br>
                        <strong>Laravel Developer</strong>
                    </div>
                    <div class="card-footer text-center">
                        <a href="https://mhjohn.com/" class="btn btn-outline-success">Visit Portfolio</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-primary mt-1 text-center" role="alert">
                            <h2>This site is maintain by:</h2>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-center">
                        <img src="{{ asset('frontEndAsset') }}/img/rakib.jpg" alt="" style="height: 250px; width: 250px; border-radius: 50%;">
                    </div>
                    <div class="card-body">
                        <h4><b>Rakib Hasan</b></h4>
                        <span>BSc in CSE</span> <br>
                        <strong>Wordpress Developer</strong>
                    </div>
                    <div class="card-footer text-center">
                        <a href="https://www.rakibhassan.xyz/" class="btn btn-outline-success">Visit Portfolio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
