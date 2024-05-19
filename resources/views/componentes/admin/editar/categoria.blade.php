<div class="modal fade" id="categoriaEdit{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="categoriaEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="categoriaEditLabel">Editar a categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update" action="{{ route('categorias.update', $item) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="nome" form="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome"
                            placeholder="Nome da categoria" value="{{ $item->nome }}">
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" rows="3">{{ $item->descricao }}</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="update" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>