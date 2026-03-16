# 🥷 Simulador de Exame Ninja - Máquina de Turing

Projeto desenvolvido para a disciplina de **Teoria da Computação e Compiladores**, utilizando o framework **Laravel**.

## 📝 O Problema
O objetivo é implementar uma Máquina de Turing (MT) que valide o equilíbrio de habilidades de um ninja. 
A máquina deve aceitar apenas cadeias da forma **Tⁿ Nⁿ Gⁿ** (onde T=Taijutsu, N=Ninjutsu e G=Genjutsu), garantindo que a quantidade de cada habilidade seja exatamente igual e na ordem correta.

- **Exemplos Aceitos:** `TNG`, `TTNNGG`, `TTTNNNGGG`
- **Exemplos Rejeitados:** `TNNGG`, `GNT`, `TTNG`

## 🚀 Tecnologias Utilizadas
- **PHP 8.x**
- **Laravel 10/11**
- **Tailwind CSS** (para a visualização da fita)

## ⚙️ A Estratégia da Máquina
A lógica implementada segue o conceito de substituição de símbolos para controle de contagem:
1. **Estado q0:** Encontra um `T`, marca como `X` e muda para `q1`.
2. **Estado q1:** Pula `T`s e `Y`s até encontrar um `N`, marca como `Y` e muda para `q2`.
3. **Estado q2:** Pula `N`s e `Z`s até encontrar um `G`, marca como `Z` e muda para `q3`.
4. **Estado q3:** Retorna o cabeçote para a esquerda até encontrar o último `X`, reiniciando o ciclo.
5. **Estado q4:** Verificação final para garantir que não restaram símbolos sem par.

[Image of Turing machine state diagram for a^n b^n c^n]

## 🛠️ Como Executar o Projeto

1. **Clonar o repositório:**
   ```bash
   git clone [https://github.com/ramon-romano/atividade-maquina-de-turing.git](https://github.com/ramon-romano/atividade-maquina-de-turing.git)
   cd atividade-maquina-de-turing

2. **Instalar dependências:**


composer install

3. **Configurar o ambiente:**


cp .env.example .env
php artisan key:generate

4. **Subir o servidor:**


php artisan serve

5. **Testar:**
Acesse no navegador: http://127.0.0.1:8000/testar-ninja?tape=TTNNGG

## 📊 Visualização
O simulador exibe o histórico de execução, mostrando o estado atual, o conteúdo da fita e a posição do cabeçote em cada passo do processamento.


--- 

1. **Foco Acadêmico:** Removi a propaganda do Laravel e foquei no "Exame Ninja" e na "Máquina de Turing".
2. **Explicação dos Estados:** Expliquei brevemente o que cada estado (`q0`, `q1`, etc) faz. Isso mostra ao professor que você não apenas copiou o código, mas entende a lógica dos estados.
3. **Instruções de Instalação:** Adicionei os comandos `composer install` e `key:generate`, que são essenciais para o professor conseguir rodar o seu código na máquina dele.

Agora que o README está pronto, você já enviou o código para o GitHub com o `git push` ou a