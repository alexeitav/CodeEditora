# Notas para o Tutor

## Fase 02: FORM REQUEST E AUTORIZAÇAO

>> Relaçao Livro/Autor

Como nao foi detalhada a forma que deveria ser feita a relaçao entre livro/autor eu escolhi fazer da seguinte forme:

Alterei a tabela "books", acrescentando um campo "user_id" e relacionando esse campo com "users".

Outra opçao que pensei seria criar uma nova tabela "book_user", mas acabei achando mais facil fazer da primeira foram.

>> Autorizaçao do usuario para editar o livro

Como ainda nao temos os perfis de usuario (admin, editor, etc)...eu optei fazer da seguinte forma.

Quando um livro eh criado ja eh inserido o user_id do usuario que esta logado criando o livro.

Na listagem dos livros o usuario so pode ver seus proprios livros. Livros de outros autores ele nao ve na relaçao. (quando tivermos um admin ai eu daria permissao para o admin ver/editar todos).

Ao editar um livro eu verifiquei se o "user_id" do livro eh igual ao id do usuario logado, se nao for gera um erro. Por segurança coloquei a mesma verificaçao na hora de deletar um livro.

Sei que tem outras formas de fazer isso mas acabei optando por essa. Nao sei se foi melhor assim ou nao.


P.S. Desculpe a falta de acentuaçao...nao sei porque o PHPStorm nao esta mais colocando acentuaçao.

