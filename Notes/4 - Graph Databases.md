# Graph Databases

O volume deixa de ser o principal factor, mas sim a interligação / relações entre entidades. O foco é `relationship-oriented` e não aggregate-oriented.

Os **vértices** representam entidades e as **arestas** representam relações entre estas entidades. Os vértices sabem das suas relações incoming e de outgoing.

As travessias entre relações são armazenadas diretamente o que as torna eficientes, ao contrário das databases relacionais, onde temos de fazer joins.

### Tipos de grafos

- `Unidirecionais` or `bidirecionais`;
- `Labeled` graphs: os vértices e arestas são tagged com valores escalares;
- `Attributed` graphs: quando vértices e arestas têm key-value pairs, para representar os seus atributos;
- `Multigraphs`: multiplas arestas são colocadas entre os mesmos dois vértices;
- `Hypergrafos`: quando uma aresta liga um conjunto de vértices;
- `Nested graphs`: quando há grafos dentro dos nós, por exemplo, em desenho de redes de computadores;


