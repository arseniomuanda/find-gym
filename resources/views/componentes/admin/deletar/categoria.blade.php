<div class="modal fade" id="categoriaDelet{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="categoriaDeletLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-danger  text-white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="categoriaDeletLabel">Eliminar a categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Deseja eliminar a categoria ...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                <form action="{{ route('categorias.destroy', $item) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">Sim</button>
                </form>
            </div>
        </div>
    </div>
</div>
