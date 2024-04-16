# Graph Databases

O volume deixa de ser o principal factor, mas sim a interligação / relações entre entidades. O foco é `relationship-oriented` e não aggregate-oriented. É schema-optional, porque é bastante flexível.

Os **vértices** representam entidades e as **arestas** representam relações entre estas entidades. Os vértices sabem das suas relações incoming e de outgoing.

As travessias entre relações são armazenadas diretamente o que as torna eficientes, ao contrário das databases relacionais, onde temos de fazer joins.

### Tipos de grafos

- `Unidirecionais` or `bidirecionais`;
- `Labeled` graphs: os vértices e arestas são tagged com valores escalares;
- `Attributed` graphs: quando vértices e arestas têm key-value pairs, para representar os seus atributos;
- `Multigraphs`: multiplas arestas são colocadas entre os mesmos dois vértices;
- `Hypergrafos`: quando uma aresta liga um conjunto de vértices;
- `Nested graphs`: quando há grafos dentro dos nós, por exemplo, em desenho de redes de computadores;

### Consistency, Transactions and Availability

Para servidores singulares, a consistência é sempre garantida. Em sistemas distribuídos, um nó-mestre é usado para replicação.

A consistência também é garantida durante transações. Os writes sempre requerem transações, porque a travessia pode ser grande.

### Scaling

- Adicionar RAM: melhora nos reads e nos writes;
- Adicionar mais nós read-only: melhora no reads;

Infelizmente não há forma excelente de escalar, porque não há sharding. A escalabilidade horizontal é bastante complexa.

### Data Modeling

- Use generic data labels;
- Move properties to labels;
- Use data denormalization;

### Use cases

- Domínios complexos;
- Quando domínios são distintos mas que tenham partes em comum;
- Powerfull modeling language;

### Limitations

- Não há uma standard query language;
- Escalabilidade, porque é complicado fazer sharding;
- Deal with complex data;
- Quando os updates globais são frequentes;
- Quando há cálculos em grupo, como médias e afins;

