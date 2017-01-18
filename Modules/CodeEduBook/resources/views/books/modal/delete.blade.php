<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Deletar Livro</h4>
</div>
<div class="modal-body">

    <p>Tem certeza que deseja excluir esse livro <b>"{{$book->title}}"</b>?</p>



</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <a href="{{route('books.destroy',['book'=>$book->id])}}" class="btn btn-primary">Excluir</a>
</div>

<script>

    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });

</script>