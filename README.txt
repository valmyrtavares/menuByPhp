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

Como esse trabalho está se desenvolvendo baseado em uma aula e não é uma aula
eu infelizmente eu não estou tendo o cuidado com os commits e sei o quanto eles são 
importantes depois. Esse é um trabalho inédito por isso vou tentar fazer uma descrição
desse enormr commit de agora e depois vou passar a fazer commits menores que ajudem
quem estiver estudando a entender o que está sendo pensado e feito em cada parte
1 Aumentei a quantidade de menus para poder ter mais facilidade de acessar as telas
que estou trabalhando, mas não pretendo deixá-las assim
2 Criei uma tabela request, que será a conexão de todas as outras tabelas, dentro dessa 
tabela eu terei um id_product id_user

Foto de header
Eu implementei a fotografia sem que fosse para o banco de dados, fiz um arquivo imgcover.php
e coloquei o redimensionador de imagem dentro dele com um verificador para a imagem antiga
Ele sempre exclui a imagem anterior das pasta do projeto e inclui a nova, sem necessidade
de fazer um edit. É um processo mais simples e que pode funcionar bem em muitas situações
que não se deve envolver o banco de dados. De qualquer forma esse commit também está confuso
Com mais coisas do que devia. Eu estou muito focado em fazer funcionar
Eu resolvi cominhar primeiro para que o projeto se torne um simples cardápio editável e 
funcional. Chegando a esse primeiro estágio, que era o projeto inicial. Ao longo do desenvolmento
eu fui acrescentando mais funcionalidades o que foi poluindo o projeto e o tornando confuso. Para 
evitar essa armadílha, eu resolvi chegar a 100% do projeto como um simples cardápio editável, para depois
disso feito, funcionando, publicado e comitado eu passe a caminhar para um segundo ponto que é 
aumentar as features e possibilidades do projeto.

Implementei um botão de enviar fotos dentro do index, que preenche uma sessão['cover'] essa 
sessão faz com que a imagem do header apareça, quando ela aparece no header o botão desaparece.
De E temos um botão de enviar uma nova imagem no edit_delete. Para facilitar quando não existe 
nenhuma imagem temos o botão no index, quando temos uma imagem, a tela de edição fica somente no edit_delete
E funcionando. Agora vou fazer com que o aplicativo se comporte de uma forma com admin logado e sem 

Foi feito uma tela de logout que é acessado a partir do footer e que pode fazer com que o admin faça
login. Uma vez logado o header mostra o menu e as possibildiades do admin. Ou seja temos um comportamento
com o admin presente e outro sem o admin, como foi proposto
Agora vou acomodar o header do restaurante dentro do espaço criar um sequencia entre header carrossel botões
e footer e colocar um background

Está tudo feito. Tenho um pequeno bug que não quero me preocuparem demasia agora que é um certo 
pulo que a tela da quando mudo a sugetão do chef, mas está tudo alinhado e com uma certa harmonia.
No próximo commit vou entrar definitivamente no mobile e no comportamento gera das tags 
em um tamanho reduzido. 

Feito os ajustes do mobile com o acrescimo de um arquivo de desktop, que eu acho que deveria se
chamar mobile, mesmo ele gerando efeitos nas fontes das letras acima de 700px. Eu acho 
que talvez fosse mais didático, vou seguir assim. Agora falta arrumar o pulo do carrossel
e fazer um uso geral de bugs.

Na verdade eu tive que ir para um outro assunto que eu tinha me esquecido no commit anterior
que é toda a parte do admin, que eu não tinha arrumado para o formato de mobile e 
o problema de check box que também estava muito estranho. Eu aconsegui colocá-lo dentro de
uma div e usar um flex para alinhá-lo . Agora sim achjo que a parte do uso carrossel e bugs
faz sentido, antes de cuidar dos menus internos de cada menu

Arrumei o detalhes do produto que eu tinha esquecido. Já descobri o que faz com que
o carrossel se desloque. E são os numeros 1 que aparecem embaixo e encima. Eles são
parte do código do php que pergunta se o produto deve ou não entrar no carrossel. Se
sim tem que ser 1 senão tem que ser 0 e cada produto que está dentro do carrossel 
aumenta um numero 1 e isso desloca a div e faz tudo andar

Foi implementados os submenus de cada tipo como bebidas pratos lanches e criado outros
sub tipos dentro do select. Agora acreidto em 3 medidas para encerrar esse estágio do desenvolvimento
Uso para notar inconsistencias no sistema, mudar as cores e os tamanhos porque são muito bregas
e tentar resolver esse bug dos númeos que aparecem no meio das telas. E ai o grande desafio antes de 
qualquer coisa que é fazer deploy da aplicação. Lembrando sempre que o meu esforço com php
nasceu do bode que eu tive na hora de fazer deploy com uma aplicação node.

1 Melhorias fazer uma transiçãoo ao fechar e abrir os menus
2 Criar uma paleta só


Ele é confortável e isso ajuda bastante a quem passa o dia inteiro teclando

Nesse commit a primeira fase está completaente funcional com exceção de que no update a nova
imagem vem sem o crop e é isso que eu quero resolver agora e depois disso acho que o trablaho é 
púramente estético. Até começar a segunda parte do aplicativo

O aplicativo chegou nos 95% da primeira fase. Não acho que nada seja definitivo, nem acabar nem começar
por isso vou iniciar os trabalhos da próxima fase mesmo tendo alguns rabos do primeiro, por isso vou comitar
como fim da primeira parte

Fiz a estilização provisória do modal de detalhes coloquei dois botões um de cancelar que fecha o modal
e outro que deve mandar o produto para o request_action. Como tomei um erro meio loko agora, senti falta de 
dar os commits comentar o andamento dos trabalhos. Porque quando a coisa para de funcionar e não estamos organizados, 
levamos um tempo gigante para achar o erro e voltar. Então o hábito não só de didático mas profissional de ir commitando o 
que se faz é urgente. Então agora o código está funcionando. Fiz um request_action que está fora do sistema por enquanto
e que eu tentei acessar via form não deu certo. Travou tudo. E nem comentando o código eu consegui fazer voltar. Só voltou 
quando eu de fato apaguei as linhas. Esse procedimento de comentar código é relativo. Vou comitar agora e tentar manter
as coisas em ordem daqui pra frente.

Nesse comit eu vou mandar o request que é um pedido para o banco de dados. Nesse pedido deve exitir um pratos, 
um cliente, o horário que ele entrou, o preço do que ele pediu, o nome, para que essa informação seja usada para 
o proprio cliente e para o estabelecimento
Pra isso eu coloquei dentro do product que é onde temos o modal dois botões um para sair e outro para fazer o pedido. 
Caso o cliente opte por fazer o pedido ele manda para o request_action o titulo, preço e id do pedido. Eu tive que fazer
o nosso RequestDaoMysql com a primeira função de insert. Esse insert revebe do requeest_action esses 3 itens dentro de um
objeto Request e dentro do RequestDaoMysql eu faço uma consulta ao checkTokenCustomer e trago o id nome e horário do cliente para intergrar
as colunas do meu request
OBS Um ponto que eu bati cabeça é o private pdo que está dentro da classe request. Eu estava instanciando a classe auth fora 
da classe e não coneguia levar o infoAuth para dentro da function insert. Estava faltando implementar o $this->pdo e o $this->base
e colocar o private pdo dentro da classe para que ela reconhecesse e eu conseguisse cruzar os dados do product com o customer para
fazer a tabela request. Nesse ponto exato estou conseguindo através de um print_r as duas tabelas e vou enviar para tabela request.
Nesse ponto eu ainda não enviei. Mas é o que farei no próximo commit

Eu mandei os dados do request para o banco de dados. Sofri um pouco por conta de um erro de 
query que dizia que algo estava errado perto da linha 2. Uma solução para isso foi mandar um dado de
cada vez e ir vendo onde é que estava dando o erro. Eu estava usando o termo mesa no DB e o termo table na 
query. Esse foi um dos BOs. 
Outra mudança foi instanciar o Auth dentro do request_action e mandar o objeto já todo preenchido para o 
RequestDaoMysql, essa foi uma das soluções. Eu apageuei as outras funções do RequestDaoMysql e deixi apenas
o insert

Agora eu tenho um desafio que é primeiro direcionar o sistema para index se tudo for feito e para uma
mensagem de erro se der errado. 
Depois disso tenho que tratar do login do customer, em que condições ele se da

 O index/home já está direcionado quando eu mando um request para o DB, Essa foi a parte fácil
 Na verdade tudo foi fácil dessa vez. Eu criei uma $_SESSION['tokenCustumer'] que é preenchida se houver 
 o cadastro do cliente ou se ele simplesmente se logar com o numero de telefone. Dentro do home eu fiz um
 if para se houver A $_SESSION['tokenCustomer] o nome do cliente aparece 
 E ainda fiz um outro if que checa se exite session do admin e session do cliente se não houver nenhum dos dois
 Ele encaminha para o login do cliente perguntando o celular. Dentro do login do cliente mais abaixo eu deixei o 
 login do admin, mas fica em uma posição que só quem sabe que faz o scrool. Seria para o cliente normal não ver, 
 mas se ver não tem a senha. Se o camarada se cadastrar também aparece as boas vindas pra ele que acabou de 
 se cadastrar. Se ele pular o cadastro ele é automáticamente cadastrado com um token e o nome de desconhecido. 
 Depois vou por se o cara tiver um value de desconhecido não põe nada, ou que pena. Não sei, Mas coloquei o código
 da parte que não tem nanme nem email que manda o objeto vazio para o registro somente com o desconhecido no lugar do 
 nome para o aparte de login_action. Eu ia fazer uma ginástica mas ainda bem que tomei essa solução. 
 Então agora se ele se cadastrar ou não ele é notado pelo sistema E se não tiver nenhuma seção a tela de cadastro abre.

 Criei um requestList e chamei dentro dele o RequestDaoMysql com o getRequest trazendo todas as litas de pedidos
 feitos, refiz os links do header trocando para os que eu não preiso  mais e coloquei os requests jogados
 dentro do requestList, Também fiz o getRequest para trazer os dados do banco. Amanhã eu organizo tudo na tela
 bonitinho... 
 E no index tirei um espaço do endereço que estava atrapalhando.

 Neste commit em primeiro lugar tivemos o problema de quando se faz um pedido sem um cliente logado. Ele diz que o 
 infoCustomer não existe e trava. Eu coloquei uma session dentro do request_action mostrando uma mensagem
 na home que não é possível fazer pedidos sem que um cliente esteja logado. Acrescentei ao objeto request
 o nome do cliente que era importante para compor a lista que viria do DB  Criei uma tela que seria de cozinha 
 que mostra todos os pedidos mesa e nome do cliente e o horário exato que ele faz o pedido. Fiz as alterações
 tanto no banco de dados local quanto no do localweb. Também criei um novo request.css mas aindas não usei
 Fiz as altereações no RequestDaoMysql para que ele aceite os novos dados e os novos nomes de tabela que eu inseri

 Aqui abrimos mais uma questão, que é onde colocaremos o número da mesa. A princípio eu pensei em colocá-lo na 
 tabela customer, só que o mesmo cliente pode usar mesas diferentes em dias deiferents. Logo esse dado tem 
 que pertencer ao request, apesar dele ser mandado na hora da criação ou identificação do cliente. Então a solução
 que eu encontrei por enquanto é guardar o número das mesa dentro de uma session, para utilizá-lo no meomento
 de ser feito o primeiro pedido FUNCIONOU