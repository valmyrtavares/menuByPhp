Esse foi a implementação de subir arquivos redimencionar e deletá-los tanto do banco de dados 
quanto da pasta do código fonte.
1 Agora a referencia das imagens é o caminho dele e o nome do arquivo, isso teve que ser
mudado em todos os htmls que faziam mensão as imagens que estavam na net
2 No form que envia os dados foi acrescentado o enctype="multipart/form-data">
3 No send action foi implementado todo o código de receber a imagem e redimencioná-la e
depois gravar na pasta eu tomei um erro por não ter posto o ponto antes do jpg. Engraçado
que esse erro também estava no meu git que supostamente está funcionando. O código dessa
parte está todo comentado para que possa explicar o passo a passo com os dados de cada
variável, já que o meu debug php ainda não está em uso.
4 Uma das partes mais interessante desse comit e deve interessar na hora da consulta é
como a imagem deve ser excluída de dentro da pasta do código fonte. Aqui eu usei query
ao invés de compare e coloquei o $id dentro da query e funcionou. O ponto é que como 
precisamos do nome da imagem para ser deletada antes de deletar o dado do DB temos que fazer
a consulta eu acho que isso é que eu estava errando. Estava primeiro deletando e depois
tentando fazer uma consulta. Agora tudo a contento. Preciso tratar do update
5 Update feito. O input type file só carrega alguma coisa se vc clicar. Caso não faça
isso ele segue vazio. Por uma questão didática é posto uma imagem embaixo para sinalizar
que o produto tem uma imagem, mas essa não é a imagem que vai para o action até a forma
de pegar essa é diferente $_FILES['img'] e não o filter_input(INPUT_FILE). Então casoi
vc não troque a imagem ela vai seguir sem. Eu coloquei um input hidden com o nome do 
arquivo que o produto já tem e dentro de if eu pergunto se vai ou não usar o arquivo novo
Se não for eu coloco o  velho nome se for usar o novo ele fica igual ao que já foi feito 
no send, com uma diferença que é. O arquivo velho tem que ser excluido, porque se cada arquivo 
que eu mudar ficar pedido dentro do sistema é possível que ele fique gigantge.Pra isso 
eu usei um unlink muito tranquilo que está no final do if do arquivo novo.
Como uma pequena feature eu coloquei um link em cada produto para, para se o dono 
do restaurante quiser ir mais rapido direto para o produto ele só clica direto no produto 
e a tela já abre direto no edit para agilizar.
