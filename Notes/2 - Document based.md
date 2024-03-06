# Document-Based Data Bases

Os valores são estruturados em documentos (considerados as unidades/objectos de informação) e a base de dados tem visibilidade sobre esses valores. 

Os documentos organizam-se por coleções, onde cada coleção não tem necessariamente de ter todos os documentos com a mesma estrutura. Documentos são acessados ou por *unique keys* ou por atributos internos, ao contrário das bases de dados key-value.

### Consistency and transactions

Usam a *primary replica model*, em que apenas um nó é responsável por processar os dados em writes, garantindo uma alta availability e flexibilidade, que são as features principais deste tipo de paradigma.

Só podem existir transactions dentro do mesmo documento, garantindo propriedades ACID. A técnica map-reduce é usada para manipular vários agregados com configurações distribuídas.

- `Escalamento de reads`: só colocar mais nós, escalamento horizontal;
- `Escalamento de writes`: usando sharding. Aqui os dados podem ser partidos por chave e por valor. Também é escalamento horizontal;

Os joins podem ser diminuidos se houver uma **desnormalização** da estrtura do documento. De qualquer maneira, as associações entre documentos podem ser mapeadas em dois tipos:

- `Embedding`: com nesting documents;
- `Linking`: com apontadores-ids entre documentos, parecido com a abordagem relacional;

Além disso as associações podem ser de três tipos principais:

- `One-to-one`, podemos usar embeddings para a desnormalização;
- `One-to-many`, usando embeddings, mas em array;
- `Many-to-many`, usando linking entre duas coleções de documentos, que minimiza os dados duplicados;

### Use cases

- High availability requirements;
- Flexible schema;
- Event logging, content management, analytics, e-commerce;

### When not to use

- Operações complexas, com muitos joins;
- Casos de integridade muito restrita, com schema fixo;

## MongoDB

Os indexes são importantes para dar improvement ao selecionamento de atributos. Nesta tecnologia, são implementados com base em B-Trees. 