### Biblioteca

Aplicatie PHP pentru o biblioteca online cu paginile: homepage, listare carti, adaugare carte
Homepage: text si imagine
Listare carti: functionalitatea de cautare dupa titlu + un tabel cu toate cartile din baza de date, daca nu exista carti este afisat doar un mesaj
Adaugare carte: formular cu titlu, autor, editura, isbn si gen (select)
La trimiterea formularului, se verifica daca isbn-ul este unic (sa nu existe deja o carte cu acelasi isbn in bd), altfel se afiseaza un mesaj de eroare

Aplicatia contine si validari pt inputurile trimise din formular, sa fie completate, sa aiba min 3 caractere (titlu, autor, editura), isbn-ul sa aiba fix 5 caractere

bd: biblioteca
tabela: carte(id-PK, titlu, autor, editura, isbn, gen)

