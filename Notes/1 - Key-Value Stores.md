# Key-Value Stores

- Os registos da base de dados são pares key-value;
- As chaves são únicas no sistema, podendo ser geridas por este;
- Os valores podem ser qualquer tipo de dados, com qualquer estrutura e dimensão;
- A serialização e desserialização dos dados são da responsabilidade do cliente;

## Características

#### 1 - Consistência

A consistência é apenas garantida em operações de um registo. Existe uma consistência eventual final.

#### 2 - Querying

A única forma de consultar a base de dados é pela sua chave, mesmo que seja temporária. Normalmente as chaves são temporárias quando queremos implementar uma cache memory.

#### 3 - Writing

A atomicidade é garantida tanto na leitura como na escrita.

### Casos de uso

#### Vantagens

- Cenários de alto desempenho essencialmente para leituras, como caching;
- Storing session information based on session id;
- Messaging middleware;

#### Desvantagens

- Quando existem muitas relações entre dados, correlações entre itens;
- Acesso dos itens por algum atributo do value, pois não há como ter filtros;

## Redis

TODO - See tutorial