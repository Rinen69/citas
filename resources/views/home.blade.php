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
<<<<<<< HEAD
                    <h2 class="page-title">
                        Dashboard
                        
                    </h2>
=======
                    @role('admin')
                    <h2>Dasboard para Admin</h2>
                    @endrole
                    @role('medico')
                    <h2>Dasboard para medico</h2>
                    @endrole
                    @role('paciente')
                    <h2>Dasboard para PAciente</h2>
                    @endrole
                   
>>>>>>> 645a05b23e6795c9cfd11132cd0eda03774755d4
                    <p>mensaje publico</p>
                    @role('admin')
                    <p>Este mensaje solo es par admin</p>
                    @endrole
                    @role('medico')
<<<<<<< HEAD
                    <p>Este mensaje solo es par admin</p>
=======
                    <p>Este mensaje solo es para medico</p>
>>>>>>> 645a05b23e6795c9cfd11132cd0eda03774755d4
                    @endrole
                    @role('enfermero')
                    <p>Este mensaje solo es par admin</p>
                    @endrole
                </div>
                

            </div>
        </div>
    </div>
@endsection
