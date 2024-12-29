# Configurações Básicas para Rodar o Projeto

### 1. **Requisitos**
Certifique-se de que o ambiente possui as seguintes dependências instaladas:
- **PHP** (versão 8.0 ou superior)
- **Composer**
- **MySQL**

### 2. **Configuração do Projeto**
1. Clone o repositório para sua máquina local:
   ```bash
   git clone <url-do-repositorio>
   cd <nome-do-repositorio>
   ```

2. Instale as dependências do Laravel:
   ```bash
   composer install
   ```

3. Copie o arquivo de configuração `.env.example` para `.env`:
   ```bash
   cp .env.example .env
   ```

4. Configure o arquivo `.env` com as credenciais do banco de dados:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco
   DB_USERNAME=usuario
   DB_PASSWORD=senha
   ```

5. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

6. Execute as migrações para criar as tabelas no banco de dados:
   ```bash
   php artisan migrate
   ```

### 3. **Rodando o Projeto**
1. Inicie o servidor de desenvolvimento:
   ```bash
   php artisan serve
   ```

2. A API estará disponível em:
   ```
   http://127.0.0.1:8000
   ```

---

# Documentação da API de Gerenciamento de Tarefas

## **Base URL**
A API utiliza a seguinte URL base:
```
http://127.0.0.1:8000/api
```

---

## **Endpoints**

### 1. **Criar uma Tarefa**
- **URL:** `/tasks`
- **Método:** `POST`
- **Descrição:** Cria uma nova tarefa.
- **Cabeçalhos:**
  - `Content-Type: application/json`
- **Corpo (Body):**
  ```json
  {
      "title": "Título da tarefa",
      "description": "Descrição da tarefa",
      "status": "pending"
  }
  ```
  - **Campos:**
    - `title` (string, obrigatório): Título da tarefa.
    - `description` (string, obrigatório): Descrição da tarefa.
    - `status` (string, obrigatório): Status inicial da tarefa (`pending` ou `completed`).

- **Resposta de Sucesso (201):**
  ```json
  {
      "message": "Tarefa criada com sucesso!",
      "task": {
          "id": 1,
          "title": "Título da tarefa",
          "description": "Descrição da tarefa",
          "status": "pending",
          "created_at": "2024-12-29T12:00:00.000000Z",
          "updated_at": "2024-12-29T12:00:00.000000Z"
      }
  }
  ```

---

### 2. **Listar Todas as Tarefas**
- **URL:** `/tasks`
- **Método:** `GET`
- **Descrição:** Retorna uma lista de todas as tarefas.
- **Cabeçalhos:** Nenhum
- **Resposta de Sucesso (200):**
  ```json
  {
      "message": "Lista de tarefas",
      "tasks": [
          {
              "id": 1,
              "title": "Título da tarefa",
              "description": "Descrição da tarefa",
              "status": "pending",
              "created_at": "2024-12-29T12:00:00.000000Z",
              "updated_at": "2024-12-29T12:00:00.000000Z"
          },
          {
              "id": 2,
              "title": "Outra tarefa",
              "description": "Descrição detalhada",
              "status": "completed",
              "created_at": "2024-12-29T13:00:00.000000Z",
              "updated_at": "2024-12-29T13:00:00.000000Z"
          }
      ]
  }
  ```

---

### 3. **Atualizar o Status de uma Tarefa**
- **URL:** `/tasks/{id}`
- **Método:** `PATCH`
- **Descrição:** Atualiza o status de uma tarefa existente.
- **Parâmetros de URL:**
  - `id` (int, obrigatório): ID da tarefa a ser atualizada.
- **Cabeçalhos:**
  - `Content-Type: application/json`
- **Corpo (Body):**
  ```json
  {
      "status": "completed"
  }
  ```
  - **Campos:**
    - `status` (string, obrigatório): Novo status da tarefa (`pending` ou `completed`).

- **Resposta de Sucesso (200):**
  ```json
  {
      "message": "Status atualizado com sucesso",
      "task": {
          "id": 1,
          "title": "Título da tarefa",
          "description": "Descrição da tarefa",
          "status": "completed",
          "created_at": "2024-12-29T12:00:00.000000Z",
          "updated_at": "2024-12-29T14:00:00.000000Z"
      }
  }
  ```

- **Resposta de Erro (404):**
  ```json
  {
      "message": "Tarefa não encontrada"
  }
  ```

---

### 4. **Deletar uma Tarefa**
- **URL:** `/tasks/{id}`
- **Método:** `DELETE`
- **Descrição:** Deleta uma tarefa existente.
- **Parâmetros de URL:**
  - `id` (int, obrigatório): ID da tarefa a ser deletada.
- **Cabeçalhos:** Nenhum
- **Resposta de Sucesso (200):**
  ```json
  {
      "message": "Tarefa deletada com sucesso"
  }
  ```

- **Resposta de Erro (404):**
  ```json
  {
      "message": "Tarefa não encontrada"
  }
  ```

---

## **Observações**
1. Certifique-se de que a URL base está correta e que o servidor Laravel está rodando na porta apropriada.
2. Utilize o Postman ou outra ferramenta para testar os endpoints.
3. Todos os dados enviados no corpo devem estar no formato **JSON**.
4. O cabeçalho `Content-Type: application/json` deve ser configurado ao enviar requisições que contenham um corpo.

