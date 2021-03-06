@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 ">
                          <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                              <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                <h4>Total Pekerjaan</h4>
                              </div>
                              <div class="card-body">
                                {{count($kerjaan)}}
                              </div>
                            </div>
                          </div>
                        </div>

                        @if (Auth::user()->role == 'admin')

                        <div class="col-md-6 ">
                          <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                              <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                <h4>Total Karyawan</h4>
                              </div>
                              <div class="card-body">
                                {{count($karyawan)}}
                              </div>
                            </div>
                          </div>
                        </div> 
                       </div>
                            
                        @endif

                        @if (Auth::user()->role == 'karyawan')
                            
                        <div class="col-md-6 ">
                            <div class="card card-statistic-1">
                              <div class="card-icon bg-primary">
                                <i class="far fa-newspaper"></i>
                              </div>
                              <div class="card-wrap">
                                <div class="card-header">
                                  <h4>Sudah dikerjaan</h4>
                                </div>
                                <div class="card-body">
                                  {{count($kerjaan2)}}
                                </div>
                              </div>
                            </div>
                          </div> 
                      </div>

                      @endif

                </div>
            </div>
        </div>

        @if (Auth::user()->role == 'karyawan')
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Absensi</h4></div>

                <div class="card-body">
                
                    <div class="row">

                        <form class="form-inline" method="POST" action="{{route('absensi.store')}}">
                            @php
                                date_default_timezone_set("Asia/Bangkok");
                            @endphp
                          <input type="date" class="form-control mb-2 mr-sm-2" name="waktu" value="{{ date('Y-m-d') }}" readonly>

                            <div class="input-group mb-2 mr-sm-2">
                              <input type="text" class="form-control" name="jam_masuk" value="{{ date('H:i:s') }}" readonly>
                            </div>
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>  
                            @csrf
                        </form>
                            
                    </div>

                    @if (session('alert'))
                          <div class="alert alert-warning">
                              {{ session('alert') }}
                          </div>
                    @endif

                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
