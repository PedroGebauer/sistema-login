# Sistema de Login em PHP com `$_SESSION`

Projeto da disciplina **Linguagem e Técnicas de Programação** (Prof. José Carlos Flores) — Aula 9, com as atividades propostas no material (`readme.md` original) implementadas.

## Estrutura

```
sistema-login/
├── login.html     → Formulário de login
├── valida.php     → Valida login, define nível de acesso e inicia sessão
├── painel.php     → Página protegida, mostra dados da sessão
├── perfil.php     → Página restrita a administradores
├── logout.php     → Encerra a sessão
└── css/
    └── estilo.css → Tema escuro (dark theme)
```

## Atividades implementadas

1. **Tema escuro no CSS** — `css/estilo.css` foi reescrito com paleta escura (fundo `#121212`, cartões `#1e1e1e`, texto claro, destaques em azul `#4ea1f3`).
2. **Nível de acesso na sessão** — `valida.php` agora reconhece dois usuários simulados, cada um com um nível:
   - `admin` / `12345` → nível `administrador`
   - `aluno` / `senha123` → nível `usuario`
   O nível é salvo em `$_SESSION['nivel']` e o `painel.php` exibe uma mensagem diferente para cada caso.
3. **Página `perfil.php` restrita ao admin** — verifica `$_SESSION['nivel']`; se não for `administrador`, mostra "Acesso negado" em vez do conteúdo.
4. **Data do login na sessão** — `valida.php` grava `$_SESSION['login_em'] = date('d/m/Y H:i:s')` no momento do login, e o `painel.php` exibe essa data.

## Como testar

1. Copie a pasta `sistema-login` para `C:\xampp\htdocs\sistema-login\`
2. Inicie o Apache no XAMPP
3. Acesse `http://localhost/sistema-login/login.html`
4. Teste com:
   - **Admin:** usuário `admin`, senha `12345` → acesso total, inclui link para `perfil.php`
   - **Usuário comum:** usuário `aluno`, senha `senha123` → sem acesso a `perfil.php`

Também testado localmente com o servidor embutido do PHP (`php -S`), cobrindo: login válido (admin e aluno), login inválido, acesso a página protegida sem sessão, acesso negado ao perfil para não-administrador e logout.
