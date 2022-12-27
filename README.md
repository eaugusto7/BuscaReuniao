# BuscaReuniao

Projeto realizado em 2017 e classificado em 3º Lugar – Categoria Software – Projeto Busca Reunião, Instituto Federal de Minas Gerais – Campus Bambuí. – XII Feira Interdisciplinar de produção acadêmia(FIPA), Instituto Federal de Minas Gerais – Campus Bambuí.

O Busca Reunião é um website desenvolvido utilizando as linguagens de programação PHP, MySQL e linguagens de marcação HTML e CSS, que permite ao usuário buscar os horários disponíveis dos funcionários de uma empresa, e informá-lo em formato de tabela quais momentos disponíveis para agendar uma reunião. O usuário após selecionar caixas de marcação(checkbox), pode utilizar o botão “Gerar horário” que redimensionam para uma página com o resultado.

![buscareuniao_tabelagerada](https://user-images.githubusercontent.com/53271581/209670257-e3308165-0f38-4fb9-aa02-2031233b5f13.png)

Objetivos contemplados

Agilizar o processo de buscar horários disponíveis para agender reuniões
Garantir a confiabilidade de que os horários apresentados no resultado possam ser agendados por todas as pessoas selecionadas nas caixas de marcação
Melhorar a gestão de horários de funcionários, detectando horários ociosos, podendo assim realoca-los a outras tarefas.
Utiliza-se das linguagens de programação PHP, MySQL e de linguagens de marcação HTML e CSS. As linguagens PHP e MySQL são responsáveis para acessar e atualizar o banco de dados do programa, possuindo 4 tabelas principais em seu banco: pessoas, semana, selecionados e resultado.

A tabela pessoas, é responsável por manter as informações dos nomes das pessoas, e seus respectivos números de identificação, os quais posteriormente serão utilizados na tabela semana. Já esta tabela torna-se responsável por ter as informações dos horários disponíveis de cada pessoa, sendo que cada horário possuirá também um número de identificação, e para horário possuirá o campo de identificação de determinada pessoa. A tabela selecionados, irá armazenar temporariamente os pessoas em que o usuário selecionou para agendar a reunião. Já a tabela resultado seŕa preenchida pelo resultado das comparações dos horários disponíveis e ocupados de cada pessoa em que foi marcada para participar da reunião, demonstrando para o usuário o resultado final.

![image-16](https://user-images.githubusercontent.com/53271581/209670850-3bd8aefa-f1ef-4f9e-aca8-c1d7b932f252.png)

Para realizar a inserção dos horários e das pessoas, um administrador do sistema que possui o acesso permitido ao banco de dados, no estágio atual não conta com nenhuma rotina automatizada para realizar tais alterações. As próximas etapas de melhorias serão através de leitura de arquivo em planilha, que através de uma aplicação em Java, efetuará a leitura do arquivo e atualizará o banco de dados. O formato em arquivos de planilha se justifica pois diversas empresas utilizam esse formato para manter seus horários atualizados.

Resultados

Melhoria do tempo para encontrar horários disponíveis
Melhor alocação de pessoas para trabalhos principalmente em equipes
Maior confiabilidade nos horários encontrados

Alexandre Moura Giarola (Docente Orientador)
