<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Restaurar Categoria</h4>
</div>
<div class="modal-body">

    <p>Tem certeza que deseja restaurar essa categoria <b>"{{$category->name}}"</b>?</p>



</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <a href="{{route('trashed.categories.restore',['category'=>$category->id])}}" class="btn btn-primary">Restaurar</a>
</div>

<script>

    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });

</script>