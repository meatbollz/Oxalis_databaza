# Oxalis_databaza
Tento projekt je jednoduchá webová aplikácia vytvorená v PHP, ktorá slúži na správu filmovej databázy. Umožňuje pracovať s dvomi tabuľkami v MySQL databáze – filmy a režiséri.

V aplikácii je možné pridávať nové záznamy o filmoch a ich režiséroch prostredníctvom formulára. Používateľ zadáva názov filmu, jeho žáner a dĺžku, ako aj informácie o režisérovi, konkrétne meno, priezvisko a vek. Tieto údaje sa následne ukladajú do databázy pomocou SQL príkazu INSERT.

Okrem pridávania dát projekt umožňuje aj ich úpravu. Ak používateľ vyplní niektoré polia a odošle formulár na zmenu, aktualizujú sa len tie hodnoty, ktoré boli zadané. Na to sa používa SQL príkaz UPDATE.

Ďalšou funkciou je mazanie údajov, kde sa po stlačení tlačidla vymažú všetky záznamy z tabuliek filmy aj režiséri pomocou príkazu TRUNCATE TABLE.

Aplikácia tiež zobrazuje všetky uložené filmy spolu s informáciami o režiséroch. Dáta sa získavajú z databázy pomocou SQL JOIN a následne sa vypisujú na stránku.

Projekt využíva technológie PHP, MySQL, HTML a knižnicu mysqli. Ide o základnú ukážku práce s databázou, kde sa demonštruje vkladanie, úprava, mazanie a výpis dát.
