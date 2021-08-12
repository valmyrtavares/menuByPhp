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
