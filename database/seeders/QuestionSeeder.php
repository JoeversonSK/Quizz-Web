<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Option;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            [
                'statement' => 'Qual comando Artisan é utilizado para criar uma nova Migration no Laravel?',
                'options' => [
                    ['text' => 'php artisan make:migration', 'is_correct' => true],
                    ['text' => 'php artisan new:table', 'is_correct' => false],
                    ['text' => 'php artisan create:migration', 'is_correct' => false],
                    ['text' => 'composer make:migration', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'No padrão MVC, qual é a responsabilidade da camada "Controller"?',
                'options' => [
                    ['text' => 'Gerenciar a lógica de negócios e interligar Model e View', 'is_correct' => true],
                    ['text' => 'Armazenar os dados no banco de dados', 'is_correct' => false],
                    ['text' => 'Exibir a interface visual para o usuário', 'is_correct' => false],
                    ['text' => 'Configurar as rotas da aplicação', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual diretiva do Vue.js é usada para criar um loop (repetição) em uma lista?',
                'options' => [
                    ['text' => 'v-loop', 'is_correct' => false],
                    ['text' => 'v-for', 'is_correct' => true],
                    ['text' => 'v-repeat', 'is_correct' => false],
                    ['text' => 'v-foreach', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'O que significa a sigla API?',
                'options' => [
                    ['text' => 'Application Programming Interface', 'is_correct' => true],
                    ['text' => 'Application Protocol Internet', 'is_correct' => false],
                    ['text' => 'Association of Programming Interconnection', 'is_correct' => false],
                    ['text' => 'Automated Process Integration', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual código HTTP representa "Não Encontrado" (Not Found)?',
                'options' => [
                    ['text' => '200', 'is_correct' => false],
                    ['text' => '500', 'is_correct' => false],
                    ['text' => '404', 'is_correct' => true],
                    ['text' => '301', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'No Laravel, qual arquivo é responsável por definir as rotas de API?',
                'options' => [
                    ['text' => 'routes/web.php', 'is_correct' => false],
                    ['text' => 'routes/api.php', 'is_correct' => true],
                    ['text' => 'app/Http/Routes.php', 'is_correct' => false],
                    ['text' => 'config/app.php', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual hook do ciclo de vida do Vue 3 é chamado após o componente ser montado no DOM?',
                'options' => [
                    ['text' => 'created()', 'is_correct' => false],
                    ['text' => 'setup()', 'is_correct' => false],
                    ['text' => 'onMounted()', 'is_correct' => true],
                    ['text' => 'onUpdated()', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual método HTTP é ideal para ATUALIZAR um recurso existente em uma API REST?',
                'options' => [
                    ['text' => 'GET', 'is_correct' => false],
                    ['text' => 'POST', 'is_correct' => false],
                    ['text' => 'PUT ou PATCH', 'is_correct' => true],
                    ['text' => 'DELETE', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'O que é o Eloquent no ecossistema Laravel?',
                'options' => [
                    ['text' => 'Um sistema de templates (View)', 'is_correct' => false],
                    ['text' => 'Um ORM (Object-Relational Mapper) para banco de dados', 'is_correct' => true],
                    ['text' => 'Um gerenciador de pacotes PHP', 'is_correct' => false],
                    ['text' => 'Um servidor web embutido', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Para tornar uma variável reativa na Composition API do Vue 3, usamos:',
                'options' => [
                    ['text' => 'data()', 'is_correct' => false],
                    ['text' => 'ref() ou reactive()', 'is_correct' => true],
                    ['text' => 'computed()', 'is_correct' => false],
                    ['text' => 'props', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual comando Git é usado para salvar as alterações no histórico local?',
                'options' => [
                    ['text' => 'git save', 'is_correct' => false],
                    ['text' => 'git push', 'is_correct' => false],
                    ['text' => 'git commit', 'is_correct' => true],
                    ['text' => 'git add', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'No CSS, qual propriedade flexbox alinha os itens horizontalmente (eixo principal)?',
                'options' => [
                    ['text' => 'align-items', 'is_correct' => false],
                    ['text' => 'justify-content', 'is_correct' => true],
                    ['text' => 'flex-direction', 'is_correct' => false],
                    ['text' => 'display', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'O que significa JSON?',
                'options' => [
                    ['text' => 'JavaScript Object Notation', 'is_correct' => true],
                    ['text' => 'Java Source Open Network', 'is_correct' => false],
                    ['text' => 'JavaScript Oriented Node', 'is_correct' => false],
                    ['text' => 'Java Standard Output Name', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual destas opções NÃO é um tipo de dado primitivo em JavaScript?',
                'options' => [
                    ['text' => 'String', 'is_correct' => false],
                    ['text' => 'Boolean', 'is_correct' => false],
                    ['text' => 'Integer', 'is_correct' => true], // Em JS tudo é Number
                    ['text' => 'Undefined', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Para proteger uma rota no Laravel exigindo autenticação, usamos:',
                'options' => [
                    ['text' => 'Middleware', 'is_correct' => true],
                    ['text' => 'Controller', 'is_correct' => false],
                    ['text' => 'Model', 'is_correct' => false],
                    ['text' => 'Seeder', 'is_correct' => false],
                ]
            ],
            [
        'statement' => 'Qual arquivo do Laravel é utilizado para configurar variáveis de ambiente como banco de dados e senhas?',
        'options' => [
            ['text' => '.env', 'is_correct' => true],
            ['text' => 'config.php', 'is_correct' => false],
            ['text' => 'database.php', 'is_correct' => false],
            ['text' => 'environment.xml', 'is_correct' => false],
        ]
        ],
        [
            'statement' => 'Para criar uma ligação bidirecional (two-way binding) em um input no Vue.js, usamos:',
            'options' => [
                ['text' => 'v-bind', 'is_correct' => false],
                ['text' => 'v-model', 'is_correct' => true],
                ['text' => 'v-on', 'is_correct' => false],
                ['text' => 'v-text', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Qual comando é usado para instalar as dependências do PHP listadas no arquivo composer.json?',
            'options' => [
                ['text' => 'npm install', 'is_correct' => false],
                ['text' => 'php install', 'is_correct' => false],
                ['text' => 'composer install', 'is_correct' => true],
                ['text' => 'composer create-project', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'O que a função dd() faz no Laravel?',
            'options' => [
                ['text' => 'Deleta o banco de dados (Drop Database)', 'is_correct' => false],
                ['text' => 'Faz o dump dos dados e encerra a execução (Dump and Die)', 'is_correct' => true],
                ['text' => 'Define uma data (Define Date)', 'is_correct' => false],
                ['text' => 'Cria um diretório (Do Directory)', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Qual é a forma abreviada de escrever v-on:click no Vue.js?',
            'options' => [
                ['text' => ':click', 'is_correct' => false],
                ['text' => '#click', 'is_correct' => false],
                ['text' => '@click', 'is_correct' => true],
                ['text' => '$click', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Qual código de status HTTP indica que uma requisição foi bem sucedida e um novo recurso foi CRIADO?',
            'options' => [
                ['text' => '200 OK', 'is_correct' => false],
                ['text' => '201 Created', 'is_correct' => true],
                ['text' => '204 No Content', 'is_correct' => false],
                ['text' => '400 Bad Request', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'No Laravel, onde geralmente definimos as regras de validação de um formulário?',
            'options' => [
                ['text' => 'No arquivo .env', 'is_correct' => false],
                ['text' => 'No método validate() do Controller ou FormRequest', 'is_correct' => true],
                ['text' => 'No arquivo de rotas web.php', 'is_correct' => false],
                ['text' => 'Diretamente no banco de dados', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Como passamos dados de um componente Pai para um componente Filho no Vue.js?',
            'options' => [
                ['text' => 'Usando Props', 'is_correct' => true],
                ['text' => 'Usando Emits', 'is_correct' => false],
                ['text' => 'Usando CSS', 'is_correct' => false],
                ['text' => 'Usando LocalStorage', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Qual símbolo é usado para declarar uma variável em PHP?',
            'options' => [
                ['text' => '@', 'is_correct' => false],
                ['text' => '$', 'is_correct' => true],
                ['text' => '#', 'is_correct' => false],
                ['text' => '%', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Qual comando compila os assets (JS e CSS) do Laravel para desenvolvimento usando Vite?',
            'options' => [
                ['text' => 'php artisan serve', 'is_correct' => false],
                ['text' => 'npm run build', 'is_correct' => false],
                ['text' => 'npm run dev', 'is_correct' => true],
                ['text' => 'composer run dev', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Em bancos de dados relacionais, o que é uma Foreign Key (Chave Estrangeira)?',
            'options' => [
                ['text' => 'A senha de acesso ao banco', 'is_correct' => false],
                ['text' => 'Um campo que liga uma tabela a outra', 'is_correct' => true],
                ['text' => 'O identificador único de cada linha', 'is_correct' => false],
                ['text' => 'Um tipo de dado para textos longos', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Qual método do Eloquent é usado para buscar o primeiro registro que atenda a uma condição ou falhar?',
            'options' => [
                ['text' => 'first()', 'is_correct' => false],
                ['text' => 'get()', 'is_correct' => false],
                ['text' => 'firstOrFail()', 'is_correct' => true],
                ['text' => 'findOrError()', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Qual destes NÃO é um hook do ciclo de vida (Lifecycle) do Vue 3?',
            'options' => [
                ['text' => 'onMounted', 'is_correct' => false],
                ['text' => 'onUpdated', 'is_correct' => false],
                ['text' => 'onDeleted', 'is_correct' => true], // O correto seria onUnmounted
                ['text' => 'onUnmounted', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Qual comando Git baixa um repositório remoto para sua máquina pela primeira vez?',
            'options' => [
                ['text' => 'git pull', 'is_correct' => false],
                ['text' => 'git clone', 'is_correct' => true],
                ['text' => 'git push', 'is_correct' => false],
                ['text' => 'git fetch', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'O que significa SPA no desenvolvimento web?',
            'options' => [
                ['text' => 'Single Page Application', 'is_correct' => true],
                ['text' => 'Simple Programming API', 'is_correct' => false],
                ['text' => 'Secure Protocol Access', 'is_correct' => false],
                ['text' => 'Standard PHP Application', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Qual diretório do Laravel contém os Controllers?',
            'options' => [
                ['text' => 'database/seeders', 'is_correct' => false],
                ['text' => 'resources/views', 'is_correct' => false],
                ['text' => 'app/Http/Controllers', 'is_correct' => true],
                ['text' => 'routes/api', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Para aplicar estilos CSS condicionalmente em uma tag no Vue, usamos:',
            'options' => [
                ['text' => ':class', 'is_correct' => true],
                ['text' => 'v-style-if', 'is_correct' => false],
                ['text' => 'v-css', 'is_correct' => false],
                ['text' => 'style-bind', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Qual status HTTP indica "Erro Interno do Servidor"?',
            'options' => [
                ['text' => '200', 'is_correct' => false],
                ['text' => '404', 'is_correct' => false],
                ['text' => '500', 'is_correct' => true],
                ['text' => '302', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'No Laravel, qual Facade é comumente usada para autenticação de usuários?',
            'options' => [
                ['text' => 'DB', 'is_correct' => false],
                ['text' => 'Route', 'is_correct' => false],
                ['text' => 'Auth', 'is_correct' => true],
                ['text' => 'File', 'is_correct' => false],
            ]
        ],
        [
            'statement' => 'Qual a função do arquivo package.json?',
            'options' => [
                ['text' => 'Gerenciar dependências do PHP', 'is_correct' => false],
                ['text' => 'Configurar o banco de dados MySQL', 'is_correct' => false],
                ['text' => 'Gerenciar dependências e scripts do Node.js/Javascript', 'is_correct' => true],
                ['text' => 'Armazenar as rotas da API', 'is_correct' => false],
            ]
        ],
        ];

        

        foreach ($questions as $q) {
            $question = Question::create(['statement' => $q['statement']]);
            
            foreach ($q['options'] as $opt) {
                Option::create([
                    'question_id' => $question->id,
                    'text' => $opt['text'],
                    'is_correct' => $opt['is_correct']
                ]);
            }
        }
    }
}