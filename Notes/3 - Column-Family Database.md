# Column-family Database

Também conhecida como "wide-column database" e tem a sua origem no Google BigTable. Os dados são stored num conjunto de colunas, famílias de colunas, que são acedidas com uma chave única (primeiro nível). Um segundo nível são as famílias de colunas, que podem ter diferentes formatos. É uma estrutura agregada emm dois níveis. É possível haver distribuição desses agregados.

A coluna tem uma chave, um valor e um timestamp que é usado para resolução de conflitos.

Uma *super column-family* contém um terceiro nível, onde são agrupados novos conjuntos de famílias de colunas.

Não confundir com `column-oriented DBMS` ou `columnar DBMS`. Estas últimas usam os dados em colunas em vez de linhas.

## Características

- Ao contrário de key-value, o valor é visível e estruturado, pelo que pode ser usado para partições e distribuições;
- Ao contrário de document-based, onde todo o agregado é usado, aqui pode haver partições dos dados, permitindo uma maior flexibilidade;

### Distribuição

- Peer-to-peer model (no node is a master);
- Todos os nodes aceitam reads e writes, quorum-based;
- Permite high scalability and availability of both reads and writes is a feature hightlight;
- Transactions existem nas rows;
- Transações envolvendo mais do que uma operação não são suportadas;
- Ambas as reads e writes operations aumentam horizontalmente com a adição de novas máquinas;

### Data Modeling

Os dados são agrupados na medida em que vão ser acedidos pelas queries. As primary keys permitem:

- Uniqueness;
- Partition, in case of the distributed systems;

Há também a desnormalização dos dados, para serem mais flexíveis sem comprometer a eficiência das queries, porque neste caso joins não são possíveis.

### Use Cases

- Large volumes of data, porque os dados podem ser partidos facilmente em rows e em columns;
- Para sistemas com high availability and scalability;
- Disjoint data access patterns;
- Geographical distribution;

### When not to use

- Propriedades ACID para reads e writes;
- Para dar update de todo um tuplo;
- Aggregate queries;