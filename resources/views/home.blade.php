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
                    @role('admin')
                    <h2 class="page-title">Dasboard para Admin</h2>
                    @endrole 
                    
                    @role('medico')
                    <h2>Dasboard para medico</h2>
                    @endrole
                    @role('paciente')
                    <h2>Dasboard para PAciente</h2>
                    @endrole
                   
                    <p>mensaje publico</p>
                    @role('admin')
                    <p>Este mensaje solo es par admin</p>
                    @endrole
                    @role('medico')

                    <p>Este mensaje solo es para medico</p>
                    @endrole
                    @role('enfermero')
                    <p>Este mensaje solo es para enfemero</p>
                    @endrole
                </div>
                

            </div>
        </div>
    </div>
@endsection
