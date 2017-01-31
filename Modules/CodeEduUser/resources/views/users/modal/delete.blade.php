<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Deletar Usuário</h4>
</div>
<div class="modal-body">

    <p>Tem certeza que deseja excluir o usuário <b>"{{$user->name}}"</b>?</p>



</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <a href="{{route('codeeduuser.users.destroy',['user'=>$user->id])}}" class="btn btn-primary">Excluir</a>
</div>

<script>

    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });

</script>