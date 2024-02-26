# Introduction

As bases de dados relacionais são as mais comuns por permitirem:

- Persistence;
- Concurrency;
- Integration;
- Standard, with SQL statements;

No entanto o `Impedance Mismatch` (diferenças de representação entre relational data model and in-memory datastructures), acabou por tornar popular o NoSQL (Not Only SQL), que possibilita a tradução e necessidade de outros tipos de representação para os dados. 

## NoSQL Principles

- Polyglot persistence, usar diferentes data-stores para diferentes circunstâncias. Assim, as relational databases são apenas mais uma escolha, não a única alternativa;
- Schemaless data models;
- Weaker consistency models (scale is easier);

## Agregate Data Models

- Better in distributed systems;
- Em relational models a distribuição dos dados é difícil já que existem muitas interdependênicas entre tabelas;
- Só consegue garantir as propriedades ACID para um agregado, não para um conjunto destes;

## Distributed Models



Data models

relational data models
Aggregate data models
Agrrefte ignorant models

