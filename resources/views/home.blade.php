@extends('tablar::page')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Dashboard
                        
                    </h2>
                    <p>mensaje publico</p>
                    @role('admin')
                    <p>Este mensaje solo es par admin</p>
                    @endrole
                    @role('medico')
                    <p>Este mensaje solo es par admin</p>
                    @endrole
                    @role('enfermero')
                    <p>Este mensaje solo es par admin</p>
                    @endrole
                </div>
                

            </div>
        </div>
    </div>
@endsection
