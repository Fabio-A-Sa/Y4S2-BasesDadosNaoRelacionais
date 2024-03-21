# Column-family Database

Os dados são stored num conjunto de colunas, famílias de colunas, que são acedidas com uma chave única (primeiro nível). Um segundo nível são as famílias de colunas, que podem ter diferentes formatos. É uma estrutura agregada emm dois níveis. É possível haver distribuição desses agregados.

A coluna tem uma chave, um valor e um timestamp que é usado para resolução de conflitos.

Uma *super column-family* contém um terceiro nível, onde são agrupados novos conjuntos de famílias de colunas.

....

