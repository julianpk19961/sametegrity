<x-header hd-title="Nuevo Paciente" hd-meta-description="Nuevo Paciente" :module="$module" :view="$view">
    <form id="patientform" action="{{ route($module . 'Save') }}" method="POST" class="p-2 form h-100"
        enctype="multipart/form-data">
        @csrf
        <div class="container bg-light border">
            <x-layouts.tittlebar class="row h-100 text-center text-white" action='NUEVO' alias='PACIENTE' />

            <div class="row g-12">
                <div class="col-md-12 col-lg-12">
                    <div class="row mt-g-3  p-2">

                        <div class="row-flex col-sm-2 d-inline-flex justify-content-center">
                            <div class="avatar-upload">
                                <label class="avatar-preview"for="imageUpload">
                                    <img src="{{ URL::asset('img/DefaultPhoto.png') }}"
                                        alt="Logo Generado forma generica" title="Cick para cargar imagen"
                                        class="img-fluid" id="imagePreview">
                                </label>
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" name="imageUpload"
                                        alt="Imagen cargada por el usuario" class="img-fluid"
                                        accept=".png, .jpg, .jpeg" />
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid align-self-end col-sm-10">
                            <div class="row col-12">

                                <div class="col-sm-3">
                                    <label for="tdoc" class="form-label">Tipo Documento</label>
                                    <select class="form-select" name="tdoc" id="tdoc" aria-label="">
                                        @foreach ($typeDocs as $typeDoc)
                                            <option value="{{ $typeDoc->id }}"
                                                {{ $typeDoc->id == '13' ? 'selected' : '-' }}> {{ $typeDoc->name }}
                                            </option>
                                        @endforeach
                                    </Select>
                                </div>

                                <div class="col-sm-3">
                                    <label for="dni" class="form-label">N??mero Documento</label>
                                    <input type="text" class="form-control" name="dni" id="dni"
                                        placeholder="N??mero Documento" value="{{ old('dni') }}">
                                    <x-layouts.dialoges.inputerror input='dni' />
                                </div>

                                <div class="col-sm-3">
                                    <label for="documentplace-state" class="form-label">Dpto Expedici??n</label>
                                    <select class="form-select" name="documentplace" id="documentplace-state"
                                        aria-label="">
                                        <option value="">Seleccionar opci??n</option>
                                        {{-- @foreach ($countries as $country)
                                            <option value="{{ $country['country_name'] }}"
                                                {{ $country['country_name'] == 'Colombia' ? 'selected' : '_' }}>
                                                {{ $country['country_name'] }}
                                            </option>
                                        @endforeach --}}
                                    </Select>
                                </div>

                                <div class="col-sm-3">
                                    <label for="documentplace-state" class="form-label">Ciudad Expedici??n</label>
                                    <select class="form-select" name="documentplace" id="documentplace" aria-label="">
                                        @foreach ($countries as $country)
                                            {{-- <option value="{{ $country['country_name'] }}"
                                                {{ $country['country_name'] == 'Colombia' ? 'selected' : '_' }}>
                                                {{ $country['country_name'] }}
                                            </option> --}}
                                        @endforeach
                                    </Select>
                                </div>

                            </div>

                            <div class="row col-12">
                                <div class="col-sm-6">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Nombres" value="{{ old('name') }}">
                                    <x-layouts.dialoges.inputerror input='name' />
                                </div>

                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname"
                                        placeholder="Apellidos" value="{{ old('lastname') }}">
                                    <x-layouts.dialoges.inputerror input='lastname' />
                                </div>
                            </div>
                        </div>


                        <div class="w-100 mt-2"></div>
                        <div class="col-sm-3">
                            <label for="gender" class="form-label">G??nero</label>
                            <select class="form-select" name="gender" id="gender" aria-label="">
                                <option value="" {{ old('gender') == '' ? 'selected' : '' }}>G??nero</option>
                                <option value="0" {{ old('gender') == 0 ? 'selected' : '' }}>Mujer</option>
                                <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Hombre</option>
                                <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>Otro</option>
                            </Select>
                        </div>
                        <div class="col-sm-3">
                            <label for="borndate" class="form-label">Fecha Nacimiento</label>
                            <input type="date" class="form-control" name="borndate" id="borndate" placeholder=""
                                value="{{ old('borndate') }}">
                            <x-layouts.dialoges.inputerror input='borndate' />
                        </div>

                        <div class="col-sm-3">
                            <label for="age" class="form-label">Edad</label>
                            <input type="number" class="form-control" name="age" id="age"
                                placeholder="Edad" value="{{ old('age') }}" readonly>
                        </div>

                        <div class="col-sm-3">
                            <label for="academiclevel" class="form-label">Escolaridad</label>
                            <select class="form-select" name="academiclevel" id="academiclevel" aria-label="">
                                <option value="" {{ old('academiclevel') == '' ? 'selected' : '' }}>Seleccione
                                    Nivel</option>
                                <option value="0" {{ old('academiclevel') == 0 ? 'selected' : '' }}>Primaria
                                </option>
                                <option value="1" {{ old('academiclevel') == 1 ? 'selected' : '' }}>Bachillerato
                                </option>
                                <option value="2" {{ old('academiclevel') == 2 ? 'selected' : '' }}>Secundaria
                                </option>
                                <option value="3" {{ old('academiclevel') == 3 ? 'selected' : '' }}>Profesional
                                </option>
                                <option value="4" {{ old('academiclevel') == 4 ? 'selected' : '' }}>
                                    Especializaci??n</option>
                            </Select>
                        </div>

                        <div class="col-sm-3">
                            <label for="borncountry" class="form-label">Pais de nacimiento</label>
                            <select class="form-select" name="borncountry" id="borncountry" aria-label="">
                                <option value="colombia">Colombia</option>
                                <option value="Argentina">Argentina</option>
                                {{-- <x-locations-api /> --}}
                            </Select>
                        </div>

                        <div class="col-sm-3">
                            <label for="bornstate" class="form-label">Depto de nacimiento</label>
                            <select class="form-select" name="bornstate" id="bornstate" aria-label="">
                                <option value="Argentina">Seleccione Opcion</option>
                            </Select>
                        </div>

                        <div class="col-sm-3">
                            <label for="borncity" class="form-label">Ciudad de nacimiento</label>
                            <select class="form-select" name="borncity" id="borncity" aria-label="">
                                <option value="Argentina">Seleccione Opcion</option>
                            </Select>
                        </div>

                        <div class="col-sm-3">
                            <label for="job" class="form-label">Ocupaci??n</label>
                            <select class="form-select" name="job" id="job" aria-label="">
                                <option value="" {{ old('job') == '' ? 'selected' : '' }}>Seleccione Ocupaci??n
                                </option>
                                <option value="Obrero" {{ old('job') == 'Obrero' ? 'selected' : '' }}>Obrero</option>
                                <option value="Paletero" {{ old('job') == 'Paletero' ? 'selected' : '' }}>Paletero
                                </option>
                                <option value="Gerente" {{ old('job') == 'Gerente' ? 'selected' : '' }}>Gerente
                                </option>
                                <option value="Estudiante" {{ old('job') == 'Estudiante' ? 'selected' : '' }}>
                                    Estudiante</option>
                                <option value="Ninguna" {{ old('job') == 'Ninguna' ? 'selected' : '' }}>Ninguna
                                </option>
                            </Select>
                        </div>

                        <div class="col-sm-3">
                            <label for="livecontry" class="form-label">Pais de Residencia</label>
                            <select class="form-select" name="livecontry" id="livecontry" aria-label="">
                                <option selected value="Colombia">Colombia</option>
                                <option value='Andorra'>Andorra</option>
                                <option value="Afganistan">Afganistan</option>
                                <option value="Dubai">Dubai</option>
                            </Select>
                        </div>

                        <div class="col-sm-3">
                            <label for="livestate" class="form-label">Depto de Residencia</label>
                            <select class="form-select" name="livestate" id="livestate" aria-label="">
                                <option selected value="">Seleccione estado/depto</option>
                                <option value='Antioquia'>Antioquia</option>
                                <option value="Santander">Santander</option>
                                <option value="Cundinamarca">Cundinamarca</option>
                            </Select>
                        </div>

                        <div class="col-sm-3">
                            <label for="livecity" class="form-label">Ciudad de Residencia</label>
                            <select class="form-select" name="livecity" id="livecity" aria-label="">
                                <option selected value="{{ old('dni') }}">Seleccione ciudad</option>
                                <option value='Bello'>Bello</option>
                                <option value="Medellin">Medellin</option>
                                <option value="Manizales">Manizales</option>
                            </Select>
                        </div>


                        <div class="col-sm-3">
                            <label for="civilstate" class="form-label">Estado Civil</label>
                            <select class="form-select" name="civilstate" id="civilstate" aria-label="">
                                <option value="" {{ old('civilstate') == '' ? 'selected' : '' }}>Seleccione
                                    Estado</option>
                                <option value="0" {{ old('civilstate') == 0 ? 'selected' : '' }}>Soltero
                                </option>
                                <option value="1" {{ old('civilstate') == 1 ? 'selected' : '' }}>Casado</option>
                                <option value="2" {{ old('civilstate') == 2 ? 'selected' : '' }}>Viudo</option>
                            </Select>
                        </div>


                        <div class="col-sm-12">
                            <label for="address" class="form-label">Direcci??n </label>
                            <input type="text" class="form-control" name="address" id="address"
                                placeholder="Direcci??n" value="{{ old('address') }}">
                        </div>

                        <div class="col-sm-6">
                            <label for="phone" class="form-label">Tel??fono </label>
                            <input type="number" class="form-control" name="phone" id="phone"
                                placeholder="Tel??fono" value="{{ old('phone') }}">
                        </div>

                        <div class="col-sm-6">
                            <label for="cellphone" class="form-label">Celular </label>
                            <input type="text" class="form-control" name="cellphone" id="cellphone"
                                placeholder="Celular" value="{{ old('cellphone') }}">
                        </div>

                        <div class="col-sm-6">
                            <label for="mail" class="form-label">Email </label>
                            <input type="text" class="form-control" name="mail" id="mail"
                                placeholder="Email" value="{{ old('mail') }}">
                        </div>

                        <div class="col-sm-6">
                            <label for="maileb" class="form-label">Facturaci??n electronica </label>
                            <input type="text" class="form-control" name="maileb" id="maileb"
                                placeholder="Email Facturaci??n" value="{{ old('maileb') }}">
                        </div>

                        <div class="container-sm mt-2">
                            <div class="col-sm-12 m-2" id="gbuttonbar">

                                <div class="row">
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Violencia" id="violence">
                                            <i class="bi bi-bandaid-fill">
                                                <input type="check" name="violence"
                                                    value="{{ old('violence') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="C??digo Fucsia" id="abused">
                                            <i class="bi bi-balloon-fill">
                                                <input type="check" name="abused"
                                                    value="{{ old('abused') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Medicina Laboral" id="fromwork">
                                            <i class="bi bi-prescription2">
                                                <input type="check" name="fromwork"
                                                    value="{{ old('fromwork') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary" title="Tutela"
                                            id="guardianship">
                                            <i class="bi bi-file-earmark-zip-fill">
                                                <input type="check" name="guardianship"
                                                    value="{{ old('guardianship') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Privados Libertad" id="gaoler">
                                            <i class="bi bi-door-closed-fill">
                                                <input type="check" name="gaoler"
                                                    value="{{ old('gaoler') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary" title="ICBF"
                                            id="icbf">
                                            <i class="bi bi-file-earmark-person-fill">
                                                <input type="check" name="icbf"
                                                    value="{{ old('icbf') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Gestante" id="pregnant">
                                            <i class="bi bi-flower1">
                                                <input type="check" name="pregnant"
                                                    value="{{ old('pregnant') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Riesgo Suicida" id="suicide">
                                            <i class="bi bi-exclamation-diamond-fill">
                                                <input type="check" name="suicide"
                                                    value="{{ old('suicide') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Paciente VIP" id="vip">
                                            <i class="bi bi-star-fill"></i>
                                            <input type="check" name="vip"
                                                value="{{ old('vip') == 1 ? 1 : 0 }}" hidden>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Sin asignaci??n" id="">
                                            <i class="bi bi-slash-circle-fill">
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Sin asignaci??n" id="">
                                            <i class="bi bi-slash-circle-fill">
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Sin asignaci??n" id="">
                                            <i class="bi bi-slash-circle-fill">
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 m-2" id="abuttonbar">
                                <div class="row">
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Asesoria Virtual" id="virtualadvice">
                                            <i class="bi bi-pc-display">
                                                <input type="check" name="virtualadvice"
                                                    value="{{ old('virtualadvice') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Consulta Externa" id="external">
                                            <i class="bi bi-person-video2">
                                                <input type="check" name="external"
                                                    value="{{ old('external') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Hospitalizaci??n" id="hospitalitation">
                                            <i class="bi bi-h-circle-fill">
                                                <input type="check" name="hospitalitation"
                                                    value="{{ old('hospitalitation') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Red Externa" id="externalTeam">
                                            <i class="bi bi-file-medical-fill">
                                                <input type="check" name="externalTeam"
                                                    value="{{ old('externalTeam') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="CENPI (<14)" id="cenpi">
                                            <i class="bi bi-emoji-laughing-fill">
                                                <input type="check" name="cenpi"
                                                    value="{{ old('cenpi') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="SRPA (Adolecentes)" id="srpa">
                                            <i class="bi bi-earbuds">
                                                <input type="check" name="srpa"
                                                    value="{{ old('srpa') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="B??squeda Activa" id="activeselection">
                                            <i class="bi-binoculars-fill">
                                                <input type="check" name="activeselection"
                                                    value="{{ old('activeselection') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Directo Prestador" id="through">
                                            <i class="bi bi-signpost-fill">
                                                <input type="check" name="through"
                                                    value="{{ old('through') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Particular" id="particular">
                                            <i class="bi bi-clipboard2-pulse-fill">
                                                <input type="check" name="particular"
                                                    value="{{ old('particular') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Punta Piramide" id="pyramid">
                                            <i class="bi bi-triangle-half">
                                                <input type="check" name="pyramid"
                                                    value="{{ old('pyramid') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Autoriza Llamadas" id="phoneAutorized">
                                            <i class="bi bi-telephone-outbound-fill">
                                                <input type="check" name="phoneAutorized"
                                                    value="{{ old('phoneAutorized') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="patientAlert btn btn-secondary"
                                            title="Autoriza Correos" id="mailAutorized">
                                            <i class="bi bi-envelope-check-fill">
                                                <input type="check" name="mailAutorized"
                                                    value="{{ old('mailAutorized') == 1 ? 1 : 0 }}" hidden>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-2 mb-2">
                            <nav id="patientoptions">
                                <div class="nav nav-tabs col-12" id="nav-tab"role="tablist">
                                    <button class="nav-link col-sm-2 active"
                                        id="nav-medicalbond-tab"data-bs-toggle="tab"data-bs-target="#nav-medicalbond"
                                        type="button"role="tab"aria-controls="nav-medicalbond"aria-selected="true">Vinculaci??n</button>
                                    <button class="nav-link col-sm-2"
                                        id="nav-legal -tab"data-bs-toggle="tab"data-bs-target="#nav-legal"
                                        type="button"role="tab"aria-controls="nav-income"aria-selected="false">Responsable</button>
                                    <button class="nav-link col-sm-2"
                                        id="nav-income-tab"data-bs-toggle="tab"data-bs-target="#nav-income"
                                        type="button"role="tab"aria-controls="nav-income"aria-selected="false">Ingreso</button>
                                    <button class="nav-link col-sm-2"
                                        id="nav-files-tab"data-bs-toggle="tab"data-bs-target="#nav-files"
                                        type="button"role="tab"aria-controls="nav-files"aria-selected="false">Archivos</button>
                                    <button class="nav-link col-sm-2"
                                        id="nav-presence-tab"data-bs-toggle="tab"data-bs-target="#nav-presence"
                                        type="button"role="tab"aria-controls="nav-presence"aria-selected="false">Asistentes</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active p-2" id="nav-medicalbond"role="tabpanel"
                                    aria-labelledby="nav-medicalbond-tab">
                                    {{-- VINCULACION  --}}
                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="row">
                                                <label for="eps" class="form-label col-sm-9 col-md-8"> Entidad
                                                </label>
                                                <div class="form-check col-sm-3 col-md-4 d-inline-flex flex-row-reverse"
                                                    id="check">
                                                    <label class="form-label"for="capitado">
                                                        Capitado
                                                    </label>
                                                    <input class="form-check-input" name="capitado"
                                                        id="capitado"type="checkbox"size="10px"
                                                        value="{{ old('dni') }}" id="flexCheckDefault">
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control col-sm-9 align-bottom"width=""
                                                name="eps" id="eps" placeholder="Entidad">

                                        </div>

                                        <div class="col-sm-3">
                                            <label for="epstype" class="form-label"> Regimen </label>
                                            <select class="form-select" name="epstype" id="epstype"
                                                aria-label="">
                                                <option selected value="{{ old('dni') }}">Seleccione tipo</option>
                                                <option value="C">Contribuitivo</option>
                                                <option value="S">Subsidiado</option>
                                            </Select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="contract" class="form-label"> Contrato </label>
                                            <select class="form-select" name="contract" id="contract"
                                                aria-label="">
                                                <option selected value="{{ old('dni') }}">Seleccione contrato
                                                </option>
                                                <option value='1'>contrato1</option>
                                                <option value="2">contrato2</option>
                                            </Select>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="epslevel" class="form-label"> Nivel </label>
                                            <input type="text" class="form-control" name="epslevel"
                                                id="epslevel" placeholder="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="policy" class="form-label"> Poliza </label>
                                            <input type="text" class="form-control" name="policy" id="policy"
                                                placeholder="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="membertype" class="form-label"> Tipo Afiliado </label>
                                            <input type="text" class="form-control" name="membertype"
                                                id="membertype" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <label for="contributor" class="form-label"> Cotizante </label>
                                            <input type="text" class="form-control" name="contributor"
                                                id="contributor" placeholder="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="Ips" class="form-label"> IPS </label>
                                            <select class="form-select" name="Ips" id="Ips"
                                                aria-label="">
                                                <option selected value="{{ old('dni') }}">Seleccione Ips</option>
                                                <option value='Bello'>Hospital mental antioquia (HOMO)</option>
                                                <option value="Medellin">Ips salud de antioquia</option>
                                                <option value="Manizales">Ips medellin</option>
                                            </Select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="alert" class="form-label"> Alerta </label>
                                            <input type="text" class="form-control" name="alert" id="alert"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade p-2" id="nav-legal"role="tabpanel"
                                    aria-labelledby="nav-legal-tab">
                                    {{-- PANEL RESPONSABLE LEGAL --}}
                                    <div class="container mb-3">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <label for="legaldocumenttype" class="form-label">Tipo
                                                    Documento</label>
                                                <select class="form-select" name="legaldocumenttype"
                                                    id="legaldocumenttype" aria-label="legal document type">
                                                    {{-- lv --}}
                                                    @foreach ($typeDocs as $typeDoc)
                                                        <option value="{{ $typeDoc->id }}"> {{ $typeDoc->name }}
                                                        </option>
                                                    @endforeach

                                                </Select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="legaldni" class="form-label"> Numero Identificaci??n
                                                </label>
                                                <input type="text" class="form-control" name="legaldni"
                                                    id="legaldni" placeholder="No identificaci??n">
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="legalname" class="form-label"> Nombre Completo </label>
                                                <input type="text" class="form-control" name="legalname"
                                                    id="legalname" placeholder="Nombre responsable">
                                            </div>

                                            <div class="col-sm-3">
                                                <label for="kindred" class="form-label">Relaci??n / Parentesco</label>
                                                <select class="form-select" name="kindred" id="kindred"
                                                    aria-label="legal document type">
                                                    <option value="">Seleccion</option>
                                                    <option value='0'>Conyugue</option>
                                                    <option value='1'>Madre</option>
                                                    <option value="2">Padre</option>
                                                    <option value="3">Hija/o</option>
                                                    <option value="4">Hermana/o</option>
                                                    <option value="5">Abuela/o</option>
                                                    <option value="6">Otro</option>
                                                </Select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <label for="legalphone" class="form-label"> Tel??fono </label>
                                                <input type="text" class="form-control" name="legalphone"
                                                    id="legalphone" placeholder="Tel??fono">
                                            </div>
                                            <div class="col-sm-7">
                                                <label for="legaladress" class="form-label"> Direcci??n </label>
                                                <input type="text" class="form-control" name="legaladress"
                                                    id="legalphone" placeholder="Direcci??n">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-income"role="tabpanel"
                                    aria-labelledby="nav-income-tab">
                                    {{-- PANEL INGRESO --}}
                                    INGRESO
                                </div>

                                <div class="tab-pane fade" id="nav-presence"role="tabpanel"
                                    aria-labelledby="nav-presence-tab">
                                    {{-- PANEL ASISTENCIA --}}
                                    ASISTENCIA
                                </div>

                                <div class="tab-pane fade" id="nav-files"role="tabpanel"
                                    aria-labelledby="nav-files-tab">
                                    {{-- PANEL ARCHIVOS --}}
                                    ARCHIVOS
                                </div>
                            </div>


                            <div class="form-group col-sm-12">
                                <label for="observation" class="form-label">Observacion </label>
                                <textarea rows="3" class="form-control" name="observation" id="observation" placeholder="Observaci??n"></textarea>
                            </div>

                            <x-layouts.formSave :module="$module" />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="{{ asset('js/patiencrud.js') }}"></script>
</x-header>
