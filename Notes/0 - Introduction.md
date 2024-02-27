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

### 1 - Agregate Data Models

- Better in distributed systems;
- Em relational models a distribuição dos dados é difícil já que existem muitas interdependênicas entre tabelas;
- Só consegue garantir as propriedades ACID para um agregado (é como um documento), não para um conjunto destes;
- Permitem transações facilmente;

#### 1.1 - Key-Value in Document Data Models

- Semelhante aos Aggregate, embora tenham umas queries mais dependentes das keys e não tanto do agregado em si;

#### 1.2 - Column-Family Databases

- Os dados são guardados num conjunto de colunas, usando uma key única;
- `Column families` são grupos de dados relacionados;
- Como temos rows como unidade de storage, ajuda na performance;
- `Row-oriented`: cada row é um agregado, com as colunas a representarem os dados (profile, order history...);
- `Column-oriented`: cada coluna é um agregado (por exemplo profiles), com as rows a representarem cada um dos profiles;

### 2 - Distributed Models

Podemos distribuir e escalar os modelos de forma vertical (melhorar o harware, com limites físicos) ou horizontal (maior quantidade de nós ou clusters). O modelo *aggregate oriented* encaixa bem neste sistema distribuído horizontalmente, tornando o sistema mais fiável e resiliente.

Pode fazer sentido ter um sistema não relacional mesmo que não haja distribuição, pois os dados podem ser formulados do tipo key-based ou grafos (muitas interdependências).

Tipos de distribuição:

#### 2.1 - Sharding

Os dados são fragmentados e distribuídos em vários nós do sistema. É uma solução adequada quando temos padrões de operações disjuntas (nunca vamos ter de fazer leituras em mais do que um servidor, como por exemplo o email). Melhora significativamente as operações de leitura e escrita. No entanto, como não temos qualquer replicação, acaba pelo sistema não ficar mais protegido (continua a ser um ponto único de falha).

Os nós são organizados/definidos por determinados critérios, como por ordem alfabética, geográfica, com base no tempo (dados atuais, dados antepassados).

### 2.2 - Replication

#### 2.2.1 - Primary Replication

Temos um nó primário para os dados e depois temos nós numa rede distribuída que replicam esses dados. Apenas o nó primário permite escrita, mas todos os nós permitem leitura.

A escalabilidade horizontal é muito simples, mas pouco adequado quando as operações de escrita são frequentes (torna o sistema pesado). Caso o nó primário falhe, basta eleger outro do quórum para o suceder.

O principal risco da abordagem é a inconsistência entre os valores entre todas as réplicas.

#### 2.2.2 - Peer-to-Peer Replication

Todos os nós aceitam escritas e todos aceitam leituras. Os riscos de inconsistências são muito maiores, mas ajuda a balancear a carga quando houver muitas operações de escrita e leitura.