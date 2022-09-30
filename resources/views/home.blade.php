@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2 text-bold">{{ __('Dashboard') }}</h5>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Memberikan ucapan selamat tergantung dari waktu sekarang -->
                    @php
                        $waktu = date('H');
                        if ($waktu >= 0 && $waktu < 10) {
                            $ucapan = 'Pagi';
                        } elseif ($waktu >= 10 && $waktu < 15) {
                            $ucapan = 'Siang';
                        } elseif ($waktu >= 15 && $waktu < 18) {
                            $ucapan = 'Sore';
                        } else {
                            $ucapan = 'Malam';
                        }
                    @endphp
                        
                        {{ __('Selamat ' . $ucapan . ', ' . Auth::user()->name) }}
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
