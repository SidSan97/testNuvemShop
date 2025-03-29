<h1> TESTDEV API REST MVC </h1>

<p> Projeto de API REST desenvolvido em PHP de forma prática e mais minimalista possível. Procurei abordar as melhores práticas de programação, uso de POO e MVC para melhor visualização,
estruturação e organização do projeto. O mesmo foi pensado visando não só a escalabilidade como a manuntenção, possuindo metódos reutilizavéis em mais de uma classe. Possui um arquivo Core
para orquestração das classes, sem precisar instalar dependências, além de fazer requisições GET, POST PUT e DELETE. </p>

<hr>

<h2>Questionário</h2>

<h3>Explique a diferença entre os métodos GET, POST, PUT e DELETE em uma API REST. </h3>

<h5>
  <strong>GET:</strong> O método GET é utilizado para obter recursos de um servidor web. Ele não deve alterar recursos no servidor e no banco de dados e seus parâmetros de busca normalmente
  são passadas via URL como por exemplo IDs de usuários. Possuem a vantagem de poder ter seus dados armazenados em cache, fazendo as buscas serem ainda mais rápidas.
</h5>

<h5>
  <strong>POST:</strong> O método POST é utilizado para criar novos recursos, enviar dados para um banco de dados e API. Ele tem o poder de alterar recursos no servidor e diferente do GET,
  não tem seus dados passados via URL.
</h5>

<h5>
  <strong>PUT:</strong> O método PUT é utilizado para atualizar recursos existentes no servidor ou banco de dados. Assim como o GET, ele exige passagem de parametros de busca via URL, porém
  se assemelha também ao método POST por não poder ter seus dados cacheados e possuir um "corpo de dados" para serem  enviados pela requisição HTTP.
</h5>

<h5>
  <strong>DELETE:</strong> O método DELETE é utilizado para apagar recursos existentes no servidor ou banco de dados. É comumente usado para instruir o servidor a excluir 
  um recurso específico identificado pela URL ou identificador de recurso fornecido. 
  Ao contrário de outros métodos HTTP, como GET e POST, que recuperam ou criam recursos, o método DELETE é especificamente projetado para a exclusão de recursos.
</h5>

<h3>O que é uma injeção de dependência e por que ela é importante em aplicações PHP Modernas?</h3>

<h5>
  A injeção de dependências visa remover dependências desnecessárias entre as classes criando uma espécie de Inversão de Controle e significa que uma classe não é mais responsável 
  por criar ou buscar os objetos dos quais depende. Ela reduz o acoplamente entre classes permitindo que as dependências sejam passadas para um objeto ao invés de serem criadas
  internamente. <br><br> A injeção pode ser feita via <i>construtor</i> ou <i>setter</i> seus beneficios são:
</h5>

<ul>
  <li>Maior índice de reaproveitamento</li>
  <li>Permite incluir novas funcionalidades sem alterar as já existentes</li>
  <li>Possibilidade de criar mocks em testes unitários</li>
</ul>

<h3> Qual a diferença entre public, protected e private em uma classe PHP? </h3>

<ul>
   <li><strong>Public: </strong>A classe pode ser acessada de qualquer lugar no código, independentemente se ela herda ou não.</li>
   <li><strong>Protected: </strong>A classe pode ser acessada por subclasses, mas não por objetos instanciados.</li>
   <li><strong>Private: </strong>A classe pode ser acessada apenas por membros ou funções da mesma classe</li>
</ul>







