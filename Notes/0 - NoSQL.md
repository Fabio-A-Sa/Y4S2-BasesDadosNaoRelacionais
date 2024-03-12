# Introduction to NoSQL

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

## Data consistency

No contexto dos sistemas distribuídos, a noção de consistência é mais voltada aos updates e às leituras, podendo ser relaxados por motivos de escalabilidade e eficiência.

### Update consistency

Os updates devem ser sem conflitos, com ordem bem definida. Numa abordagem pessimista, temos uma estratégia que garanta que não ocorre conflitos (usando locks, por exemplo), na abordagem otimista não temos qualquer consideração em particular, com estratégias para a correção de conflitos casos estes ocorram. Isto é, há sempre um tradeoff entre segurança e desempenho.

No entanto, usando um nó que apenas permite escritas ajuda neste processo.

### Read consistency

Os dados podem estar parcialmente atualizados, e uma leitura de um nó deste género pode comprometer operações futuras. Neste tipo de bases de dados só podemos ter transactions se tivermos agregados bem desenhados, sem dependências externas.

### Replicated Read consistency

A replicação dos mesmos dados é mais complexa com distribuição entre clusters, com aposta na *eventual consistency*.

### Session consistency

Ter consistência pelo menos ao nível da sessão, em modo *read-your-write* em nós específicos, mas reduz a abilidade de fazer load balance no sistema.

### Relaxing consistency

Importante para manter a escalabilidade e eficiência. Como as transações são algo que não se pode usar dado o *sharding* inerente, temos de olhar ao `CAP Theorem` (consistency, availability, partitioning).

#### Quoruns

Para uma consistência, é necessário que a maioria dos nós de um sistema concordem com um valor. Dado N nós:

> Write-quoruns: W > 1/2 dos nós que participam na replicação <br>
> Read-quoruns: R + W > N <br>

### Relaxing Durability

Por exemplo, no caso de carrinhos de compras em web systems, utilizadores não registados podem ter os seus dados apenas em browser cache, sem depender do servidor para requests à base de daods.

## Distributed Data Processing

Os clusters impactam o data storage e o data processing. Minimizar e centralizar o processamento no nó que contem os dados relevantes é importante, utilizando o padrão `Map-Reduce`.

### Map-Reduce Pattern

Baseado na programação funcional.

- `Map`: pega num agregado e produz several outputs em forma key-value pairs;
- `Reduce`: pega nos outputs da etapa anterior, dos diferentes nós, e agrega estes pares, fazendo a consolidação dos dados;

É uma arquitetura cujo o primeiro passo é altamente paralelizável. Troca a flexibilidade da forma com que os dados são organizados em favor da paralelização de cálculos com esses.