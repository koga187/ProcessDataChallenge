Bem vindo ao desafio shopback
=========================
###Dependencias
 - PHP 7
 - [MongoDB Driver](http://php.net/manual/pt_BR/mongodb.installation.pecl.php)
 - [mongodb 3.4](https://docs.mongodb.com/manual/tutorial/install-mongodb-on-ubuntu/)
 
 
Depois de instalar as dependências iremos rodar o script de importação, nele desligaremos o journaling do mongodb para o processo ser feito de forma mais rapida.

###Ordem de execução:

Pronto:

1 - ```$ php importDataProduct.php```

2 - ```$ php importDataUser.php```


Em desenvolvimento:

3 - ```$ php importDataShoppingCart.php```

4 - ```$ php importDataOrder.php```

5 - ```$ php report.php```
