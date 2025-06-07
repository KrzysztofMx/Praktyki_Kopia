# Opis działania projektu

*Projekt aolikacji umożliwiającej tworzenie oraz edytowanie plików markdown.*

### Spis Treści
- [Opis działania projektu](#opis-działania-projektu)
    - [Spis Treści](#spis-treści)
  - [Użytkownik](#użytkownik)
    - [Users - tabela DB](#users---tabela-db)
  - [Role](#role)
    - [UserRoles - tabela DB](#userroles---tabela-db)
  - [Projekt](#projekt)
    - [Projects - tabela DB](#projects---tabela-db)
  - [Pliki Md](#pliki-md)
    - [Pliki Md - tabela DB](#pliki-md---tabela-db)
---
## Użytkownik
*Osoba korzystająca ze strony.*

Użytkowników w bazie tworzy administrator dopiero po tej czynniści użytkownik może sie zalogować.

Każdy z zalogowanych użytkowników posiada rolę umożliwiającą **wyświetlanie** lub **edytowanie** treści.

---
### Users - tabela DB

*Opis kolumn*

| Nazwa       | Typ         | Opis        |
| ----------- | ----------- | ----------- |
| id | int | indeks tabeli - klucz główny |
| login |varchar(50)| potrzebny do logowania|
| password |varchar(156)| hasło - Md5 hashowane |
| User_Role |varchar(50)| rola użytkownika |
---
### Role
- **Editor -** rola daję możliwość edycji oraz utworzenia nowego [*Projektu*](#projekt) i [*Pliku*](#pliki-md) i dodania załącznika pliku pdf.
Podczas edycji mamy możliwość podglądu renderingu pliku md w czasie rzeczywistym.

- **Reader -** rola ta pozwala jedynie na wyświetlanie treści i pobierać załączniki. Nie wyświetla ekranu edycji tylko podgląd.
---
### UserRoles - tabela DB

*Opis kolumn - uzupełnić*

| Nazwa       | Typ         | Opis        |
| ----------- | ----------- | ----------- |
| id | int | indeks tabeli - klucz główny |
| name_Role |varchar(50)| nazwa roli|



Wróć do [spisu treści](#spis-tresci)

## Projekt
 Każdy z utworzonych projektów na własną bazę [plików](#pliki-Md) które nie są związane z innymi projektami. 

| Projekt 1    | Projekt 2    | Projekt 3    |
| ----------- | ----------- | ----------- |
| Plik_1_Proj1.Md | Plik_1_Proj2.Md | Plik_1_Proj3.Md |
| Plik_2_Proj1.Md || Plik_2_Proj3.Md |
| Plik_3_Proj1.Md |||
---
### Projects - tabela DB

*Opis kolumn - uzupełnić*

| Nazwa       | Typ         | Opis        |
| ----------- | ----------- | ----------- |
| id_Project | int | indeks tabeli - klucz główny |
| name_Project |varchar(50)| nazwa Projektu|
| user_Creator  |int(11)| id Użytkownika kreatora Projektu |
| user_Owner  |int(11)|id Użytkownika ownera Projektu|

---

Wróć do [spisu treści](#spis-tresci)

## Pliki Md
Strona pozwala na edycję plików markdown oraz ich tworzenie.
[użytkownik](#użytkownik) w zależności od posiadaniej roli może wykoanywać różne operacje na polikach markdown

### Pliki Md - tabela DB

*Opis kolumn - uzupełnić*

| Nazwa       | Typ         | Opis        |
| ----------- | ----------- | ----------- |
| id | int | indeks tabeli - klucz główny |
| name_File |varchar(50)| nazwa pliku Md|
| id_Project  |int(11)| id Projektu do któreko należy plik  |
| content  |text|zawartość tekstowa pliku Md|
| id_User   |	int(11)|id Kreatora pliku|
| id_Parent   |	int(11)|id pliku nadrzędnego w drzewie|


Wróć do [spisu treści](#spis-tresci)

