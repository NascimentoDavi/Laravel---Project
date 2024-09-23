# Laravel Project

# Service Layers

A **Service Layer** (Camada de Serviço) é um padrão de design que fornece uma interface para a lógica de negócios de uma aplicação. Ele atua como uma camada intermediária entre a camada de apresentação (como controladores) e a camada de persistência (como repositórios), encapsulando a lógica de negócios e facilitando a reutilização de código.

## Características de uma Service Layer

- **Encapsulamento da Lógica de Negócios**: A Service Layer centraliza a lógica de negócios em um único local, tornando-a mais fácil de manter e testar.

- **Reutilização**: Permite a reutilização de lógica de negócios em diferentes partes da aplicação, evitando a duplicação de código.

- **Facilidade de Teste**: Com a lógica de negócios isolada, os testes de unidade se tornam mais fáceis e eficazes.

- **Desacoplamento**: Ajuda a desacoplar a lógica de negócios das outras camadas da aplicação, promovendo uma arquitetura mais limpa e modular.

## Exemplo de Service Layer

Aqui está um exemplo de uma classe de Service Layer chamada `SupportService`:

```php
<?php

namespace App\Services;

use stdClass;

class SupportService
{
    // Pode ser visualizado por qualquer método dentro desta chamada e extensões dela
    protected $repository;

    // Interface do repositório
    public function __construct()
    {
        // Inicialização do repositório (geralmente injetado)
    }

    // Será configurado com um DTO.
    public function new(
        string $subject,
        string $status,
        string $body
    ) : stdClass // retorna uma classe genérica
    {
        return $this->repository->new(
            $subject,
            $status,
            $body
        );
    }

    public function update(
        string|int $id,
        string $subject,
        string $status,
        string $body
    ) : stdClass
    {
        return $this->repository->update(
            $id,
            $subject,
            $status,
            $body
        );
    }

    // Recupera todos os Suportes
    public function getAll(string $filter = null) : array
    {
        return $this->repository->getAll($filter);
    }

    // retorna um StdClass ou Nulo
    public function findOne(string $id) : stdClass | null
    {
        return $this->repository->findOne($id);
    }

    public function delete(string|int $id) : void 
    {
        $this->repository->delete($id);
    }
}


# DTO (Data Transfer Object)

Um **DTO (Data Transfer Object)** é um padrão de design utilizado para transferir dados entre diferentes camadas de uma aplicação, especialmente entre a camada de apresentação e a camada de serviço ou persistência. 

## Objetivos Principais de um DTO

- **Desacoplamento**: Ajuda a desacoplar as camadas da aplicação, permitindo que as mudanças em uma camada não afetem diretamente as outras.

- **Minimização de Chamadas**: Agrupa dados que normalmente seriam transferidos em várias chamadas em uma única estrutura, reduzindo o número de requisições.

- **Estrutura Clara**: Fornece uma estrutura clara e tipada para os dados que estão sendo transmitidos, facilitando a validação e o entendimento.

## Características de um DTO

- **Sem Lógica de Negócio**: Os DTOs são simples "contêineres de dados" e não contêm lógica de negócios. Eles geralmente têm apenas propriedades (atributos) e métodos getter/setter.

- **Usos Comuns**: Frequentemente usados em APIs para transferir dados entre um cliente (como um frontend) e um servidor (backend).

- **Especificidade**: Podem ser criados de forma específica para diferentes operações (por exemplo, DTOs distintos para criação, atualização e deleção de recursos).

## Exemplo de DTO

```php
class CreateSupportDTO {
    private string $subject;
    private string $status;
    private string $body;

    public function __construct(string $subject, string $status, string $body) {
        $this->subject = $subject;
        $this->status = $status;
        $this->body = $body;
    }

    public function getSubject(): string {
        return $this->subject;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getBody(): string {
        return $this->body;
    }
}
