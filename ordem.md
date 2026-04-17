# Sistema Bancário com **CODEINGNITER**
> Desenvolver um sistema bancário, cadastrando usuário e gerando aleatoriamente um número de conta e um username. Neste cadastro, deve se ter um depósito inicial na conta, nome do cliente, senha.



A senha deve ser armazenada no banco de dados usando  password_hash para embaralhamento de senha. 
``` php
$password = "user_secret_password";

// Generates a secure hash with a random salt
$hash = password_hash($password, PASSWORD_BCRYPT);
```
Exemplo de uso: 

``` php
$userInput = $_POST['password'];
$storedHash = '$2y$10$...'; // Pega do banco de dados

if (password_verify($userInput, $storedHash)) {
    echo "Password is valid!";
} else {
    echo "Invalid password.";
}
```
## Menu
O usuário deverá entrar no sistema via login e senha.  Seu login é seu username e a senha. Ao entrar no sistema, o usuário tem alguns menus como EXTRATO,  PAGAMENTOS E TRANSFERÊNCIAS.

### Extrato
No EXTRATO tem todo o detalhamento de compras via débito, transferências, boletos, e crédito (salário, ou transferência realizada). Deve ter um campo data para armazenar a data em que foram realizadas as transações. Cada transação deve ter uma descrição pequena (ex: aplicação poup; resgate poup. pag. boleto, pag pix. etc).



**!!!!!!Analisar toda e qualquer inconsistência (ex: comprar sem saldo, etc).!!!!!!!**

### Pagamentos
No Menu de PAGAMENTOS , deve ter opções para escolher pagamento via pix, boletos, debito. (no nosso sistema não tem diferença entre eles, apenas irá aparecer no extrato se foi pago com boleto, pix, etc).
Cada vez que ocorre pagamento, o valor do saldo é diminuído com o valor a ser pago.

### Transferência
Por último, o menu TRANSFERÊNCIA, o usuário irá transferir uma quantia para uma conta destino. ( deve-se saber o numero desta conta).
A quanta deve ser diminuída do saldo atual e somada ao saldo da conta destino.

Cada Cliente tem login e senha.
DUPLAS!! Era isso!! Abraço

---
# Uso de sessões no **CODEIGNITER**:
> Em CodeIgniter, as sessões permitem manter o "estado" do usuário enquanto ele navega pelo site. O comportamento da biblioteca de sessões varia entre as versões 3 e 4. Abaixo, apresento como utilizá-las em ambas: [[1], [2], [3]]

## CodeIgniter 4 (Versão Atual)
No CI4, o gerenciamento de sessões é feito através de serviços ou da função auxiliar session(). [[4]]

---
Inicialização: O serviço de sessão costuma rodar automaticamente. Para acessá-lo manualmente em um controlador, use:
``` php
$session = \Config\Services::session();
```
ou simplesmente a função global session()

---
Adicionar Dados: Use o método set().
``` php
$session->set('item', 'valor');
// Ou com um array
$session->set(['user' => 'admin', 'logged_in' => true]);
```

---
Recuperar Dados: Use o método get().
``` php
$username = $session->get('user');
// Retorna null se não existir
```

---
Flashdata: Dados que duram apenas até a próxima requisição (úteis para mensagens de erro/sucesso).

``` php
$session->setFlashdata('success', 'Cadastro realizado!');
$msg = $session->getFlashdata('success');
```

---
Encerrar Sessão: [[4], [5]]
``` php
$session->destroy(); 
```

## CodeIgniter 3 (Versão Anterior) [[6]]
No CI3, a biblioteca de sessões deve ser carregada manualmente ou via autoload. [[7]]

Carregamento: No controlador, use 
``` php
$this->load->library('session');
```
ou adicione no arquivo application/config/autoload.php.

Adicionar Dados: Use o método set_userdata().
``` php
$this->session->set_userdata('item', 'valor');
```

Recuperar Dados: Use o método userdata().
``` php
$item = $this->session->userdata('item');
```

Remover Dados: 
``` php
$this->session->unset_userdata('item');.
```

Encerrar Sessão: [[8], [9], [10], [11], [12]]
``` php
$this->session->sess_destroy();
```

Configurações Importantes
Independentemente da versão, as sessões podem ser armazenadas de diferentes formas (drivers) no arquivo de configuração (app/Config/Session.php no CI4 ou application/config/config.php no CI3): [[4], [13]]

File (padrão): Armazena em arquivos no servidor.
Database: Armazena em uma tabela do banco de dados (mais seguro e escalável).
Redis/Memcached: Armazena em cache para alta performance. [[4], [11], [14]] 

Você gostaria de ajuda para configurar o armazenamento de sessões no banco de dados ou prefere um exemplo prático de login? [[9]]

1. [https://www.codeigniter.com][1]
2. [https://code.tutsplus.com][2]
3. [https://stackoverflow.com][3]
4. [https://codeigniter.com][4]
5. [https://www.upgrad.com][5]
6. [https://codeigniter4.github.io][6]
7. [https://www.slideshare.net][7]
8. [https://www.codeigniter.com][8]
9. [https://stackoverflow.com][9]
10.  [https://stackoverflow.com][10]
11.  [https://www.codeigniter.com][11]
12.  [https://www.finalroundai.com][12]
13.  [https://codeigniter.com][13]
14.  [https://stackoverflow.com][14]


[1]: https://www.codeigniter.com
[2]: https://code.tutsplus.com
[3]: https://stackoverflow.com
[4]: https://codeigniter.com
[5]: https://www.upgrad.com
[6]: https://codeigniter4.github.io
[7]: https://www.slideshare.net
[8]: https://www.codeigniter.com
[9]: https://stackoverflow.com
[10]: https://stackoverflow.com
[11]: https://www.codeigniter.com
[12]: https://www.finalroundai.com
[13]: https://codeigniter.com
[14]: https://stackoverflow.com
