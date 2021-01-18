<div class="modal fade" id="modalCalendar" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Titulo Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEvent">
                    <div class="form-group" id="form-title">
                        <label for="exampleInputTitulo">Título</label>
                        <input type="text" class="form-control" name="titulo" id="exampleInputTitulo" placeholder="Digito o título" required>
                        <input type="text" name="id" hidden>
                        @error('titulo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="form-especialidade">
                        <label for="inputSelectEspecialidades">Especialidades</label>
                        <select class="form-control" name="auxEspecialidade" id="inputSelectEspecialidades">
                            <option value="">Não Selecionado</option>
                            @foreach(auth()->user()->pessoa->medico->auxEspecialidades as $auxEspecialidade)
                                <option value="{{$auxEspecialidade->id}}">{{$auxEspecialidade->especialidade->especialidade}}</option>
                            @endforeach
                        </select>
                        @error('auxEspecialidade')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="form-start">
                        <label for="exampleInputDateInicio">Data de Início</label>
                        <input type="text" name="start" class="form-control date-time" id="exampleInputDateInicio" required>
                        @error('start')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="form-end">
                        <label for="exampleInputDateFim">Data de Finalização</label>
                        <input type="text" name="end" class="form-control date-time" id="exampleInputDateFim" required>
                        @error('end')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="form-intervalo">
                        <label for="inputIntervalo">Tempo de intervalo entre consultas (Minutos)</label>
                        <input type="number" class="form-control" name="intervalo" id="inputIntervalo" value="15"/>
                        @error('intervalo')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="form-descricao">
                        <label for="exampleInputDesc">Descrição</label>
                        <textarea class="form-control" name="descricao" id="exampleInputDesc" rows="2"></textarea>
                        @error('descricao')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
                <button type="button" class="btn btn-danger deletEvent">Excluir</button>
                <button type="button" class="btn btn-primary saveEvent">Salva</button>
            </div>
        </div>
    </div>
</div>
