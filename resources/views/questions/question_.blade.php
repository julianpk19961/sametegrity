<x-header hd-title="Preguntas" hd-description="Datos generales sobre preguntas creadas" :module="$module"
    :view="$view">
    <x-layouts.titleBanner title-Module="PREGUNTAS" />
    <div class="container p-2 form h-100">


        <div class="row">
            <x-layouts.miscellaneous.inputdiv fieldname='name' showname='Nombre' placeholder='Nombre de la pregunta'
                value='{{ Str::upper($questions->name) }}' div-Class='form-group col-8' />


            <x-layouts.miscellaneous.inputdiv fieldname='status' showname='Estado' placeholder='Estado'
                value="{{ $questions->z_xOne == 1 ? 'ACTIVO' : 'INACTIVO' }}" div-Class='form-group col-2' />

            <div class="row-col col-2 text-end">

                <div class="form-group pb-1">
                    <x-layouts.miscellaneous.inputLabel fieldname="open" showname="Pregunta Abierta" />
                    <button type="button"
                        class="logic btn btn-sm btn-{{ $questions->one == 1 ? 'success' : 'secondary' }}"
                        title="¿Es una pregunta de respuesta abierta, es decir, el usuario debe escribir su opinión en un campo?"
                        id="open">
                        <i class="bi bi-check-circle-fill">
                            <input tittle="Pregunta Abierta" type="check" name="open" value="{{ $questions->one }}"
                                placeholder="vacio" hidden>
                        </i>
                    </button>
                </div>
                <div class="form-group">
                    <label for="unique_answer">Respuesta Única</label>
                    <button type="button"
                        class="logic btn btn-sm btn-{{ $questions->unique_answer == 1 ? 'success' : 'secondary' }}"
                        title="¿La pregunta cuenta con más de una respuesta?" id="unique_answer">
                        <i class="bi bi-check-circle-fill">
                            <input tittle="Multiple respuesta" type="check" name="unique_answer" placeholder="vacio"
                                value="{{ $questions->unique_answer }}" hidden>
                        </i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <x-layouts.miscellaneous.inputLabel fieldname="description" showname="Pregunta" />
                <textarea class="form-control" id="description" name="description" rows="20" placeholder="Descripción">{{ $questions->description }}</textarea>
                @error('description')
                    <small class="text-danger"><strong>*{{ $message }}</strong></small>
                @enderror
            </div>
            <div class="col-sm-6">
                <x-layouts.miscellaneous.inputLabel fieldname="notes" showname="Notas" />
                <textarea class="form-control" id="notes" name="notes" rows="20" placeholder="Observación" readonly>{{ Str::upper(str_replace('.', ".\n", $questions->notes)) }}</textarea>
            </div>
        </div>

    </div>
</x-header>
