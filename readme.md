# Slagger - Facilitando a Geração de Logs no Slack em PHP

O **Slagger** é uma abstração de serviço projetada para simplificar a geração de logs de qualquer sistema em PHP e enviá-los para o Slack. Com o Slagger, você pode criar um canal seguro e eficiente para coletar informações de erros e eventos em tempo real.

## Instalação

Para começar, clone o repositório do Slagger a partir do GitHub:

```bash
git clone git@github.com:ggiovanini/slagger.git
```

Em seguida, alimente seu arquivo `.env` com as seguintes informações, substituindo os valores correspondentes:

```dotenv
SLACK_CONNECTION="https://hooks.slack.com/services/T00000000/XXXXXXXXX/000000000000000000000000"
SLACK_CHANNEL=XXXXXXXXXXX
```

Certifique-se de manter essas informações confidenciais e não compartilhe chaves sensíveis.

**Observação:** Se o sistema onde estiver sendo implantado não estiver automaticamente carregando as variáveis de ambiente (env), é necessário inicializá-las manualmente. Utilize o seguinte código:

```php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
```

## Configurar Webhook do Slack

1. Acesse o Slack: Faça login na sua conta do Slack em [https://slack.com/](https://slack.com/).

2. Escolha o Canal: Selecione o canal no qual você deseja receber as notificações.

3. Acesse as Configurações do Canal: Clique no nome do canal na barra lateral esquerda e, em seguida, clique no ícone de engrenagem ("Configurações do canal").

4. Configurações do Canal: Escolha a opção "Configurações do canal" no menu suspenso.

5. Integrações: No menu de configurações, clique em "Integrações".

6. Configurar Incoming Webhooks: Se você ainda não configurou os Incoming Webhooks, clique em "Incoming Webhooks" e ative a opção.

7. Adicionar um Webhook para o Canal: Clique em "Adicionar Webhook para Canal" e siga as instruções para adicionar um novo webhook.

8. Configuração do Webhook: Após adicionar o webhook, você verá uma URL de webhook gerada. Configure outras opções conforme necessário.

9. Salvar Configurações: Role para baixo até encontrar o botão "Salvar Configurações" e clique nele.

10. Testar o Webhook: Abaixo, você verá um campo "Testar sua integração". Clique para enviar uma mensagem de teste para garantir que o webhook esteja funcionando corretamente.

11. Finalizar: Uma vez que o teste seja bem-sucedido, o webhook está configurado e pronto para receber notificações.

## Uso Básico

Para enviar uma mensagem ao canal padrão, utilize o método `sendMessage`:

```php
Slagger::sendMessage('Hello Slack');
```

Se preferir enviar para um canal específico, você pode utilizar o método `withChannel`:

```php
Slagger::withChannel('XXXXXXXXX')
    ->createMessage('Hello with Channel string!')
    ->send();
```

Você também pode instanciar um objeto `Channel` separado para usar em várias mensagens:

```php
$outroChannel = new Channel('XXXXXXXXX');
Slagger::withChannel($outroChannel)
    ->createMessage('Hello with Channel object!')
    ->send();
```

Esse exemplo demonstra como criar, configurar e enviar mensagens para canais específicos usando o Slagger.

## Contribuições

Sinta-se à vontade para contribuir para o desenvolvimento do Slagger! Se encontrar problemas ou tiver sugestões, abra uma issue no [GitHub](https://github.com/ggiovanini/slagger/issues).

Obrigado por usar o Slagger!
