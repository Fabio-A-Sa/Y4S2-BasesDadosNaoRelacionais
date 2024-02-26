# Introduction

As bases de dados relacionais são as mais comuns por permitirem:

- Persistence;
- Concurrency;
- Integration;
- Standard, with SQL statements;

No entanto o `Impedance Mismatch` (diferenças de representação entre relational data model and in-memory datastructures), acabou por tornar popular o NoSQL (Not Only SQL), que possibilita a tradução e necessidade de outros tipos de representação para os dados. 

### NoSQL Principles

- Polyglot persistence, usar diferentes data-stores para diferentes circunstâncias. Assim, as relational databases são apenas mais uma escolha, não a única alternativa;
- Schemaless data models;
- Weaker consistency models (scale is easier);

## Data Models

Um data model é um modelo que serve para saber como os dados são manipulados, descrevendo como a base de dados interage com os dados em si. Não confundir com `Storage Model`, que é a descrição de como os dados são organizados internamente. Não confundir com o `Conceptual Model`, que descreve os conceitos high-level e relações do domínio do problema.

### Agregate Data Models

- Better in distributed systems;
- Em relational models a distribuição dos dados é difícil já que existem muitas interdependênicas entre tabelas;
- Só consegue garantir as propriedades ACID para um agregado (é como um documento), não para um conjunto destes;
- Permitem transações facilmente;

#### 1 - Key-Value in Document Data Models

- Semelhante aos Aggregate, embora tenham umas queries mais dependentes das keys e não tanto do agregado em si;

#### 2 - Column-Family Databases

- Os dados são guardados num conjunto de colunas, usando uma key única;
- `Column families` são grupos de dados relacionados;
- Como temos rows como unidade de storage, ajuda na performance;
- `Row-oriented`: cada row é um agregado, com as colunas a representarem os dados (profile, order history...);
- `Column-oriented`: cada coluna é um agregado (por exemplo profiles), com as rows a representarem cada um dos profiles;

### Distributed Models

Next class