#  encontreApp 


Algumas pastas estão ignoradas pelo .gitignore.

Levando em consideração que você tenha o <a href="http://www.php.net/"><code> PHP >= 7.1.3 </code></a>, <a href="https://laravel.com/"><code>Laravel</code></a> e <a href="https://getcomposer.org/"><code> composer </code></a> na sua variável global PATH, para uma nova instalação do Laravel.


# Clonando o projeto 

Vou  considerar que você esteja rodando um sistema operacional Linux/Windows e com o git instalado, faça o seguinte:
 <br>
<code>  git clone https://gitlab.com/nayracristine/encontrapp/painel.git </code> 
<br>

<strong> Instale as dependências e o framework</strong>
<br>
<code>
composer install --no-scripts
</code>

<strong>Copie o arquivo .env.example</strong>
<br>
<code> cp .env.example .env </code>

<strong> Crie uma nova chave para a aplicação</strong>
<br>
<code>php artisan key:generate</code>

 Ainda no .env configure o acesso ao banco de dados: <br>
<code>
DB_CONNECTION=mysql <br>
DB_HOST=127.0.0.1    <br>
DB_PORT=3306  <br>
DB_DATABASE=nome_bd_local <br>
DB_USERNAME=**** <br>
DB_PASSWORD=****
</code>


Em seguida você deve configurar o arquivo .env e rodar as migrations com:
<code> php artisan migrate --seed </code>
 
 <strong>Habilitando envio de e-mails</strong>

Gmail

Caso o host do e-mail seja o GMAIL, alterar as configurações do seu .env para
<code>

MAIL_DRIVER= smtp <br>
MAIL_HOST= smtp.gmail.com <br>
MAIL_PORT=587 <br>
MAIL_USERNAME= minhaconta@gmail.com <br>
MAIL_PASSWORD= senhaminhaconta <br>
MAIL_ENCRYPTION= tls

</code>

É necessário também habilitar a opção na sua conta de e-mail para "Permitir aplicativos menos seguros" neste link <a href="https://myaccount.google.com/lesssecureapps?pli=1">Google</a>

Recomendo que use o <strong>Mailtrap</strong> para testar o envio de emails.

Recomendo <code> php artisan migrate:fresh --seed </code> para recriar o banco após atualizações. FRESH deleta o banco e cria novamente.

