# Column-family Database

Também conhecida como "wide-column database" e tem a sua origem no Google BigTable. Os dados são stored num conjunto de colunas, famílias de colunas, que são acedidas com uma chave única (primeiro nível). Um segundo nível são as famílias de colunas, que podem ter diferentes formatos. É uma estrutura agregada emm dois níveis. É possível haver distribuição desses agregados.

A coluna tem uma chave, um valor e um timestamp que é usado para resolução de conflitos.

Uma *super column-family* contém um terceiro nível, onde são agrupados novos conjuntos de famílias de colunas.

Não confundir com `column-oriented DBMS` ou `columnar DBMS`. Estas últimas usam os dados em colunas em vez de linhas.

## Características

- Ao contrário de key-value, o valor é visível e estruturado, pelo que pode ser usado para partições e distribuições;
- Ao contrário de document-based, onde todo o agregado é usado, aqui pode haver partições dos dados, permitindo uma maior flexibilidade;

