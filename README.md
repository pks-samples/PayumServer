# PayumServer.
[![Build Status](https://travis-ci.org/Payum/PayumServer.png?branch=master)](https://travis-ci.org/Payum/PayumServer)
[![Total Downloads](https://poser.pugx.org/payum/payum-server/d/total.png)](https://packagist.org/packages/payum/payum-server)
[![Latest Stable Version](https://poser.pugx.org/payum/payum-server/version.png)](https://packagist.org/packages/payum/payum-server)

PHP 5.5+ Payment processing server. Setup once and rule them all.

## Try it:

* Demo: [http://server.payum.org/demo.html](http://server.payum.org/demo.html)
* Backend: [http://server.payum.org/client/index.html](http://server.payum.org/client/index.html#/app/settings?api=http:%2F%2Fserver.payum.org)
* Server: [http://server.payum.org/](http://server.payum.org/)

## Docker

Create docker-compose.yml file:

```yaml
web:
  image: payum/payum-server
  command: apachectl -e info -DFOREGROUND
  environment:
      - PAYUM_MONGO_SERVER=mongodb://mongo:27017
      - PAYUM_DEBUG=1
  ports:
   - "80:8080"
  links:
   - mongo
mongo:
  image: mongo
```

and run `docker-compose up`. You server will be at `localhost:8080` port.

Docker container on docker hub. to be done. 

## Setup & Run

```bash
$ php composer.phar create-project payum/payum-server --stability=dev
$ cd payum-server
$ php -S 127.0.0.1:8000 web/index.php
```

An example on javascript:

```javascript
  // do new payment
  var payum = new Payum('http://localhost:8000');
  payum.payment.create(100, 'USD', function(payment) {
      var afterUrl = 'http://afterPaymentIsDoneUrl';

      payum.token.create('capture', payment.id, afterUrl, function(token) {
          // do redirect to token.targetUrl or process at the same page like this:
          payum.execute(token.targetUrl, '#payum-container');
      });
  });
```

_**Note**: You might need a [web client](https://github.com/Payum/PayumServerUI) to manage payments gateways or you can use REST API._

## Support me

There are lots of features were done and even more stuff in todo list. If the library made your life easier cosider support me. You can eiether hire me to do some payment related stuff or donate. You can also send a mail with a feedback. [Tell me](https://github.com/makasim) about your expiriens with Payum. 

<a href='https://pledgie.com/campaigns/30526'><img alt='Click here to lend your support to: Your private payment processing server. Setup it once and rule them all and make a donation at pledgie.com !' src='https://pledgie.com/campaigns/30526.png?skin_name=chrome' border='0' ></a>

## License

Code MIT [licensed](LICENSE.md).
